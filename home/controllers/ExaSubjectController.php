<?php
/**
 * Created by PhpStorm.
 * User: phw
 * Date: 18-1-4
 * Time: 下午6:40
 */

namespace app\controllers;
use common\models\ExaSubject;
use yii\data\Pagination;
use yii\web\Response;

/**
 * 题目类控制器
 * Class ExaSubjectController
 * @package app\controllers
 */
class ExaSubjectController extends BaseController
{


    /**
     * When controller is initializing,
     * It will run this method first
     * @return array|void
     */
    public function actions() {
        $this->ClassModel = new ExaSubject;
    }

    /**
     * 初始化显示试题题目
     * @return string
     */
    public function actionIndex() {

        //搜索条工具，在model类里
        $searchViews = $this->ClassModel->viewSearch();
        //搜索条件
        $search = $this->ClassModel->search();

        $pages = new Pagination([
            'totalCount' => $search->count()
            ,'pageSize' => 20
        ]);

        $models = $search->offset($pages->offset)
                        ->limit($pages->pageSize)
                        ->all();

        return $this->render($this->actionID, [
            'searchViews' => $searchViews
            ,'search' => $search
            ,'pages' => $pages
            ,'models' => $models
        ]);
    }

    /**
     * 发布题目
     * @return array|string
     */
    public function actionCreate() {

        $ClassModel = new $this->ClassModel();
        if ($ClassModel->load(\Yii::$app->request->post()) && $ClassModel->validate()) {

            if ($ClassModel->save()) {

                \Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'code' => 200
                    ,'message' => '发布成功'
                ];
            } else {

                return [
                    'code' => 500
                    ,'message' => '发布失败'
                ];
            }

        } else {
            return $this->render($this->actionID, [
                'ClassModel' => $this->ClassModel
                ,'model' => $ClassModel
            ]);
        }

    }

    /**
     * Delete Examination Subject(s)
     * @return array
     */
    public function actionDelete() {

        $checkBox = \Yii::$app->request->get('checkBox');
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (empty($checkBox)) {
            return [
                'code' => 500
                ,'message' => 'At least one more record select Please'
            ];
        } else {
            foreach ($checkBox as $key => $id) {
                if (!$this->ClassModel->findOne($id)->delete()) {
                    return $this->getJsonArray(500, 'An Error occurred when Delete ' . $key);
                }
            }
            return $this->getJsonArray();
        }

    }

    /**
     * @return array|string
     */
    public function actionUpdate() {

        $ClassModel = $this->ClassModel;
        $id = \Yii::$app->request->get('id');
        $model = $this->ClassModel->findOne($id);
        $model->scenarios($ClassModel::SCENARIOS);
        if ($model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->save()) {
                return [
                    'code' => 200
                    ,'message' => '修改成功'
                ];
            } else {
                return [
                    'code' => 500
                    ,'message' => '修改失败'
                ];
            }
        } else {
            return $this->render($this->actionID, [
                'ClassModel' => $this->ClassModel
                ,'model' => $ClassModel
            ]);
        }
    }

}