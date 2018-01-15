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

<link href="<?= Url::base() ?>/H-ui.admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="<?= Url::base() ?>/H-ui.admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="<?= Url::base() ?>/H-ui.admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?= Url::base() ?>/H-ui.admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />

<?php AppAsset::addScript($this,'@web/H-ui.admin/lib/jquery/1.9.1/jquery.min.js',['position' => $this::POS_HEAD]); ?>
</head>

<body>
<?php $this->beginBody() ?>
<?=$content?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>