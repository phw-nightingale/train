<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:45
 */

namespace common\models;
use Yii;

class CoursePower extends BaseModel
{
    /**s
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course_power}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id','school_uid','name','description','group_str','status'],'required'],
            [[ 'school_id','school_uid','status'], 'integer'],
            [['description','group_str'],'string','max'=>255],
            [['name'],'string','max'=>50],
        ];
}

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['school_id','school_uid','name','description','group_str','status'];
        $scenarios[self::SCENARIO_UPDATE] = ['name','description','group_str'];
        return $scenarios;
    }
/*    public function upload()
    {
        if ($this->validate()) {
            $this->cover->saveAs('uploads/' . $this->cover->baseName . '.' . $this->cover->extension);

            return true;
        } else {
            return false;
        }
    }*/
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'school_id'=>'学校id',
            'school_uid'=>'创建人[管理员]',
            'name'=>'组名称',
            'description'=>'组描述',
            'group_str'=>'用户角色ID以”,”拆分',
            'status'=>'状态',

        ];
    }
    public function attributeValues()
    {
        return [
            'status' => [
                0 => '关闭',
                1 => '开启'
            ]
        ];
    }
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['school_uid','name']);
        return $search;
    }
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
            [
                'school_uid'		=>'textInput',
                'name'		=>'textInput',
            ],
            [
                'school_uid'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
                'name'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
            ]
        );
        return $searchViews;
    }
}