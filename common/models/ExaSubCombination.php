<?php

namespace common\models;

use Yii;

/**
 * 题目组模块
 * This is the model class for table "edu_exa__sub_combination".
 *
 * @property integer $id
 * @property integer $school_id
 * @property integer $uid
 * @property string $title
 * @property string $subject_str
 * @property string $description
 * @property integer $create_date
 * @property string $grade_str
 * @property integer $status
 */
class ExaSubCombination extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_exa__sub_combination';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id',  'uid','create_date', 'status'], 'integer'],
            [['subject_str'], 'string'],
            [['title'], 'string', 'max' => 11],
            [['description', 'grade_str'], 'string', 'max' => 255],
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
            'title' => '标题',
            'subject_str' => '题目',
            'description' => '描述',
            'create_date' => '创建时间',
            'grade_str' => '年级',
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
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['school_id','uid','grade_str',
                                                        'like'=>['school_id','uid','grade_str'],
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
                            ['school_id' => 'textInput',
                              'uid'       => 'textInput',
                          
                             'grade_str'    =>'textInput',
                            ],//名称=>类型
                           ['school_id'     =>['style'=>'width:150px;padding-right:5px;','class'=>'select'],
                            'uid'      =>['style'=>'width:150px;padding-right:5px'],
                     
                            'grade_str'     =>['style'=>'width:150px;padding-right:5px','class'=>'select'],
                            ]//名称=>配置
                           


                                     );

        return $searchViews;

    }
}
