<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_live".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $title
 * @property integer $teacher_uid
 * @property integer $description
 * @property string $content
 * @property integer $people_num
 * @property integer $integration_type_id
 * @property double $integration
 * @property string $live_url
 * @property string $group_str
 * @property integer $open_date
 * @property integer $end_date
 * @property integer $create_date
 * @property integer $status
 * @property integer $is_ audit
 * @property integer $audit_date
 * @property integer $audit_school_id
 */
class Live extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_live';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'teacher_uid', 'description', 'people_num', 'integration_type_id', 'open_date', 'end_date', 'create_date', 'status', 'is_audit', 'audit_date', 'audit_school_id'], 'integer'],
            [['content'], 'string'],
            [['integration'], 'number'],
            [['title'], 'string', 'max' => 150],
            [['live_url', 'group_str'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => '创建用户',
            'title' => '直播标题',
            'teacher_uid' => '直播人名称',
            'description' => '描述',
            'content' => '内容',
            'people_num' => '可进人数',
            'integration_type_id' => '积分类型',
            'integration' => '所需积分',
            'live_url' => '直播地址链接',
            'group_str' => '可进角色权限',
            'open_date' => '直播开始时间',
            'end_date' => '直播结束时间',
            'create_date' => '创建时间',
            'status' => '状态',
            'is_audit' => '审核',
            'audit_date' => '审核时间',
            'audit_school_id' => '审核管理员名称',
        ];
    }
     public function attributeValues(){
        return [
            'is_audit'=>[
                '0'=>'审核未通过',
                '1'=>'未审核',
                '2'=>'审核通过',
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
        $search = $searchModel->search($ModelClass,['teacher_uid','uid','teacher_uid',
                                                        'like'=>['teacher_uid','uid','teacher_uid'],
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
                            ['teacher_uid' => 'textInput',
                              'uid'       => 'textInput',
                          
                             'status'    =>'textInput',
                            ],//名称=>类型
                           ['teacher_uid'     =>['style'=>'width:150px;padding-right:5px;','class'=>'select'],
                            'uid'      =>['style'=>'width:150px;padding-right:5px'],
                     
                            'status'     =>['style'=>'width:150px;padding-right:5px','class'=>'select'],
                            ]//名称=>配置
                           


                                     );

        return $searchViews;

    }
}
