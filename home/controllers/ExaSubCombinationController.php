<?php
/**
 * Created by PhpStorm.
 * User: phw
 * Date: 18-1-4
 * Time: 下午7:52
 */

namespace app\controllers;


use common\models\ExaSubCombination;
use yii\data\Pagination;
use yii\web\Response;

/**
 * Class ExaSubCombinationController
 * @package app\controllers
 */
class ExaSubCombinationController extends BaseController
{

    /**
     * @return array|void
     */
    public function actions()
    {

        $this->ClassModel = new ExaSubCombination;

    }

    /**
     * Initializing Examination Subject Combination
     * @return string
     */
    public function actionIndex() {

        $searchViews = $this->ClassModel->viewSearch();
        $search = $this->ClassModel->search();
        $pages = new Pagination([
            'totalCount' => $search->count()
            ,'pageSize' => 20
        ]);
        $models = $search->offset($pages->offset)
                ->pageSize($pages->pageSize)
            ->all();

        return $this->render($this->actionID, [
            'searchViews' => $searchViews
            ,'search' => $search
            , 'pages' => $pages
            , 'models' => $models
        ]);

    }

    /**
     * 增加试题组
     * @return array|string
     */
    public function actionCreate()
    {

        $ClassModel = new $this->ClassModel;
        if ($ClassModel->load(\Yii::$app->request->post()) && $ClassModel->validate()) {

            \Yii::$app->response->format = Response::FORMAT_JSON;
            if ($ClassModel->save()) {
                return $this->getJsonArray();
            } else {
                return $this->getJsonArray(400, '操作失败');
            }

        } else {
            return $this->render($this->actionID, [
                'ClassModel' => $this->ClassModel
                , 'model' => $ClassModel
            ]);
        }

    }

    /**
     * 更新题目组
     * @return array|string
     */
    public function actionUpdate()
    {

        $ClassModel = $this->ClassModel;
        $id = \Yii::$app->request->get('id');
        $model = $ClassModel->findOne($id);
        $model->scenarios($ClassModel::SCENARIOS);
        if ($model->load(\Yii::$app->request->post())) {

            \Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->save()) {
                return $this->getJsonArray();
            } else {
                return $this->getJsonArray(400, '操作失败');
            }

        } else {

            return $this->render($this->actionID, [
                'ClassModel' => $this->ClassModel
                , 'model' => $ClassModel
            ]);
        }

    }


    /**
     * Do delete Examination Subject Combination
     * @return array
     */
    public function actionDelete()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;
        $checkBox = \Yii::$app->request->get('checkBox');

        if (empty($checkBox)) {
            return $this->getJsonArray(500, 'At least one selected Please');
        }

        foreach ($checkBox as $key => $id) {
            if (!$this->ClassModel->findOne($id)->delete()) {
                return $this->getJsonArray(500, 'An Error occurred when Delete ' . $key);
            }
        }
        return $this->getJsonArray();

    }

}