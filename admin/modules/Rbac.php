<?php
// +----------------------------------------------------------------------
// | TITLE: this to do?
// +----------------------------------------------------------------------

namespace app\modules;

use Yii;
use yii\base\Behavior;
use yii\helpers\ArrayHelper;

use common\models\SchoolRole;

class Rbac extends Behavior
{
    /**
     * 用户开放路由
     * @var array
     */
    
    public $allowUrl = [
        'index/login',
        'index/logout',
        'index/verify',
        'live/index',
    ];
	

    /**
     * 验证
     * @param $route 当前路由
     * @return bool
     */
    public function verifyRule($route)
    {
		
        $this->allowUrl = array_merge(Yii::$app->params['allowUrl'], $this->allowUrl);
        if (Yii::$app->user->isGuest) {//未登录判断开放路由
            if (in_array($route, $this->allowUrl) == true) {
            	return true;
			}else{
				return true;
			}
        }
		//获取当前用户路由
		$menu  = SchoolRole::getRule(Yii::$app->user->identity->role_id);//菜单读取
		$rules = ArrayHelper::map($menu, 'id', 'route');
		$rules = array_merge($rules, $this->allowUrl);
		
		if(SchoolRole::ADMIN_ID != Yii::$app->user->identity->role_id){
			if(in_array($route, $rules)){
				return true;	
			}
		}

		return $menu;
		
    }
	


	


}