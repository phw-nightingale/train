<?php

namespace common\models;

use Yii;

/**
 * 题目管理模块
 * This is the model class for table "edu_exa_subject".
 *
 * @property integer $id
 * @property integer $school_id
 * @property integer $uid
 * @property integer $grade_id
 * @property string $title
 * @property string $content
 * @property string $file_url
 * @property integer $create_date
 * @property integer $type_id
 * @property integer $types
 * @property integer $status
 * @property integer $is_auto
 * @property integer $is_ open
 */
class ExaSubject extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_exa_subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'uid','create_date',  'status', 'is_auto', 'is_open'], 'integer'],
            [[ 'types','type_id', 'grade_id', 'content'], 'string'],
            [['title'], 'string', 'max' => 150],
            [['file_url'], 'string', 'max' => 255],
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
            'grade_id' => '年级名称',
            'title' => '标题',
            'content' => '内容与答案',
            'file_url' => '文件地址',
            'create_date' => '创建时间',
            'type_id' => '学科',
            'types' => '类型',
            'status' => '状态',
            'is_auto' => '自动批量',
            'is_open' => '是否公开',
        ];
    }

     public function attributeValues(){
        return [
          'types' => [
             '1' => '单选题',
             '2' => '多选题',
             '3' => '文体',
            ],
            'is_open'=>[
                '0'=>'否',
                '1'=>'是'
                ],
            'status'=>[
                '0'=>'关闭',
                '1'=>'开启'
              ],

        ];
    }
     public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['school_id','uid','type_id',
                                                        'like'=>['school_id','uid','type_id'],
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
                          
                             'type_id'    =>'textInput',
                            ],//名称=>类型
                           ['school_id'     =>['style'=>'width:150px;padding-right:5px;','class'=>'select'],
                            'uid'      =>['style'=>'width:150px;padding-right:5px'],
                     
                            'type_id'     =>['style'=>'width:150px;padding-right:5px','class'=>'select'],
                            ]//名称=>配置
                           


                                     );

        return $searchViews;

    }
}
