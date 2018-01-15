<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
	<?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->params['title']) ?></title>
    <?php $this->head() ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
<?php $this->beginBody() ?>

<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> 
			<span class="logo navbar-slogan f-l mr-10 hidden-xs"><?= Html::encode($this->params['title']) ?></span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
			  <ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onClick="show_create('添加角色','<?=Url::toRoute('role/create')?>')"><i class="Hui-iconfont">&#xe616;</i> 角色</a></li>
							<li><a href="javascript:;" onClick="show_create('创建用户','<?=Url::toRoute('user/create')?>')"><i class="Hui-iconfont">&#xe613;</i> 用户</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li><?=@$this->params['roleOne']->name?> </li>
				<li class="dropDown dropDown_hover">
					<a href="#" class="dropDown_A"><?= Yii::$app->user->identity->username?> <i class="Hui-iconfont">&#xe6d5;</i></a>
				  <ul class="dropDown-menu menu radius box-shadow">
						<li><a onClick="show_layer('系统日志','<?=Url::toRoute('default/log')?>')"  href="javascript:;">系统日志</a></li>
						<li><a href="<?=Url::toRoute('index/login')?>">退出</a></li>
				</ul>
			</li>
			  <li id="Hui-msg"> <a onClick="show_layer('站内邮件','<?=Url::toRoute('default/mail')?>')"  href="javascript:;" title="站内邮件"><span class="badge badge-danger"></span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
				  <ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
						<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
						<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
						<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
    	<?=$this->params['layoutMenuData']?> 
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
  <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="welcome.html">我的桌面</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?=Url::toRoute('default/welcome') ?>"></iframe>
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
  <ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>
<!--_footer 作为公共模版分离出去-->
<?php AppAsset::addScript($this,'@web/H-ui.admin/lib/jquery/1.9.1/jquery.min.js'); ?>
<?php AppAsset::addScript($this,'@web/H-ui.admin/lib/layer/2.4/layer.js'); ?>
<?php AppAsset::addScript($this,'@web/H-ui.admin/static/h-ui/js/H-ui.min.js'); ?>
<?php AppAsset::addScript($this,'@web/H-ui.admin/static/h-ui.admin/js/H-ui.admin.js'); ?>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<?php AppAsset::addScript($this,'@web/H-ui.admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js'); ?>
<script type="text/javascript">

function show_layer(title,url,w,h){
	layer_show(title,url,w,h);
}

function show_create(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
</script> 

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>