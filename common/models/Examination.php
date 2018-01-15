<?php

namespace common\models;

use Yii;

/**
 * 试卷管理模型
 * This is the model class for table "edu_examination".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $uid
 * @property string $title
 * @property string $description
 * @property integer $sub_str
 * @property integer $grade_id
 * @property string $class_str
 * @property integer $subject_num
 * @property string $all_score
 * @property string $score_json
 * @property integer $create_date
 * @property integer $status
 * @property integer $open_date
 * @property integer $end_date
 */
class Examination extends BaseModel
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_examination';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id','uid', 'sub_str', 'grade_id', 'subject_num', 'create_date', 'status', 'open_date', 'end_date'], 'integer'],
            [['all_score', 'score_json'], 'string'],
            [['description', 'class_str'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => '学校名称',
            'uid' => '创建人',
            'title' => '试卷标题',
            'description' => '描述',
            'sub_str' => '题目组名称',
            'grade_id' => '年级名称',
            'class_str' => '班级名称',
            'subject_num' => '题目数量',
            'all_score' => '总分数',
            'score_json' => '分数',
            'create_date' => '创建时间',
            'status' => '状态',
            'open_date' => '开考时间',
            'end_date' => '结束时间',
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
        public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['sub_str','grade_id','class_str',
                                                        'like'=>['sub_str','grade_id','class_str'],
                                                        ]);
        return $search;
    }

        /**
     * 搜索视图条
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
                            ['sub_str' => 'textInput',
                             'grade_id'       => 'textInput',
                             'class_str'    =>'textInput',
                            ],//名称=>类型
                           ['sub_str'     =>['style'=>'width:150px;padding-right:5px;','class'=>'select'],
                            'grade_id'      =>['style'=>'width:150px;padding-right:5px'],                 
                            'class_str'     =>['style'=>'width:150px;padding-right:5px','class'=>'select'],
                            ]//名称=>配置
                           


                                     );

        return $searchViews;

    }
}
