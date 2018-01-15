<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_school_info".
 *
 * @property integer $id
 * @property string $name
 * @property string $introduction
 * @property string $login
 * @property string $address
 * @property string $tel
 * @property string $email
 * @property string $create_date
 * @property string $member_num
 */
class SchoolInfo extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%school_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['create_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['introduction', 'login', 'address', 'member_num'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '学校名称',
            'introduction' => '简介',
            'login' => 'LOGO',
            'address' => '的在地址',
            'tel' => '联系电话',
            'email' => '邮箱',
            'create_date' => '创建时间',
            'member_num' => '会员数',
        ];
    }
}
