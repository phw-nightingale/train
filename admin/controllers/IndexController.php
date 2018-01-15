<?php
namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\utils\verifyCode\VerifyServer;
use app\modules\LoginForm;

/**
 * Class IndexController
 * @package app\controllers
 */
class IndexController extends BaseController
{

    public function behaviors()
    {
        $behaviors=  [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'verify'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['default'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
        return array_merge( parent::behaviors(),$behaviors);
    }

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
    public function actionLogin()
    {
		
		$this->layout = 'login';
		$verify = Yii::t('app','verify');
		$title	= Yii::t('app','login_title');
		//设置当前view的params参数，  
		$view = Yii::$app->view;
		$view->params['title'] = $title; 
		
        if (!Yii::$app->user->isGuest) {
			Yii::$app->user->logout();
    }
        $model = new LoginForm();
        if (Yii::$app->request->post()){
			$LoginForm = Yii::$app->request->post('LoginForm');
			$Verify = new VerifyServer();
			if(strtolower($Verify->getVerify()) == strtolower($LoginForm['verify_code'])){
				if($model->load(Yii::$app->request->post()) && $model->login()){
					header("Location: ".Url::toRoute('default/index'));
					exit();//return $this->goBack();
				}
			}else{
				$verifyError = Yii::t('app','verifyError');	
			}
        }
		return $this->render($this->actionID,['model'=>$model,'title'=>$title,'verifyError'=>@$verifyError]);
		
    }
	
	
    public function actionVerify()
    {
		$Verify = new VerifyServer();
		$Verify->displayVerify();
		exit;
    }


}
