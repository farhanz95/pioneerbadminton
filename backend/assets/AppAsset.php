<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        // 'css/style.css',
        // 'css/style-responsive.css',
        // 'css/slider.css',
        // 'css/orange.css',
        // 'css/style.css',
        // 'css/stepscrumb.css',
        // 'css/components.css',
        // 'css/booking.css',
        // 'css/selectpicker.css'
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
