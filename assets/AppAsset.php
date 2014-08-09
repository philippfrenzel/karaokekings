<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [        
        'amoeba/css/isotope.css',
        'amoeba/js/fancybox/jquery.fancybox.css',
        'amoeba/css/animate.css',        
        'amoeba/css/style.css',
        'amoeba/skin/default.css' 
    ];
    public $js = [        
        'amoeba/js/modernizr-2.6.2-respond-1.1.0.min.js',
        'amoeba/js/jquery.appear.js',
        'amoeba/js/jquery.easing.1.3.js',
        'amoeba/js/jquery.isotope.min.js',
        'amoeba/js/jquery.scrollTo-1.4.3.1-min.js',
        'amoeba/js/jquery.nicescroll.min.js',
        'amoeba/js/jquery.localscroll-1.2.7-min.js',
        'amoeba/js/fancybox/jquery.fancybox.pack.js',
        'amoeba/js/skrollr.min.js',        
        'amoeba/js/stellar.js',
        'amoeba/js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'frenzelgmbh\appcommon\commonAsset'
    ];
}
