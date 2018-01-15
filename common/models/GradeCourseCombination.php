<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_grade_course_combination".
 *
 * @property integer $id
 * @property integer $school_id
 * @property integer $uid
 * @property integer $grade_id
 * @property integer $create_date
 * @property integer $title
 * @property integer $description
 * @property integer $content
 * @property string $course_com_str
 * @property integer $type_id
 * @property integer $status
 */
class GradeCourseCombination extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_grade_course_combination';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'uid', 'grade_id', 'create_date', 'title', 'description', 'content', 'type_id', 'status'], 'integer'],
            [['course_com_str'], 'string'],
            ['course_com_str','required','message'=>'abc']
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
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => '学校',
            'uid' => '操作人',
            'grade_id' => '年级',
            'create_date' => '创建时间',
            'title' => '课程标题',
            'description' => '描述',
            'content' => '内容',
            'course_com_str' => '课件组',
            'type_id' => '学科',
            'status' => '状态',
        ];
    }
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['title','like'=>['title']]);
        return $search;
    }


     
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
                                       ['title'     =>'textInput',
                                      
                                        ],//名称=>类型
                                       ['title'      =>['style'=>'width:250px;padding-right:5px;margin-bottom:3px'],
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
