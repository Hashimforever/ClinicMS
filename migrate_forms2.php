<?php
$dir = new RecursiveDirectoryIterator('c:/xampp/htdocs/ClinicMS-Laravel/resources/views');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/.*\.php$/', RegexIterator::GET_MATCH);

foreach ($files as $file) {
    $path = $file[0];
    $content = file_get_contents($path);
    $orig = $content;

    // {{Form::close()}}
    $content = preg_replace('/\{\{\s*Form::close\(\)\s*\}\}/', '</form>', $content);
    $content = preg_replace('/\{!!\s*Form::close\(\)\s*!!\}/', '</form>', $content);

    // Form::model
    $content = preg_replace_callback('/\{!!\s*Form::model\(\s*[^,]+,\s*(?:array\()?\s*\[?(.*?)\]?\)?\s*\)\s*!!\}/s', function($m) {
        $inner = $m[1];
        $method = 'POST';
        $action = '';
        $enctype = '';
        if (preg_match("/'method'\s*=>\s*'([^']+)'/", $inner, $match)) $method = $match[1];
        if (preg_match("/'route'\s*=>\s*\[?'([^']+)'/", $inner, $match)) {
            // simplified: we'll just put the route name
            $action = "{{ route('{$match[1]}') }}";
        }
        if (preg_match("/'files'\s*=>\s*true/", $inner)) $enctype = ' enctype="multipart/form-data"';
        
        $methodHtml = "";
        if (strtoupper($method) !== 'POST' && strtoupper($method) !== 'GET') {
            $methodHtml = "\n    @method('{$method}')";
            $method = 'POST';
        }
        
        return "<form action=\"{$action}\" method=\"{$method}\"{$enctype}>\n    @csrf{$methodHtml}";
    }, $content);

    // Form::input
    $content = preg_replace_callback('/\{!!\s*Form::input\(\s*\'([^\']+)\'\s*,\s*\'([^\']+)\'(.*?)\)\s*!!\}/s', function($m) {
        $type = $m[1];
        $name = $m[2];
        $rest = $m[3];
        $class = '';
        $id = '';
        $required = '';
        $value = '';
        $parts = explode(',', $rest, 2);
        if (count($parts) > 1 && trim($parts[0]) !== 'null' && trim($parts[0]) !== '') {
            $value = ' value="{{ ' . trim($parts[0]) . ' }}"';
        }
        if (preg_match("/'class'\s*=>\s*'([^']+)'/", $rest, $match)) $class = ' class="'.$match[1].'"';
        if (preg_match("/'id'\s*=>\s*'([^']+)'/", $rest, $match)) $id = ' id="'.$match[1].'"';
        if (preg_match("/'required'/", $rest)) $required = ' required';
        return "<input type=\"{$type}\" name=\"{$name}\"{$value}{$class}{$id}{$required}>";
    }, $content);

    // Form::select
    $content = preg_replace_callback('/\{!!\s*Form::select\(\s*\'([^\']+)\'(.*?)\)\s*!!\}/s', function($m) {
        return "<!-- MANUAL FIX NEEDED FOR SELECT: {$m[1]} -->\n" . $m[0];
    }, $content);

    // Form::label
    $content = preg_replace_callback('/\{!!\s*Form::label\(\s*\'([^\']+)\'\s*,\s*\'([^\']+)\'(.*?)\)\s*!!\}/s', function($m) {
        $for = $m[1];
        $text = $m[2];
        return "<label for=\"{$for}\">{$text}</label>";
    }, $content);

    if ($orig !== $content) {
        file_put_contents($path, $content);
        echo "Updated $path\n";
    }
}
