<?php
$dir = new RecursiveDirectoryIterator('c:/xampp/htdocs/ClinicMS-Laravel/resources/views');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/.*\.php$/', RegexIterator::GET_MATCH);

foreach ($files as $file) {
    $path = $file[0];
    $content = file_get_contents($path);
    $orig = $content;

    // Form::open
    $content = preg_replace_callback('/\{!!\s*Form::open\(\s*(?:array\()?\s*\[?(.*?)\]?\)?\s*\)\s*!!\}/s', function($m) {
        $inner = $m[1];
        $method = 'POST';
        $action = '';
        $enctype = '';
        if (preg_match("/'method'\s*=>\s*'([^']+)'/", $inner, $match)) $method = $match[1];
        if (preg_match("/'url'\s*=>\s*'([^']+)'/", $inner, $match)) $action = "{{ url('{$match[1]}') }}";
        if (preg_match("/'route'\s*=>\s*'([^']+)'/", $inner, $match)) $action = "{{ route('{$match[1]}') }}";
        if (preg_match("/'files'\s*=>\s*true/", $inner)) $enctype = ' enctype="multipart/form-data"';
        
        $methodHtml = "";
        if (strtoupper($method) !== 'POST' && strtoupper($method) !== 'GET') {
            $methodHtml = "\n    @method('{$method}')";
            $method = 'POST';
        }
        
        return "<form action=\"{$action}\" method=\"{$method}\"{$enctype}>\n    @csrf{$methodHtml}";
    }, $content);

    // Form::close
    $content = preg_replace('/\{\{!?\s*Form::close\(\)\s*!!\}\}/', '</form>', $content);
    $content = preg_replace('/\{!!\s*Form::close\(\)\s*!!\}/', '</form>', $content);

    // Form::text, email, password, hidden, number
    $content = preg_replace_callback('/\{!!\s*Form::(text|email|password|hidden|number)\(\s*\'([^\']+)\'(.*?)\)\s*!!\}/s', function($m) {
        $type = $m[1];
        $name = $m[2];
        $rest = $m[3]; // e.g. , null, array('class' => 'form-control', 'required' => 'required', 'id' => 'name')
        
        $class = '';
        $id = '';
        $required = '';
        $value = '';
        
        // parse value (second arg)
        $parts = explode(',', $rest, 2);
        if (count($parts) > 1 && trim($parts[0]) !== 'null' && trim($parts[0]) !== '') {
            $value = ' value="{{ ' . trim($parts[0]) . ' }}"';
        }
        
        if (preg_match("/'class'\s*=>\s*'([^']+)'/", $rest, $match)) $class = ' class="'.$match[1].'"';
        if (preg_match("/'id'\s*=>\s*'([^']+)'/", $rest, $match)) $id = ' id="'.$match[1].'"';
        if (preg_match("/'required'\s*=>\s*'([^']+)'/", $rest, $match) || preg_match("/'required'/", $rest)) $required = ' required';
        
        return "<input type=\"{$type}\" name=\"{$name}\"{$value}{$class}{$id}{$required}>";
    }, $content);

    // Form::textarea
    $content = preg_replace_callback('/\{!!\s*Form::textarea\(\s*\'([^\']+)\'(.*?)\)\s*!!\}/s', function($m) {
        $name = $m[1];
        $rest = $m[2];
        
        $class = '';
        $id = '';
        $required = '';
        $value = '';
        
        $parts = explode(',', $rest, 2);
        if (count($parts) > 1 && trim($parts[0]) !== 'null' && trim($parts[0]) !== '') {
            $value = '{{ ' . trim($parts[0]) . ' }}';
        }
        
        if (preg_match("/'class'\s*=>\s*'([^']+)'/", $rest, $match)) $class = ' class="'.$match[1].'"';
        if (preg_match("/'id'\s*=>\s*'([^']+)'/", $rest, $match)) $id = ' id="'.$match[1].'"';
        if (preg_match("/'required'/", $rest)) $required = ' required';
        
        return "<textarea name=\"{$name}\"{$class}{$id}{$required}>{$value}</textarea>";
    }, $content);
    
    // Form::select
    $content = preg_replace_callback('/\{!!\s*Form::select\(\s*\'([^\']+)\'(.*?)\)\s*!!\}/s', function($m) {
        // very basic select fallback, will need manual checking if complex
        $name = $m[1];
        return "<!-- MANUAL FIX NEEDED FOR SELECT: {$name} -->\n" . $m[0];
    }, $content);

    // Form::submit
    $content = preg_replace_callback('/\{!!\s*Form::submit\(\s*\'([^\']+)\'(.*?)\)\s*!!\}/s', function($m) {
        $val = $m[1];
        $rest = $m[2];
        $class = '';
        if (preg_match("/'class'\s*=>\s*'([^']+)'/", $rest, $match)) $class = ' class="'.$match[1].'"';
        return "<button type=\"submit\"{$class}>{$val}</button>";
    }, $content);

    if ($orig !== $content) {
        file_put_contents($path, $content);
        echo "Updated $path\n";
    }
}
