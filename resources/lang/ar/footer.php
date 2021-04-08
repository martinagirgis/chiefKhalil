<?php

use App\models\admin\PackageFeature;

$packages = PackageFeature::find(5);

return [
    'mobile' => $packages->name_ar,
];
