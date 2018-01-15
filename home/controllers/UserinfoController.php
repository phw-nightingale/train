<?php
namespace app\controllers;

use Yii;
use common\models\User;

/**
 * Class IndexController
 * @package app\controllers
 */
class UserinfoController extends BaseController
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
		
		if(Yii::$app->request->post()){
			print_r(Yii::$app->request->post());die;
			
		}
		
		
		
		return $this->render($this->actionID,['modelUser'=>$this->modelUser,'modelUserInfo'=>$this->modelUserInfo,'modelSchoolInfo'=>$this->modelSchoolInfo]);
	}



}
