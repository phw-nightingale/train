<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_intergration_types".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $name
 * @property string $description
 * @property integer $status
 */
class IntergrationTypes extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_intergration_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 10],
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
            'school_id' => '学校',
            'name' => '积分名称',
            'description' => '描述',
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
