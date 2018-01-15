<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 14:53
 */

namespace app\controllers;
use Yii;
use yii\data\Pagination;
use yii\web\Response;
use common\models\SchoolRule;
use common\models\SchoolRole;


class UserController extends BaseController
{
    public function actions()
    {
        $this->ClassModel=new \common\models\SchoolUser;
    }

    public  function  actionIndex()
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
    public function actionCreate()
    {
        $ClassModel = $this->ClassModel;
        $SchoolRole  = new SchoolRole();//角色 
        $modelData = new $ClassModel(['scenario' => $ClassModel::SCENARIO_CREATE]);
        if ($modelData->load(Yii::$app->request->post()) && $modelData->validate()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $userPassword = Yii::$app->request->post('password_hash');
            $modelData->setPassword($userPassword);
            /*$createDate['role_id']=$modelData->role_id;
            $createDate['username']=$modelData->username;
            $createDate['mobile']=$modelData->mobile;
            $createDate['email']=$modelData->email;
            $createDate['password_hash']=$modelData->password_hash;
            $createDate['password_reset_token']=$modelData->password_reset_token;
            $createDate['auth_key']=$modelData->auth_key;
            $createDate['login_ip']=$modelData->login_ip;
            $createDate['login_time']=$modelData->login_time;
            $createDate['login_num']=$modelData->login_num;
            $createDate['full_name']=$modelData->full_name;
            $createDate['gender']=$modelData->gender;
            $createDate['status']=$modelData->status;
            $createDate['created_at']=$modelData->created_at;*/
            if($modelData->save()){
                return ['code'=>'200','message' => '添加成功'];
            }else{
                return ['code'=>'400','message'=>'添加失败'];
            }
            /*if($this->BaseCreate($createDate,$modelData)){
                return ['code'=>'200','message' => '添加成功'];
            }else{
                return ['code'=>'400','messge'=>'添加失败'];
            }*/

        }else{
            $all=$SchoolRole::find()->where(['status'=>1])->asArray()->all();//
            $dataList['role_id']=array_column($all,'name','id');
            return $this->render($this->actionID,[
                /*'menu_route' => $this->menu_route,*/
                'model' => $modelData,
                'dataList'=>$dataList,
            ]);
        }


    }
    public function actionUpdate()
    {
        $ClassModel = $this->ClassModel;
        $SchoolRole  = new SchoolRole();//角色
        $id=Yii::$app->request->get("id");
        $model=$ClassModel::findOne($id);
        $model->scenarios($ClassModel::SCENARIO_UPDATE);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $password=Yii::$app->request->post("password_hash");
            if(!empty($password)){
                $model->setPassword($password);
            }
            if($model->save()){
                return ['code'=>'200','message' => '添加成功'];
            }else{
                return ['code'=>'400','message'=>'添加失败'];
            }


        }else{
            $all=$SchoolRole::find()->where(['status'=>1])->asArray()->all();//
            $dataList['role_id']=array_column($all,'name','id');
            return $this->render($this->actionID,[
                /*'menu_route' => $this->menu_route,*/
                'model' => $model,
                'dataList'=>$dataList,
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

            if ($id && $id !== 1) {
                $this->ClassModel->findOne($id)->delete();
            }else
            {
                return ['code' => 400, 'message' => '删除失败'];
            }
        }
        return ['code' => 200, 'message' => '删除成功'];
    }
}