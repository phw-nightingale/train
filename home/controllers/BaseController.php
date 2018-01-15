<?php
// +----------------------------------------------------------------------
// | TITLE:基础类
// +----------------------------------------------------------------------

namespace app\controllers;

use app\modules\Rbac;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * Class BaseController
 * @package app\controllers
 */
class BaseController extends Controller
{


    public $controllerID;
    public $actionID;

    public $userMain;

    public $mainHead;
    public $mainLeft;
    public $mainFoot;
    public $ClassModel;
    public $user;
    public $modelUser;
    public $modelUserInfo;
    public $modelSchoolInfo;

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


        //如果为开放权限不用调用用户菜单转layout
        $this->allowUrl = array_merge(Yii::$app->params['allowUrl'], $this->allowUrl);


        if (!Yii::$app->user->isGuest) {
            $this->user = Yii::$app->user;
            $this->modelUser = (new \common\models\User)::findOne($this->user->id);
            $this->modelUserInfo = $this->modelUser->hasOne((new \common\models\UserInfo)::className(), ['uid' => 'id'])->one();
            $this->modelSchoolInfo = $this->modelUser->hasOne((new \common\models\SchoolInfo)::className(), ['id' => 'school_id'])->one();
        }


        if (!in_array($this->route, $this->allowUrl)) {

            $this->userMain = $this->verifyRule($this->route);
            if ($this->userMain == false) {//游客
                $loginUrl = Url::toRoute('index/index');
                header("Location: $loginUrl");
                exit();
            }
        } else {
            $this->layout = 'public';//前台架构
        }

        Yii::$app->session['route'] = $this->route;
        $this->controllerID = Yii::$app->controller->id;
        $this->actionID = Yii::$app->controller->action->id;


        if (is_array($this->userMain)) {
            $view = Yii::$app->view;
            foreach ($this->userMain as $key => $row) {//当前操作路由ID
                if ($row['route'] == Yii::$app->controller->module->requestedRoute) {
                    $view->params['route_id'] = $row['pid'];
                }
            }
        }

        return true;
    }

    /**
     * 查询一条OBJ数据
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
     * 共用删除方法删除[真删除]
     * @return string
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
     * 生成
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


    /**
     * 快捷获取Json字符串
     * @param int $code
     * @param string $message
     * @return array
     */
    public function getJsonArray($code = 200, $message = '操作成功')
    {
        return [
            'code' => $code
            , 'message' => $message
        ];
    }

}

