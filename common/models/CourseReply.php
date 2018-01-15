<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:45
 */

namespace common\models;
use Yii;

class CourseReply extends BaseModel
{
    /**s
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course_reply}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid','uid','course_id','content','is_verify','create_date'],'required'],
            [[ 'pid','uid','course_id','is_verify','create_date'], 'integer'],
            [['content'],'string','max'=>200],
        ];
}

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['pid','uid','course_id','content','is_verify','create_date'];
        $scenarios[self::SCENARIO_UPDATE] = ['content'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'pid'=>'所属上级[用于回复]',
            'uid'=>'用户',
            'course_id'=>'课件表id',
            'content'=>'评论内容',
            'is_verify'=>'状态[是否审核]',
            'create_date'=>'评论时间',

        ];
    }
    public function attributeValues()
    {
        return [
            'is_verify' => [
                0 => '审核未通过',
                1 => '未审核',
                2 =>'已审核',
            ]
        ];
    }
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['uid']);
        return $search;
    }
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
            [
                'uid'		=>'textInput',
            ],
            ['uid'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
            ]
        );
        return $searchViews;
    }
}