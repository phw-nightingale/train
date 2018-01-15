<?php
namespace app\controllers;


use yii\data\Pagination;
use \common\models\CourseAnswer;
use \common\models\CourseAsk;
use \common\models\Course;
use \common\models\CourseReply;
use \common\models\CourseWatch;
/**
 * Class IndexController
 * @package app\controllers
 */

class CourseController extends BaseController
{


    /**
     * @inheritdoc
     */


    /**
     * Login action.
     *我的课件信息
     * @return 我的课件信息集合
     */
    public function actionIndex()
    {
        $pageSize=10;
        $ClassModel=new Course; //课件模型
        $search = $ClassModel::find();
        $search->select($ClassModel->tableName().'.*,')->where([$ClassModel->tableName().".uid"=>$this->user->id])->asArray()->all();     //评论表关联课件表数据 注：uid:本地浏览器登
        $pages = new Pagination(['totalCount' => $search->count(), 'pageSize' => $pageSize]);
        $models = $search->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('reply',["models" => $models]);
	}

    /**
     * 获取个人问答信息
     * @return 个人问答信息集合
     */

    public function actionAnswer()
    {

        $pageSize=3;
        $ClassModel=new CourseAnswer;
        $RelationModel = new CourseAsk;
        $RelationModel2 = new Course;
        $search = $ClassModel::find();

        $RelatioWhere  =  $RelationModel->tableName().'.id' .'='. $ClassModel->tableName().'.ask_id';
        $search->innerJoin($RelationModel->tableName(),$RelatioWhere);

        $RelatioWhere  =  $RelationModel->tableName().'.course_id='.$RelationModel2->tableName().'.id';
        $search->innerJoin($RelationModel2->tableName(),$RelatioWhere);


        $search->select($ClassModel->tableName().'.*,'
            .$RelationModel->tableName().'.content,'
            .$RelationModel->tableName().'.answer trueAnswer,'
            .$RelationModel->tableName().'.types,'
            .$RelationModel2->tableName().'.title')
            ->where([$ClassModel->tableName().'.uid'=>$this->user->id])->asArray()->all();     //问题表数据

        $pages = new Pagination(['totalCount' => $search->count(), 'pageSize' => $pageSize]);
        $models = $search->offset($pages->offset)->limit($pages->limit)->all();
//        print_r($models);die;
        return $this->render($this->actionID,["models"=>$models]);
    }

    /**
     * 获取个人评论信息
     * @return 个人评论信息集合
     */
    public function actionReply()
    {


        $pageSize=10;
        $ClassModel=new CourseReply; //评论表
        $RelationModel = new Course; //课件表
        $search = $ClassModel::find();
        $RelatioWhere  =   $RelationModel->tableName().'.id' .'='. $ClassModel->tableName().'.course_id';
        $search->innerJoin($RelationModel->tableName(),$RelatioWhere);
        $search->select($ClassModel->tableName().'.*,'.$RelationModel->tableName().'.title')->where([$ClassModel->tableName().".uid"=>$this->user->id])->asArray()->all();     //评论表关联课件表数据 注：uid:本地浏览器登录用户id
        $pages = new Pagination(['totalCount' => $search->count(), 'pageSize' => $pageSize]);
        $models = $search->offset($pages->offset)->limit($pages->limit)->all();


        return $this->render('reply',["models" => $models]);
    }
    /**
     * 获取个人观看记录
     * @return 个人观看记录集合
     */
    public function actionWatch()
    {


        $pageSize=10;
        $ClassModel=new CourseWatch; //评论表
        $RelationModel = new Course; //课件表
        $search = $ClassModel::find();
        $RelatioWhere  =   $RelationModel->tableName().'.id' .'='. $ClassModel->tableName().'.course_id';
        $search->innerJoin($RelationModel->tableName(),$RelatioWhere);
        $search->select($ClassModel->tableName().'.*,'.$RelationModel->tableName().'.title')->where([$ClassModel->tableName().".uid"=>$this->user->id])->asArray()->all();     //评论表关联课件表数据 注：uid:本地浏览器登录用户id
        $pages = new Pagination(['totalCount' => $search->count(), 'pageSize' => $pageSize]);
        $models = $search->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('reply',["models" => $models]);
    }

}
