<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:45
 */

namespace common\models;
use Yii;

class CourseAsk extends BaseModel
{
    /**s
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course_ask}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid','course_id','subject','content','types','answer','score','status'],'required'],
            [[ 'uid','course_id','types','score','status'], 'integer'],
            [['content','answer'],'string','max'=>255],
            [['subject'],'string','max'=>100],
        ];
}

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['uid','course_id','subject','content','types','answer','score','status'];
        $scenarios[self::SCENARIO_UPDATE] = ['subject','content','answer'];
        return $scenarios;
    }
/*    public function upload()
    {
        if ($this->validate()) {
            $this->cover->saveAs('uploads/' . $this->cover->baseName . '.' . $this->cover->extension);

            return true;
        } else {
            return false;
        }
    }*/
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'uid'=>'用户id',
            'course_id'=>'课件id',
            'subject'=>'题目',
            'content'=>'内容',
            'types'=>'题目类型',
            'answer'=>'题目答案',
            'score'=>'考试得分',
            'status'=>'状态',

        ];
    }
    public function attributeValues()
    {
        return [
            'status' => [
                0 => '关闭',
                1 => '开启'
            ]
        ];
    }
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['subject']);
        return $search;
    }
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
            [
                'subject'		=>'textInput',
            ],
            ['subject'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
            ]
        );
        return $searchViews;
    }
}