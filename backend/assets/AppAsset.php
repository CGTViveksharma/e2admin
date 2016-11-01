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
        'css/custom.css',
       // 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'assets/skins/_all-skins.min.css',
        'assets/skins/skin-purple-light.min.css',
        'assets/iCheck/square/purple.css',
        'assets/datepicker/datepicker3.css',
        // 'assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    ];
    public $js = [
        'https://use.fontawesome.com/ab8b7b70ac.js',
        'js/icheck.min.js',
        'js/jquery-ui.min.js',
        'assets/datepicker/bootstrap-datepicker.js',
        'assets/slimScroll/jquery.slimscroll.min.js',
        // 'assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'js/app.min.js',
        'js/dashboard.js',
        'js/bootbox.min.js',
        'js/common.js'
    ];  
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
