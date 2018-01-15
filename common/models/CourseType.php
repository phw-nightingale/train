<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_course_type".
 *
 * @property integer $id
 * @property integer $pid
 * @property integer $school_id
 * @property integer $uid
 * @property string $name
 * @property string $description
 * @property integer $create_date
 */
class CourseType extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course_type}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'school_id', 'uid', 'create_date'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['pid', 'school_id', 'uid', 'name', 'description', 'create_date'];
        $scenarios[self::SCENARIO_UPDATE] = ['pid', 'school_id', 'uid', 'name', 'description'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'pid' => '所属上级',
            'school_id' => '学校id',
            'uid' => '用户id',
            'name' => '课件类型名称',
            'description' => '描述',
            'create_date' => '创建时间',
        ];
    }
    /**
     * '������������'
     * @return array|null|\yii\db\ActiveRecord
     */
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
