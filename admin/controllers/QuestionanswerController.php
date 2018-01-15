<?php
// +----------------------------------------------------------------------
// | TITLE: 试卷题目回答控制器
// +----------------------------------------------------------------------

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Response;

/**
 * Class AdminRuleController
 * @package app\controllers
 */
class QuestionanswerController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        $this->ClassModel = new \common\models\ExaAnswer;
    }
    /**
     * 列表
     * @return string
     */
    public function actionIndex()
    {
		

		$searchViews = $this->ClassModel->viewSearch();//搜索条,在models类里
		$search = $this->ClassModel->search();//搜索条件
		
        $pages = new Pagination(['totalCount' => $search->count(), 'pageSize' => '20']);  //分页功能  方法在视图 layouts
        $models = $search->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render($this->actionID,
				[
					'ClassModel' 	=> $this->ClassModel,
					'model' 		=> $models,
					'pages' 		=> $pages,
					'searchViews' 	=> $searchViews
                    
				]
				);

    }

       /**
     * 创建
     * @return array|string
     */
    public function actionCreate()
    {
        $ClassModel = $this->ClassModel;
        $ClassModel = new $this->ClassModel();
       // ['scenario' => $ClassModel::SCENARIO_CREATE];
        
        if ($ClassModel->load(Yii::$app->request->post()) && $ClassModel->validate()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($ClassModel->save()) {
                return ['code' => 200, 'message' => '添加成功'];
            } else {
                return ['code' => 400, 'message' => '添加失败'];
            }
        } else {
            return $this->render($this->actionID, ['ClassModel' => $this->ClassModel,'model' => $ClassModel]);
        }
    }

    /**
     * 更新
     * @return string
     */
    public function actionUpdate()
    {
        $ClassModel = $this->ClassModel;
        $id = Yii::$app->request->get('id');
        $model = $this->ClassModel->findOne($id);
        $model->scenarios($ClassModel::SCENARIO_UPDATE);
        // $Rule  = Yii::$app->request->post('AdminRule');
        if ($model->load(Yii::$app->request->post())) {
            // $model->status  = isset($Rule['status'])  ? $Rule['status'] : 0;
            // $model->is_show = isset($Rule['is_show']) ? $Rule['is_show'] : 0;
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->save()) {
                return ['code' => 200, 'message' => '修改成功'];
            } else {
                return ['code' => 400, 'message' => '修改失败'];
            }
        } else {
            return $this->render($this->actionID, ['ClassModel' => $this->ClassModel,'model' => $model]);
        }
    }
    
    /**
     * 角色
     * @return array
     */
    public function actionDelete()
    {
        
        $cbox = Yii::$app->request->get('cbox');
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(empty($cbox)) {
            return ['code'=>400,'message'=>"未选择记录!"];
        }
        foreach($cbox as $k=>$id){
            if (!$this->ClassModel->findOne($id)->delete()) {
                return ['code' => 400, 'message' => '错误'];
            }
        }
        return ['code' => 200, 'message' => '成功'];
    }
    
}