<?php
// +----------------------------------------------------------------------
// | TITLE:基础类
// +----------------------------------------------------------------------

namespace app\controllers;

use app\modules\Rbac;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use common\helps\Tree;
use yii\filters\VerbFilter;

/**
 * Class BaseController
 * @package app\controllers
 */
class BaseController extends Controller
{

    protected $ClassModel;

    public $controllerID;
    public $actionID;
    public $menuRule;
    public $menuHtml;
    public $actionTPL;
    public $userRole;

    public $layout = 'public';


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ],
        ];
    }


    public function behaviors()
    {
        $behaviors = [
            Rbac::className(),//权限控制[]
        ];
        return array_merge(parent::behaviors(), $behaviors);
    }

    public function beforeAction($action)
    {
        parent::beforeAction($action);
        $this->menuRule = (new \app\modules\Rbac)->verifyRule($this->route);

        if ($this->menuRule == false) {//游客
            $loginUrl = Url::toRoute('index/login');
            header("Location: $loginUrl");
            exit();
        }

        $this->controllerID = Yii::$app->controller->id;
        $this->actionID = Yii::$app->controller->action->id;


        if (!Yii::$app->user->isGuest) {
            $this->userRole = (new \common\models\SchoolRole)->findOne(Yii::$app->user->identity->role_id);

            $this->menuHtml = self::buildMenuHtml(Tree::makeTree($this->menuRule));
        }

        return true;
    }

    /**
     * 共用查询，查询一条数据
     * @param $where
     * @param $ClassModel
     * @return bool
     */
    protected function findModel($where, $ClassModel)
    {
        $model = is_array($where) ? $ClassModel::find()->where($where)->One() : $ClassModel::findOne($where);
        if ($model !== null) {
            return $model;
        } else {
            return false;
        }
    }

    /**
     * 共用新增
     * @param $data
     * @param $ClassModel
     * @return string
     * @throws \yii\db\Exception
     */
    protected function BaseCreate($data, $ClassModel)
    {
        foreach ($data as $key => $val) {
            $ClassModel->$key = $val;
        }
        if (!$ClassModel->save()) {//跳过验证增加数据
            Yii::$app->db->createCommand()->insert($ClassModel->tableName(), $data)->execute();
            return Yii::$app->db->getLastInsertId();
        } else {
            return $ClassModel->id;
        }

    }

    /**
     * 共用更新
     * @param $cbox
     * @param $data
     * @param $ClassModel
     * @param null $where
     * @return bool|int
     * @throws \yii\db\Exception
     */
    protected function BaseUpdate($cbox, $data, $ClassModel, $where = NULL)
    {
        if (!$cbox) return false;
        if (!$this->isAdmin && !count($where) && $where != NULL) $where = $this->sqlWhere['factory'];
        if (!is_array($cbox)) $cbox = [$cbox];

        foreach ($cbox as $k => $id) {
            if (!empty($id)) {
                if (is_numeric($k)) $k = 'id';

                if (!is_array($where)) $where = array();
                $swhere = $where + [$k => $id];
                $model = $this->findModel($swhere, $ClassModel);
                foreach ($data as $key => $val) {
                    $model->$key = $val;
                }

                if (!$model->save()) {//跳过验证增加数据
                    return Yii::$app->db->createCommand()->update($ClassModel->tableName(), $data, "{$k} = " . $id)->execute();
                }
            }
        }
        return true;
    }

    /**
     * 共用删除
     * @param $cbox
     * @param $ClassModel
     * @param null $where
     * @return bool
     */
    protected function BaseDelete($cbox, $ClassModel, $where = NULL)
    {
        if (!$this->isAdmin && !count($where) && $where != NULL) $where = $this->sqlWhere['factory'];

        if (!empty($ClassModel->attributeLabels()['pid'])) {
            if (!is_array($cbox)) $cbox = [$cbox];
            foreach ($cbox as $id) {
                $Data = $ClassModel::find()->select('id')->where(['pid' => $id])->asArray()->one();
                if ($Data) return false;
            }
        }

        if (!is_array($where)) $where = array();
        $where = $where + ['id' => $cbox];
        return $ClassModel::deleteAll($where);
    }


    /**
     * 生成页面菜单
     * @param $data
     * @param string $html
     * @return string
     */
    private static function buildMenuHtml($data, $html = '')
    {

        foreach ($data as $k => $v) {
            if (isset($v['type']) && $v['type'] != 2 && $v['status'] == 1) {

                if (isset($v['children']) && is_array($v['children'])) {
                    $html .= '<dl id="menu-admin"><dt><i class="Hui-iconfont">' . ($v['icon'] ? $v['icon'] : '&#xe61a;') . '</i> ' . $v['title'] . '<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt><dd><ul>';
                } else {
                    $html .= '<li><a data-href="' . Url::toRoute($v['route']) . '" data-title="' . $v['title'] . '" href="javascript:void(0)">' . $v['title'] . '</a></li>';
                }

                //需要验证是否有子菜单
                if (isset($v['children']) && is_array($v['children'])) {
                    $html .= self::buildMenuHtml($v['children']);
                    //验证是否有子订单
                    $html .= '</ul></dd></dl>';
                }
            }
        }
        return $html;
    }


}

