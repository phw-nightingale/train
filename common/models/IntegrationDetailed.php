<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_integration_detailed".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $type_id
 * @property double $have
 * @property double $have_num
 * @property integer $is_income
 * @property string $description
 * @property integer $create_date
 */
class IntegrationDetailed extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_integration_detailed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'type_id', 'is_income', 'create_date'], 'integer'],
            [['have', 'have_num'], 'number'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => '用户',
            'type_id' => '积分类型',
            'have' => '剩余积分数量',
            'have_num' => '使用数据',
            'is_income' => '是否为收入',
            'description' => '明细描述',
            'create_date' => '创建时间',
        ];
    }
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['uid','like'=>['uid']]);
        return $search;
    }


     
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
                                       ['uid'     =>'textInput',
                                      
                                        ],//名称=>类型
                                       ['uid'      =>['style'=>'width:250px;padding-right:5px;margin-bottom:3px'],
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
