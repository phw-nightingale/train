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
class SchoolRole extends BaseModel
{
    /**
     * 超级管理员分组[默认ID为1]
     */
    const ADMIN_ID = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%school_role}}';
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
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['code', 'name', 'create_date', 'des',];
        $scenarios[self::SCENARIO_UPDATE] = ['code', 'name', 'update_user', 'des', 'update_date', 'rule'];
        return $scenarios;

    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => '角色编号',
            'name' => '角色面称',
            'des' => '角色描述',
            'create_user' => '创建人',
            'create_date' => '创建时间',
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
        $SchoolRule = SchoolRule::find();
        $SchoolRule->where(['status' => 1]);
        $SchoolRule->andWhere(['is_show' => 1]);
        $SchoolRule->orderBy('order desc');
        if (self::ADMIN_ID != $id) {
            $roleOne = SchoolRole::findOne($id);
            $roleOne->rule = explode(',', $roleOne->rule);
            $SchoolRule->andWhere(['in', 'id', $roleOne->rule]);
        }
        return $SchoolRule->asArray()->all();
    }
	
    /**
     * 删除角色
     * @param $id
     * @return bool
     */
    public static function deleteRole($where)
    {
		$model = self::find()->where($where)->One();
        if ($model) {
			if(!$model->status){
				$model->status = 1;
			}else{
				$model->status = 0;
			}
            $model->save();
            return true;
        } else {
            return false;
        }
    }
	
	
    /**
     * 搜索返回条件
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function search()
    {
		$searchModel    = new \app\modules\Search();
		$className = get_class();
		$search = $searchModel->search(new $className(),['status',
														'like'=>['name','code'],
														//'Relation'=>[new \app\models\Factory(),'One','factory_id','id',['name','address']],
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
		$className = get_class();
		$searchViews    = $searchModel->viewSearch(new $className(),['url'=>'index'],//提交地址
										
									   ['name'	=>'textInput',
										'code'	=>'textInput',
										],//名称=>类型
									   
									   ['name'	=>['style'=>'width:150px;padding-right:5px'],
										'code'	=>['style'=>'width:150px;padding-right:5px']
										],//名称=>配置
									   
									   []//名称=>原数据
									   
									 );
		return $searchViews;

    }
	
}
