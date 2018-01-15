<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Response;
use yii\web\UploadedFile;


class Course_watchController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        $this->ClassModel = new \common\models\CourseWatch;
    }
	
    /**
     * �б�
     * @return string
     */
    public function actionIndex()
    {
		

		$searchViews = $this->ClassModel->viewSearch();//������,��models����
        $search = $this->ClassModel->search();//搜索条件

        $pages = new Pagination(['totalCount' => $search->count(), 'pageSize' => '2']);
        $models = $search->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render($this->actionID,[
            'ClassModel' 	=> $this->ClassModel,
            'model' 		=> $models,
            'pages' 		=> $pages,
            'searchViews' 	=> $searchViews
        ]);


    }

    /**
     * ����
     * @return array|string
     */
    public function actionCreate()
    {
        $ClassModel = $this->ClassModel;
        $ClassModel = new $this->ClassModel(['scenario' => $ClassModel::SCENARIO_CREATE]);
        if ($ClassModel->load(Yii::$app->request->post()) && $ClassModel->validate()) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            /*$ClassModel->cover = UploadedFile::getInstance($ClassModel, 'cover');*/

            if ($ClassModel->save()/*&&$ClassModel->upload()*/) {
                return ['code' => 200, 'message' => '添加成功'];
            } else {
                return ['code' => 400, 'message' => '添加失败'];
            }
        } else {
            return $this->render($this->actionID, ['ClassModel' => $this->ClassModel,'model' => $ClassModel]);
        }
    }

    /**
     * ����
     * @return string
     */
    public function actionUpdate()
    {
		$ClassModel = $this->ClassModel;
        $id = Yii::$app->request->get('id');
        $model = $this->ClassModel->findOne($id);
        $model->scenarios($ClassModel::SCENARIO_UPDATE);
//        $Rule  = Yii::$app->request->post('AdminRule');
        if ($model->load(Yii::$app->request->post())) {
//            $model->status  = isset($Rule['status'])  ? $Rule['status'] : 0;
//            $model->is_show = isset($Rule['is_show']) ? $Rule['is_show'] : 0;
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->save()) {
                return ['code' => 200, 'message' => '成功'];

            }else{
                return ['code' => 400, 'message' => '失败'];
            }
        } else {
            return $this->render($this->actionID,
                [
                    'ClassModel' => $this->ClassModel,
                    'model' => $model,
                ]);
        }
    }

    public function actionDelete()
    {

        $cbox = Yii::$app->request->get('cbox');

        Yii::$app->response->format = Response::FORMAT_JSON;
        if(empty($cbox))
        {
            return ['code' => 400, 'message' => '没有要删除的数据'];
        }
        foreach($cbox as $k=>$id){
            if ($id) {
                $this->ClassModel->findOne($id)->delete();
            }else
            {
                return ['code' => 400, 'message' => '删除失败'];
            }
        }
        return ['code' => 200, 'message' => '删除成功'];

    }

}
