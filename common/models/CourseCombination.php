<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:45
 */

namespace common\models;
use Yii;

class CourseCombination extends BaseModel
{
    /**s
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course_combination}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','description','content','cover'],'required'],
            [[ 'school_id', 'uid', 'course_num','score','ave_score','create_date'], 'integer'],
            [['title'],'string','max'=>50],
            [['description'],'string','max'=>255],
            [['content'], 'string', 'max' => 255],
            [['cover'],'string','max'=>150],
            /*[['cover'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg,gif'],*/
            [['create_date'],'default','value'=>time()],
        ];
}

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = [ 'school_id', 'uid', 'title', 'description', 'course_str','content','cover','course_num','score','ave_score','create_date'];
        $scenarios[self::SCENARIO_UPDATE] = ['title', 'description', 'course_str','content','cover'];
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
            'school_id' => '学校id',
            'uid' => '用户id',
            'title' => '标题',
            'description' => '描述',
            'content'=>'内容',
            'course_str' => '课件ID以”,”拆分',
            'cover' => '封面图片',
            'course_num' => '课件数',
            'score' => '课件总评分',
            'ave_score' => '平均评分最大10',
            'create_date' => '创建时间',

        ];
    }
    public static function search()
    {
        $searchModel    = new \app\modules\Search();
        $className = get_class();
        $ModelClass     = new $className();
        $search = $searchModel->search($ModelClass,['title']);
        return $search;
    }
    public static function viewSearch()
    {
        $searchModel    = new \app\modules\Search();
        $className      = get_class();
        $ModelClass     = new $className();
        $searchViews    = $searchModel->viewSearch($ModelClass,['url'=>Yii::$app->controller->action->id],//提交地址
            [
                'title'		=>'textInput',
            ],
            ['title'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
            ]
        );
        return $searchViews;
    }
}