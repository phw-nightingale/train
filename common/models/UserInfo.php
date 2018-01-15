<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_user_info".
 *
 * @property integer $uid
 * @property integer $school_id
 * @property string $major
 * @property string $classname
 * @property double $money
 * @property string $icon
 */
class UserInfo extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'school_id'], 'integer'],
            [['money'], 'number'],
            [['major'], 'string', 'max' => 100],
            [['classname'], 'string', 'max' => 50],
            [['icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => '用户ID',
            'school_id' => '学校',
            'major' => '所学专业',
            'classname' => '班级',
            'money' => '会员资金',
            'icon' => '头像',
        ];
    }
	
	
	
	
	
	
	
	
}
