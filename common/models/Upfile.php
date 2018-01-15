<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_upfile".
 *
 * @property integer $id
 * @property string $field
 * @property string $_csrf
 * @property string $name
 * @property string $path
 * @property string $path_tmp
 * @property string $filetype
 * @property integer $add_time
 */
class Upfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_upfile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['add_time'], 'integer'],
            [['field', 'name'], 'string', 'max' => 150],
            [['_csrf', 'path', 'path_tmp'], 'string', 'max' => 255],
            [['filetype'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field' => 'Field',
            '_csrf' => 'Csrf',
            'name' => 'Name',
            'path' => 'Path',
            'path_tmp' => 'Path Tmp',
            'filetype' => 'Filetype',
            'add_time' => 'Add Time',
        ];
    }
}
