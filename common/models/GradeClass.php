<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_grade_class".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $name
 * @property integer $level_id
 * @property integer $second_college
 * @property string $teacher_str
 * @property string $major
 * @property integer $course_id
 */
class GradeClass extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_grade_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'level_id', 'second_college', 'course_id'], 'integer'],
            [['name', 'major'], 'string', 'max' => 50],
            [['teacher_str'], 'string', 'max' => 255],
            ['school_id','required']
        ]; 
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => '学校',
            'name' => '班级',
            'level_id' => '年级',
            'second_college' => '系部',
            'teacher_str' => '老师',
            'major' => '专业',
            'course_id' => '课程',
        ];
    }

    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['major','like'=>['major']]);
        return $search;
    }


     
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
                                       ['major'     =>'textInput',
                                      
                                        ],//名称=>类型
                                       ['major'      =>['style'=>'width:250px;padding-right:5px;margin-bottom:3px'],
                                        //'route'      =>['style'=>'width:150px;padding-right:5px'],
                                       //  'type'       =>['style'=>'width:150px;padding-right:5px','class'=>'select'],
                                       //  'is_show'    =>['style'=>'width:150px;padding-right:5px','class'=>'select'],
                                       //  'status'     =>['style'=>'width:150px;padding-right:5px','class'=>'select'],
                                        ]//名称=>配置
                                       
                                       // ['type'       =>[''=>'类型'] + $ModelClass->attributeValues()['type'],
                                       //  'is_show'    =>[''=>'是否显示'] + $ModelClass->attributeValues()['is_show'],
                                       //  'status'     =>[''=>'状态'] + $ModelClass->attributeValues()['status'],
                                       //  ]//名称=>原数据
                                     );

        return $searchViews;

    }
    
}
