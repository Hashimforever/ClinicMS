<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Hospital;

$setting = Hospital::first();
if (!$setting) {
    $setting = new Hospital();
}
$setting->name = 'DR. Abdurazaq Dental clinic';
$setting->address = 'chiro town , back side of roze cafe';
$setting->save();

echo "Settings updated successfully.\n";
