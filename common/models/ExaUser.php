<?php

namespace common\models;

use Yii;

/**
 * 学员考试模块
 * This is the model class for table "edu_exa_user".
 *
 * @property integer $id
 * @property integer $exa_id
 * @property integer $uid
 * @property string $content
 * @property integer $score
 * @property integer $right_num
 * @property integer $error_num
 * @property integer $open_date
 * @property integer $end_date
 * @property integer $audit_date
 * @property integer $create_date
 * @property integer $status
 */
class ExaUser extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_exa_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exa_id','uid', 'score', 'right_num', 'error_num',  'audit_date', 'create_date', 'status','content'], 'integer'],
            [[ 'open_date', 'end_date'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'exa_id' => '试卷名称',
            'uid' => '回答人',
            'content' => '内容与答案',
            'score' => '总得分',
            'right_num' => '正确数',
            'error_num' => '错误数',
            'open_date' => '开考时间',
            'end_date' => '结束时间',
            'audit_date' => '审核时间',
            'create_date' => '创建时间',
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
        $search = $searchModel->search($ModelClass,['exa_id','score',
                                                        'like'=>['exa_id','score'],
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
                            ['exa_id' => 'textInput',
                              'score'       => 'textInput',
                          
                            ],//名称=>类型
                           ['exa_id'     =>['style'=>'width:150px;padding-right:5px;','class'=>'select'],
                            'score'      =>['style'=>'width:150px;padding-right:5px'],
                            ]//名称=>配置
                           


                                     );

        return $searchViews;

    }
    //开考时间和结束时间
    public function beforeSave($insert){
      if(parent::beforeSave($insert)) {
        if($insert) {      
           $this->open_date = strtotime($this->open_date);
           $this->end_date = strtotime($this->end_date);
        }
        return true;
      }else {
        return false;
      }
    }
}
