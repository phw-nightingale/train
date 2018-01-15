<?php
// +----------------------------------------------------------------------
// | TITLE: 角色
// +----------------------------------------------------------------------

namespace app\controllers;

use Yii;
use common\helps\Tree;
use common\models\SchoolRule;
use common\models\SchoolRole;
use yii\web\Response;

class RoleController extends BaseController
{


    /**
     * 角色列表
     * @return string
     */
    public function actionIndex()
    {
		

		$searchViews = SchoolRule::viewSearch();//搜索条,在models类里
		$search = SchoolRole::search();//搜索条件
		
		
        $SchoolRole = $search->andWhere(['status'=>1]);
        $models = $SchoolRole->all();
	
        return $this->render('index', ['model' => $models,'searchViews' => $searchViews]);
    }

    /**
     * 创建角色
     * @return array|string
     */
    public function actionCreate()
    {
        $SchoolRole = new SchoolRole(['scenario' => 'create']);
        if ($SchoolRole->load(Yii::$app->request->post()) && $SchoolRole->validate()) {
			
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($SchoolRole->save()) {
                return ['code' => 200, 'message' => '添加成功'];
            } else {
                return ['code' => 400, 'message' => '添加失败'];
            }

        } else {
            return $this->render('create', ['model' => $SchoolRole]);
        }

    }

    /**
     * 更新角色
     * @return array|string
     */
    public function actionUpdate()
    {
        $id = Yii::$app->request->get('id');
        $model = SchoolRole::findOne($id);
        $model->scenarios('update');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['code' => 200, 'message' => '修改成功'];
        } else {
            return $this->render('update', ['model' => $model]);
        }


    }

    /**
     * 删除 角色
     * @return array
     */
    public function actionDelete()
    {
		
		$cbox = Yii::$app->request->get('cbox');
        Yii::$app->response->format = Response::FORMAT_JSON;
		
		foreach($cbox as $k=>$id){
			if (!SchoolRole::deleteRole(['id'=>$id])) {
				return ['code' => 400, 'message' => '错误'];
			}
		}
		return ['code' => 200, 'message' => '成功'];
    }

    /**
     * 设置权限
     * @return array|string
     */
    public function actionSetRule()
    {

        $roleId = Yii::$app->request->get('id');
	
        if (empty($roleId)) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['code' => 400, 'message' => '参数错误'];
        }
        $model = SchoolRole::findOne($roleId);
        $model->rule = explode(',', $model->rule);
        if (Yii::$app->request->post()) {
            $rule = Yii::$app->request->post('rule');
            $rule = array_filter($rule);
            krsort($rule);
            $rule = implode(',', $rule);
            $model->scenario = 'update';
            $model->rule = $rule;
            Yii::$app->response->format = Response::FORMAT_JSON;
            if (!$model->save()) {
                return ['code' => 400, 'message' => '修改失败'];
            } else {
                return ['code' => 200, 'message' => '修改成功'];
            }

        } else {
            $ruleAll = SchoolRule::find()->where(['status' => 1])->asArray()->all();
            $ruleAll = array_map(function ($item) use ($model) {
                (in_array($item['id'], $model->rule)) ?
                    $item['state'] = ['checked' => true] : '';
                $item['text'] = $item['title'];
                return $item;
            }, $ruleAll);
            $ruleAll = Tree::makeTree($ruleAll, ['children_key' => 'nodes']);
            return $this->render('setRule', ['ruleAll' => $ruleAll, 'model' => $model]);
        }

    }

	
	


}