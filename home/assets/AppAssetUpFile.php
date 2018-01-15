<?php
namespace app\assets;
use yii\web\AssetBundle;
use yii\web\View;
/**
 * @author 自动加载JS CSS
 * @since 2.0
 */
class AppAssetUpFile extends AssetBundle
{
	
    public $css = [
				  'publics/diyUpload/css/webuploader.css',
				  'publics/diyUpload/css/diyUpload.css',
    ];
    public $js = [
				  'publics/diyUpload/js/webuploader.html5only.min.js',
				  'publics/diyUpload/js/diyUpload.js',
    ];
    public $depends = [
    ];
	
     //定义按需加载JS方法，注意加载顺序在最后  
    public static function addScript($view, $jsfile , $setAsset = array()) {  
        $view->registerJsFile($jsfile, array_merge( [AppAsset::className(), 'depends' => 'app\assets\AppAssetUpFile'] ,  $setAsset ) );  
    }  
      
   //定义按需加载css方法，注意加载顺序在最后  
    public static function addCss($view, $cssfile) {  
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'app\assets\AppAssetUpFile']);  
    }  

	
}
