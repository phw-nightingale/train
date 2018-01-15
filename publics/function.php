<?php

function Mobile($config,$tlpMobile='Mobile'){
		$Mobile = new \common\utils\browser\Mobile;
		if($Mobile->isMobile()){//手机登录切换视图
			$config = yii\helpers\ArrayHelper::merge($config,['viewPath' => '@app/views'.$tlpMobile]);
		}
		return $config;
}
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    exit();
}
?>