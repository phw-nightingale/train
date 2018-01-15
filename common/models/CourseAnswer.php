<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:45
 */

namespace common\models;
use Yii;

class CourseAnswer extends BaseModel
{
    /**s
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course_answer}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid','ask_id','course_id','answer'],'required'],
            [[ 'uid','ask_id','course_id','is_correct','create_date'], 'integer'],
            [['answer'],'string','max'=>255],
            [['create_date'],'default','value'=>time()],
        ];
}

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['uid','ask_id','course_id','answer','create_date','is_correct'];
        $scenarios[self::SCENARIO_UPDATE] = ['course_id','ask_id','answer'];
        return $scenarios;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'uid' => '用户id',
            'ask_id' => '课件题目id',
            'course_id'=>'课件id',
            'answer' => '题目的答案',
            'is_correct'=>'是否正确',
            'create_date' => '创建时间',

        ];
    }
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['ask_id']);
        return $search;
    }
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
            [
                'ask_id'		=>'textInput',
            ],
            ['ask_id'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
            ]
        );
        return $searchViews;
    }
}