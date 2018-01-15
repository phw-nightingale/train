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
    public $baseUrl  = '@web';
    public $css = [
       'H-ui.admin/static/h-ui/css/H-ui.min.css',
       'H-ui.admin/static/h-ui.admin/css/H-ui.admin.css',
       'H-ui.admin/lib/Hui-iconfont/1.0.8/iconfont.css',
       'H-ui.admin/static/h-ui.admin/skin/default/skin.css',
       'H-ui.admin/static/h-ui.admin/css/style.css',
    ];
    public $js = [
	   'H-ui.admin/lib/jquery/1.9.1/jquery.min.js',
       'H-ui.admin/lib/layer/2.4/layer.js',
       'H-ui.admin/static/h-ui/js/H-ui.min.js',
       'H-ui.admin/static/h-ui.admin/js/H-ui.admin.js',
       'H-ui.admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
	
     //定义按需加载JS方法，注意加载顺序在最后  
    public static function addScript($view, $jsfile , $setAsset = array()) {  
        $view->registerJsFile($jsfile, array_merge( [AppAsset::className(), 'depends' => 'app\assets\AppAsset'] ,  $setAsset ) );  
    }  
      
   //定义按需加载css方法，注意加载顺序在最后  
    public static function addCss($view, $cssfile) {  
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'app\assets\AppAsset']);  
    }  

	
}
