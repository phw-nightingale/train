<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_school_role".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $des
 * @property string $create_user
 * @property string $create_date
 * @property string $update_user
 * @property string $update_date
 * @property integer $status
 * @property string $rule
 */
class Role extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%web_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['create_date', 'update_date'], 'safe'],
            [['status'], 'integer'],
            [['rule'], 'string'],
            [['code', 'name', 'create_user', 'update_user'], 'string', 'max' => 50],
            [['des'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => '角色编号',
            'name' => '角色名称',
            'des' => '角色描述',
            'create_user' => '创建人',
            'create_date' => '创建事假',
            'update_user' => '修改人',
            'update_date' => '修改时间',
            'status' => '状态',
            'rule' => '路由权限',
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
     * 获取权限
     * @param $id 用户角色
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getRule($id)
    {
        $Rule = Rule::find();
        $Rule->where(['status' => 1]);
        $Rule->andWhere(['is_show' => 1]);
        $Rule->orderBy('order desc');
		//print_r(implode(',',array_column($Rule->select('id')->asArray()->all(),'id')));die;
		$roleOne = Role::findOne($id);
		
		$roleOne->rule = explode(',', $roleOne->rule);
		$Rule->andWhere(['in', 'id', $roleOne->rule]);

        return $Rule->asArray()->all();
    }
	
	
	
}
