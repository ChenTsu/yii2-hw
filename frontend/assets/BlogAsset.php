<?php
/**
 * Created by PhpStorm.
 * User: chentsu
 * Date: 26.09.2016
 * Time: 15:41
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BlogAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/font-awesome.min.css',
        'css/bootstrap-material-design.css',
        'css/ripples.min.css',
        'css/material-scrolltop.css',
        'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
        'https://fonts.googleapis.com/icon?family=Material+Icons',
        'css/material-blog.css'
    ];
    public $js = [
        'js/pace.min.js',
        'js/ripples.min.js',
        'js/material.min.js',
        'js/material-scrolltop.js',
        'js/main.js',
        'js/init.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
