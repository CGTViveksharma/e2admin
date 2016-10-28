<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Theme2Asset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme2/vendor/bootstrap/css/bootstrap.min.css',
        'theme2/css/freelancer.min.css',
        'theme2/vendor/font-awesome/css/font-awesome.min.css',
        'https://fonts.googleapis.com/css?family=Montserrat:400,700',
        'https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic',
    ];
    public $img = [
    ];
    public $js = [
        'theme2/vendor/jquery/jquery.min.js',
        'theme2/vendor/bootstrap/js/bootstrap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js',
        'theme2/js/jqBootstrapValidation.js',
        'theme2/js/contact_me.js',
        //'theme2/js/freelancer.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}