<?php
namespace app\widgets;

use yii;
use yii\base\Widget;
use yii\helpers\Html;



class MainWidget extends Widget
{
	
   public function init(){
        parent::init();
   }

	
	public static function mainHead(){
		
		$userMain = Yii::$app->cache->get('menu_'.Yii::$app->user->identity->role_id);
		
		foreach($userMain as $key=>$list){
				if(Yii::$app->session['route'] == $list['route']){//判断路由选项
					$userMain[$key]['active'] = 'class="active"';
				}
		}
		
		foreach($userMain as $key=>$row){
			if($row['pid']=='0')$new_userMain[] = $row;
		}
		
        return \Yii::$app->view->render("@app/views/layouts/mainHead",['userMain'=>$new_userMain]);
    }

	
	
	public static function mainFoot(){
        return \Yii::$app->view->render("@app/views/layouts/mainFoot");
    }

}
?>
