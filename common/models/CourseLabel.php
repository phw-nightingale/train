<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:45
 */

namespace common\models;
use Yii;

class CourseLabel extends BaseModel
{
    /**s
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course_label}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid','school_id','pid','name','create_date'],'required'],
            [[ 'uid','school_id','create_date'], 'integer'],
            [['name'],'string','max'=>100],
        ];
}

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['uid','school_id','pid','name','create_date'];
        $scenarios[self::SCENARIO_UPDATE] = ['name'];
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
            'pid'=>'所属上级',
            'name'=>'名称',
            'create_date'=>'创建时间',
        ];
    }
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['name']);
        return $search;
    }
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
            [
                'name'		=>'textInput',
            ],
            ['name'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
            ]
        );
        return $searchViews;
    }
}