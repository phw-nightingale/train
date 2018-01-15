<?php
/**
 * Created by PhpStorm.
 * User: phw
 * Date: 18-1-4
 * Time: 上午9:58
 */

namespace app\controllers;

use common\models\Examination;
use yii\data\Pagination;
use Yii;
use yii\web\Response;

class ExaminationController extends BaseController
{

    public function actions()
    {
        $this->ClassModel = new Examination;
    }

    /**
     * 初始化显示试题
     * @return string
     */
    public function actionIndex()
    {

        $searchViews = $this->ClassModel->viewSearch();
        $search = $this->ClassModel->search();

        $pages = new Pagination([
            'totalCount' => $search->count(),
            'pageSize' => '2'
        ]);

        $models = $search->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render($this->actionID, [
            'ClassModel' => $this->ClassModel
            , 'model' => $models
            , 'pages' => $pages
            , 'searchViews' => $searchViews
        ]);

    }

    public function actionCreate()
    {

        $ClassModel = new $this->ClassModel();

        if ($ClassModel->load(Yii::$app->request->post()) && $ClassModel->validate()) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($ClassModel->save()) {
                return [
                    'code' => 200
                    ,'message' => '添加成功'
                ];
            } else {
                return [
                    'code' => 500
                    ,'message' => '添加失败'
                ];
            }
        } else {
            $this->render($this->actionId, [
                'ClassModel' => $this->ClassModel
                ,'model' => $ClassModel
            ]);
        }

    }

}