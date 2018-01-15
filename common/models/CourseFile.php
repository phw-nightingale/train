<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:45
 */

namespace common\models;
use Yii;

class CourseFile extends BaseModel
{
    /**s
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course_file}}";
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid','school_id','types','course_id','title','course_url','create_date'],'required'],
            [[ 'uid','school_id','course_id','create_date'], 'integer'],
            [['title'],'string','max'=>50],
        ];
}
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['uid','school_id','types','course_id','title','course_url','create_date'];
        $scenarios[self::SCENARIO_UPDATE] = ['uid','school_id','types','course_id','title','course_url'];
        return $scenarios;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'uid'=>'用户id',
            'school_id'=>'学校id',
            'course_id'=>'课件id',
            'types'=>'本地或外网',
            'title'=>'标题',
            'course_url'=>'课件上传路径',
            'create_date'=>'创建时间',
        ];
    }
    public function attributeValues()
    {
        return [
            'type' => [
                '0' => '本地',
                '1' => '外网',
            ]
        ];
    }
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['school_id']);
        return $search;
    }
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
            [
                'school_id'		=>'textInput',
            ],
            [
                'school_id'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
            ]
        );
        return $searchViews;
    }
}