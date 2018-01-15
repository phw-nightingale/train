<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_grade_class_course".
 *
 * @property integer $id
 * @property integer $school_id
 * @property integer $uid
 * @property string $name
 * @property string $description
 * @property integer $class_id
 * @property string $teacher_str
 * @property string $grade_com_str
 * @property integer $create_date
 * @property integer $update_date
 * @property string $open_date
 * @property string $end_date
 * @property integer $status
 */
class GradeClassCourse extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_grade_class_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'uid', 'class_id', 'create_date', 'update_date', 'status'], 'integer'],
            [['open_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description', 'teacher_str', 'grade_com_str'], 'string', 'max' => 255],
            ['description','required']
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
            'uid' => '操作人',
            'name' => '课程名称',
            'description' => '描述',
            'class_id' => '班级',
            'teacher_str' => '教师',
            'grade_com_str' => '年级课程组',
            'create_date' => '创建时间',
            'update_date' => '更新时间',
            'open_date' => '开课时间',
            'end_date' => '结课时间',
            'status' => '状态',
        ];
    }

    public function attributeValues(){
        return [
            'status'=>[
                '0'=>'关闭',
                '1'=>'开启'
            ]
        ];
    }

    public function updateStatus($id){
        
    }


     public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['name','like'=>['name']]);
        return $search;
    }


     
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
                                       ['name'     =>'textInput',
                                      
                                        ],//名称=>类型
                                       ['name'      =>['style'=>'width:250px;padding-right:5px;margin-bottom:3px'],
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
