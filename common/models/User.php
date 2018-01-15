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
class User extends VerifyUser
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%web_user}}';
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
            'loa_password' => '原密码',
            'password'     => '新密码',
            'again_password' => '再次输入密码',
            'password_hash' => '密码',
            'password_reset_token' => '密码验证token',
            'email' => '邮箱',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'role_id' => '角色名',
            'mobile' => '手机',
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
}
