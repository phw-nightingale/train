<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\MainWidget;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE HTML>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <meta name="keywords" content="木子_培训网"/>
        <meta name="description" content="木子_培训网"/>
        <link rel="shortcut icon" href="./publics/resource/images/favicon.ico"/>


        <?php AppAsset::addCss($this, '@web/publics/resource/css/bootstrap.min.css'); ?>
        <?php AppAsset::addCss($this, '@web/publics/resource/css/common.css'); ?>

        <!--------------------banner--------------------->
        <?php AppAsset::addScript($this, '@web/publics/resource/js/lib/jquery-1.11.1.min.js', ['position' => $this::POS_HEAD]); ?>
        <?php AppAsset::addScript($this, '@web/publics/resource/js/lib/bootstrap.min.js'); ?>
        <?php AppAsset::addScript($this, '@web/publics/resource/js/layer/2.4/layer.js'); ?>
        <!--------------------banner-over--------------------->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    </head>

    <body>
    <?php $this->beginBody() ?>

    <div class="loader" style="display:none">
        <div class="la-ball-clip-rotate">
            <div></div>
        </div>
    </div>

    <div data-skin="default" class="skin-default ">

        <div class="head">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container ">
                    <div class="navbar-header">
                        <span class="version hidden">1.0.0</span>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <?= MainWidget::mainHead(); ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown msg">
                                <a href="javascript:;" class="dropdown-toogle" data-toggle="dropdown"><span
                                            class="wi wi-bell"></span>消息</a>
                                <div class="dropdown-menu">
                                    <div class="clearfix top">消息<a href="./index.php?c=message&a=notice&"
                                                                   class="pull-right">查看更多</a></div>
                                    <div class="msg-list-container">
                                        <div class="msg-list">
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="wi wi-user color-gray"></i>gxmuzi <span class="caret"></span></a>
                                <ul class="dropdown-menu color-gray" role="menu">
                                    <li><a href="./index.php?c=user&a=profile&" target="_blank"><i
                                                    class="wi wi-account color-gray"></i> 我的账号</a></li>
                                    <li class="divider"></li>
                                    <li><a href="./index.php?c=cloud&a=upgrade&" target="_blank"><i
                                                    class="wi wi-update color-gray"></i> 自动更新</a></li>
                                    <li><a href="./index.php?c=system&a=updatecache&" target="_blank"><i
                                                    class="wi wi-cache color-gray"></i> 更新缓存</a></li>
                                    <li class="divider"></li>
                                    <li><a href="./index.php?c=user&a=logout&"><i class="fa fa-sign-out color-gray"></i>
                                            退出系统</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>


        <div class="main">
            <div class="container">
                <a href="javascript:;" class="js-big-main button-to-big color-gray" title="加宽">宽屏</a>
                <div class="panel panel-content main-panel-content ">
                    <div class="content-head panel-heading main-panel-heading"><span class="font-lg"><i
                                    class="wi wi-setting"></i>用户中心管理</span></div>
                    <div class="panel-body clearfix main-panel-body ">

                        <div class="left-menu">
                            <div class="left-menu-content">

                            </div>
                        </div>

                        <div class="right-content">
                            <!--系统管理首页-->
                            <?= $content ?>
                            <!--end 系统管理首页-->
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            function user_del(url, data, message) {
                var data = decodeURI(data);
                var message = typeof message == 'undefined' ? '' : message;

                layer.confirm(message + '删除须谨慎，确认要删除吗？', function (index) {
                    $.getJSON(url, data, function (data) {
                        layer.msg(data.message, '', function () {
                            if (data.code == 200) {
                                window.location = location.href;
                            }
                        });
                    });
                });
            }

            function show_layer(title, url, w, h) {
                layer_show(title, url, w, h);
            }


            function set_edit(title, url) {
                var index = layer.open({
                    type: 2,
                    title: title,
                    content: url
                });
                layer.full(index);
            }

            <?php if(isset($this->params['route_id'])){ ?>
            $(function () {
                $.get("<?=Url::toRoute('index/main')?>", {id: <?=$this->params['route_id']?> }, function (html) {
                    $('.left-menu-content').html(html);

                });
            });
            <?php }?>


            $(function () {

                $("#ajaxForm").click(function () {
                    var url = $('form').attr('action');
                    var data = $('form').serialize();
                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: 'json',
                        data: data,
                        success: function (data) {
                            layer.msg(data.message, '', function () {
                                if (data.code == 200) {
                                    window.location = window.location.href;
                                }
                            });
                        }
                    })
                });

            });
        </script>

        <?= MainWidget::mainFoot(); ?>

        <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>