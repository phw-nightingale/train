<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:45
 */

namespace common\models;
use Yii;

class Course extends BaseModel
{
    /**s
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%course}}";
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[[
                'school_id','uid','type_id','title','description', 'content','cover','people_num','time_long','integral', 'integral_type','score','ave_score','is_upload','is_open', 'is_ask_too','status','label_str','power_str','day','create_date'],'required'],*/
            [[ 'uid','school_id','create_date'], 'integer'],
            [['description','label_str','power_str'],'string','max'=>255],
            [['cover','title'],'string','max'=>150],
        ];
    }
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = [
            'school_id','uid','type_id','title','description','content','cover','people_num','time_long','integral','integral_type','score','ave_score','is_upload','is_open','is_ask_too','status','label_str','power_str','day','create_date'
        ];
        $scenarios[self::SCENARIO_UPDATE] = [
            'school_id','uid','type_id','title','description','content','cover','people_num','time_long','integral','integral_type','score','ave_score','is_upload','is_ open','is_ask_too','status','label_str','power_str','day','update_date'
        ];
        return $scenarios;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'uid'=>'用户id',
            'school_id'=>'学校id',
            'type_id'=>'课件类型',
            'title'=>'标题',
            'description'=>'描述',
            'content'=>'内容',
            'cover'=>'封面图片',
            'people_num'=>'难看人数',
            'time_long'=>'时长',
            'integral'=>'所需积分',
            'integral_type'=>'积分类型',
            'score'=>'总评分',
            'ave_score'=>'平均评分最大10',
            'is_upload'=>'是否上传文件',
            'is_open'=>'是否公开',
            'is_ask_too'=>'回答错误是否可过',
            'status'=>'状态',
            'label_str'=>'标签ID以”,”拆分',
            'power_str'=>'权限ID以”,”拆分',
            'day'=>'放置天数',
            'update_date'=>'更新时间',
            'create_date'=>'创建时间',
        ];
    }
    public function attributeValues()
    {
        return [
            'status' => [
                0 => '关闭',
                1 => '开启'
            ],
            'is_open'=>[
                '0'=>'否',
                '1'=>'是'
            ]
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
            [
                'title'		 =>['style'=>'margin:0.5em 1em; width:150px;padding-right:5px'],
            ]
        );
        return $searchViews;
    }
}