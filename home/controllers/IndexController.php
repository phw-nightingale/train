<?php
namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\LoginForm;

/**
 * Class IndexController
 * @package app\controllers
 */
class IndexController extends BaseController
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
		
		return $this->render($this->actionID,['mainHead' => $this->mainHead ,'mainLeft' => $this->mainLeft ,'mainFoot' => $this->mainFoot ]);
	}


    /**
     * Login action.
     *
     * @return string
     */
    public function actionMain()
    {	
	
		$this->layout = false;
		$id = Yii::$app->request->get('id');
		
		$userMain = Yii::$app->cache->get('menu_'.Yii::$app->user->identity->role_id);
		$main = [];$title='';
		foreach($userMain as $key=>$row){
			if($row['id'] == $id)$title = $row['title'];
			
			if($row['pid'] == $id){
				$main[] = $row;
			}
		}
		return $this->render("@app/views/layouts/mainLeft",['title' => $title,'main' => $main]);

	}
	

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
		$this->layout = $this->actionID;
		
        if (!Yii::$app->user->isGuest) {
			//Yii::$app->user->logout();
    	}
		
        $model = new LoginForm();
        if (Yii::$app->request->post()){
			if($model->load(Yii::$app->request->post()) && $model->login()){
				//return $this->goHome();
				return $this->redirect(['userinfo/index']); 
			}	
        }
		return $this->render($this->actionID,['model'=>$model]);
		
    }
	



}
