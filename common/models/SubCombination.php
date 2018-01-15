<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_course_type".
 *
 * @property integer $id
 * @property integer $pid
 * @property integer $school_id
 * @property integer $uid
 * @property string $name
 * @property string $description
 * @property integer $create_date
 */
class CourseType extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course_type}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'school_id', 'uid', 'create_date'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'pid' => '所属上级',
            'school_id' => '学校id',
            'uid' => '用户id',
            'title' => '标题',
            'name' => '课件类型名称',
            'description' => '描述',
            'create_date' => '创建时间',
            'status' => '状态',

        ];
    }
    public function attributeValues(){
        return [
            'status'=>[
                '0'=>'关闭',
                '1'=>'开启'
            ],

        ];
    }
    /**
     * 搜索
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['status']);
        return $search;
    }
    
    
}