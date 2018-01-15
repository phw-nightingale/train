<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_course_score".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $course_id
 * @property integer $score
 * @property integer $create_date
 */
class CourseScore extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_score}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'course_id', 'score', 'create_date'], 'integer'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['uid', 'course_id', 'score', 'create_date'];
        $scenarios[self::SCENARIO_UPDATE] = ['uid', 'course_id', 'score', 'create_date'];
        return $scenarios;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => '用户id',
            'course_id' => '课件表id',
            'score' => '评分',
            'create_date' => '评论时间',
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
                'uid'       =>'textInput',
            ],
            ['uid'       =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
            ]
        );
        return $searchViews;
    }
}
