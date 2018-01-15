<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_school_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $full_name
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $role_id
 * @property string $mobile
 * @property integer $gender
 * @property string $login_ip
 * @property string $login_time
 * @property integer $login_num
 */
class SchoolUser extends VerifyUser
{
    const SCENARIO_USER_UPDATE = 'user_update';

    /**
     * 用户状态
     */
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%school_user}}';
    }
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email', 'role_id'], 'required'],
            [['status', 'created_at', 'updated_at', 'role_id', 'gender', 'login_num'], 'integer'],
            [['login_time'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['full_name'], 'string', 'max' => 50],
            [['auth_key'], 'string', 'max' => 32],
            [['mobile'], 'string', 'max' => 15],
            [['login_ip'], 'string', 'max' => 30],
        ];
    }
    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_CREATE] =
            [
                'username',
                'full_name',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'status',
                'created_at',
                'role_id',
                'mobile',
                'gender',
                'login_ip',
                'login_time',
                'login_num'
            ];

        $scenarios[self::SCENARIO_UPDATE] =
            [
                'username',
                'full_name',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'status',
                'updated_at',
                'role_id',
                'mobile',
                'gender',
                'login_ip',
                'login_time',
                'login_num'
            ];
        $scenarios[self::SCENARIO_USER_UPDATE] = [
            'password_hash',
            'updated_at',
            'email',
            'mobile'
        ];
        return $scenarios;

    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'full_name' => '真实姓名',
            'auth_key' => '自动秘钥',
            'password_hash' => '密码',
            'password_reset_token' => '密码验证token',
            'email' => '邮箱',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'role_id' => '角色名',
            'mobile' => '电话',
            'gender' => '性别',
            'login_ip' => '登录IP',
            'login_time' => '登录时间',
            'login_num' => '登录次数',
        ];
    }
    public function attributeValues()
    {
        return [
            'status' => [
                '0' => '停用',
                '1' => '正常',
            ],
            'gender' => [
                '0' => '男',
                '1' => '女',
            ]
        ];

    }
    public static function deleteUser($where)
    {
        $model = self::find()->where($where)->One();
        if ($model) {
            $model->scenarios(self::SCENARIO_UPDATE);
            //$model->status = self::STATUS_DELETED;

            if(!$model->status){
                $model->status = 1;
            }else{
                $model->status = 0;
            }

            $model->save();
            return ($model->save()) ? true : false;
        } else {
            return false;
        }
    }
    /*
     *
     *获取用户角色
     *
     */
    public function getAdminRole()
    {
        return $this->hasOne(SchoolRole::className(), ['id' => 'role_id'])->asArray()->one();
    }
    /**
     * 获取用户企业.职位
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getSchoolRule()
    {
        return $this->hasOne(SchoolRule::className(), ['user_id' => 'id'])->asArray()->one();
    }

    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['username','mobile','full_name']);
        return $search;
    }
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
            [
                'username'		=>'textInput',
                'mobile'		=>'textInput',
                'full_name'		=>'textInput',
                /*'gender'		=>'textInput',*/
            ],
            [
                'username'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
                'mobile'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
                'full_name'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
                /*'gender'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],*/
            ]
        );
        return $searchViews;
    }
}
