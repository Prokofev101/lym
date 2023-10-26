<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
            "vendor/bootstrap/css/bootstrap.min.css",
            "fonts/font-awesome-4.7.0/css/font-awesome.min.css",
            "fonts/iconic/css/material-design-iconic-font.min.css",
            "fonts/linearicons-v1.0.0/icon-font.min.css",
            "vendor/animate/animate.css",
            "vendor/css-hamburgers/hamburgers.min.css",
            "vendor/animsition/css/animsition.min.css",
            "vendor/select2/select2.min.css",
            "vendor/daterangepicker/daterangepicker.css",
            "vendor/slick/slick.css",
            "vendor/MagnificPopup/magnific-popup.css",
            "vendor/perfect-scrollbar/perfect-scrollbar.css",
            "css/util.css",
            "css/main.css",
    ];
    public $js = [
            "vendor/jquery/jquery-3.2.1.min.js",
            "vendor/animsition/js/animsition.min.js",
            "vendor/bootstrap/js/popper.js",
            "vendor/bootstrap/js/bootstrap.min.js",
            "vendor/select2/select2.min.js",
            "vendor/daterangepicker/moment.min.js",
            "vendor/daterangepicker/daterangepicker.js",
            "vendor/slick/slick.min.js",
            "js/slick-custom.js",
            "vendor/parallax100/parallax100.js",
            "vendor/MagnificPopup/jquery.magnific-popup.min.js",
            "vendor/isotope/isotope.pkgd.min.js",
            "vendor/sweetalert/sweetalert.min.js",
            "vendor/perfect-scrollbar/perfect-scrollbar.min.js",
            "js/in-scripts.js",
            "js/main.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
