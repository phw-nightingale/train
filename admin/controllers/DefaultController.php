<?php
namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Class IndexController
 * @package app\controllers
 */
class DefaultController extends BaseController
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
	

    /**
     * Login action.
     *
     * @return string
     */
    public function actionIndex()
    {	

		$this->layout = 'main';
		$title	= Yii::t('app','web_title');
		//设置当前view的params参数，  
		$view = Yii::$app->view;
		$view->params['title']= $title;
		$view->params['layoutMenuData']= $this->menuHtml; 
	
		return $this->render($this->actionID,['string' => 'world!']);
	}
	
	
   public function actionWelcome()
    {	
		
		//欢迎页数据读取
		$welcomeDB = array();
        $mysql = Yii::$app->db->createCommand("select VERSION() as version")->queryAll();
        $mysql=$mysql[0]['version'];
        $info =
            [
                '操作系统'=>PHP_OS,
                '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
                'PHP运行方式'=>php_sapi_name(),
                'PHP版本'=>PHP_VERSION,
                'MYSQL版本'=>$mysql,
                '上传附件限制'=>ini_get('upload_max_filesize'),
                '执行时间限制'=>ini_get('max_execution_time').' s',
                '剩余空间'=>round((@disk_free_space(".") / (1024 * 1024)), 2).' M',

            ];
        return $this->render('welcome',['info'=>$info,'welcomeDB'=>$welcomeDB]);

    }
	



}
