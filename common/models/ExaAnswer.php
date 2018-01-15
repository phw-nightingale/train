<?php

namespace common\models;

use Yii;

/**
 * 试卷题目回答模型
 * This is the model class for table "edu_exa_answer".
 *
 * @property integer $id
 * @property integer $exa_user_id
 * @property integer $uid
 * @property integer $subject_id
 * @property string $content
 * @property integer $score
 * @property integer $is_ error
 * @property string $teacher_uid
 * @property string $teacher_reply
 * @property integer $status
 * @property integer $create_date
 */
class ExaAnswer extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_exa_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exa_user_id', 'uid', 'subject_id', 'score', 'is_error', 'status', 'create_date','id'], 'integer'],
            [['content', 'teacher_reply'], 'string'],
            [['teacher_uid'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'exa_user_id' => '用户试卷名称',
            'uid' => '回答人',
            'subject_id' => '题目名称',
            'content' => '内容与回答',
            'score' => '得分',
            'is_error' => '是否正确回答',
            'teacher_uid' => '批题教师名称',
            'teacher_reply' => '教师回复',
            'status' => '状态',
            'create_date' => '回答时间',
        ];
    }

     public function attributeValues(){
        return [
            'is_error'=>[
                '0'=>'正确',
                '1'=>'错误'
          ],
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
        $search = $searchModel->search($ModelClass,['exa_user_id','uid',
                                                        'like'=>['exa_user_id','uid'],
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
                            ['exa_user_id' => 'textInput',
                              'uid'       => 'textInput',
                            ],//名称=>类型
                           ['exa_user_id'     =>['style'=>'width:150px;padding-right:5px;','class'=>'select'],
                            'uid'      =>['style'=>'width:150px;padding-right:5px'],
                            ]//名称=>配置                   

                            );

        return $searchViews;

    }
}
