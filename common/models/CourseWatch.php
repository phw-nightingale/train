<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:45
 */

namespace common\models;
use Yii;

class CourseWatch extends BaseModel
{
    /**s
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course_watch}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id','uid','when_long','end_date'],'required'],
            [['course_id','uid','when_long','end_date'], 'integer'],
        ];
}

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['course_id','uid','when_long','end_date'];
        $scenarios[self::SCENARIO_UPDATE] = ['course_id','uid','when_long','end_date'];
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
            'course_id'=>'课件id',
            'when_long'=>'观看课件的时间记录',
            'end_date'=>'最后观看时间',

        ];
    }
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['course_id']);
        return $search;
    }
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
            [
                'course_id'		=>'textInput',
            ],
            ['course_id'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
            ]
        );
        return $searchViews;
    }
}