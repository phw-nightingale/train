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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

<?php AppAsset::addScript($this,'@web/H-ui.admin/lib/jquery/1.9.1/jquery.min.js',['position' => $this::POS_HEAD]); ?>
<?php AppAsset::addCss($this,'@web/H-ui.admin/static/h-ui.admin/css/page.css'); ?>
<?php AppAsset::addScript($this,'@web/H-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js'); ?>
<?php AppAsset::addScript($this,'@web/H-ui.admin/lib/datatables/1.10.0/jquery.dataTables.min.js'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<!--[if lt IE 9]>
<script type="text/javascript" src="<?= Url::base() ?>/H-ui.admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="<?= Url::base() ?>/H-ui.admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?= Url::base() ?>/H-ui.admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?= Url::base() ?>/H-ui.admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="<?= Url::base() ?>/H-ui.admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="<?= Url::base() ?>/H-ui.admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?= Url::base() ?>/H-ui.admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="<?= Url::base() ?>/H-ui.admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style type="text/css">
	.addbtn{
		background-color:#ccc;
		border:1px solid #ccc;
		cursor:wait;
	}
	.mousewait{
		cursor:wait;
	}
</style>
<body>
<?php $this->beginBody() ?>
<?=$content?>
<?php $this->endBody() ?>
<script type="text/javascript">
/*管理员-添加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-修改*/
function admin_edit(title,url,w,h){
	layer_show(title,url,w,h);
}
/**/
function show_layer(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-设置*/
function set_edit(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*管理员-状态*/
function edit_status(url,data){
		$.getJSON(url, data, function(data){			  
                layer.msg(data.message,'',function () {
                    if (data.code == 200 ){
                        window.location=location.href;
                    }
                });
		});	
}


/*管理员-删除*/
function admin_del(url,data,message){
	var data = decodeURI(data);

	var message = typeof message == 'undefined' ? '' :  message;
	layer.confirm(message + '删除须谨慎，确认要删除吗？',function(index){
		$.getJSON(url, data, function(data){

                layer.msg(data.message,'',function () {
                    if (data.code == 200 ){
                        window.location=location.href;
                    }
                });
		});			
	});
}


/*管理员-批量操作*/
function admin_batch(url,data,message){
	var message = typeof message == 'undefined' ? '' :  message;
	if(!data)var data = $('form').serialize();
				
	layer.confirm(message + '批量操作须谨慎，确认要批量操作吗？',function(index){
		$.getJSON(url, data, function(data){			  
                layer.msg(data.message,'',function () {
                    if (data.code == 200 ){
                        window.location=location.href;
                    }
                });
		});			
	});
}

$(function(){	
	function backSetCss(){
		$("#ajaxForm").attr('disabled',false).addClass('btn-primary').removeClass('addbtn');
		$('body').removeClass('mousewait');
	}
	$("#ajaxForm").click( function () { 
		// console.log($.cookie('linkback'));return ;
			$("#ajaxForm").attr('disabled',true).addClass('addbtn').removeClass('btn-primary');
			$('body').addClass('mousewait');
			var url  = $('form').attr('action');
			var data = $('form').serialize();
			$.ajax({
				url:url,
				type:'post',
				dataType:'json',
				data:data,
				success:function (data) {
					layer.msg(data.message,'',function () {
						if (data.code == 200 ){
							var divlist = parent.document.querySelectorAll(".show_iframe"); //
							if(divlist.length==0) {
								divlist = parent.parent.document.querySelectorAll(".show_iframe"); 
							} 
							var wrapiframe;
						    for(var i =0;i<divlist.length;i++){
						       if(divlist[i].style.display!='none'){ //判断当前iframe
						         wrapiframe = divlist[i].getElementsByTagName('iframe')[0].contentWindow;	
						       }
						    }
							wrapiframe.location.href=$.cookie('linkback');
							var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
							parent.layer.close(index);
						}else if(data.code == 400) {
							backSetCss();
						}
					});
				},
				error:function(){
					backSetCss();
				}
			})		
		});	
		
});

/*保存当前页面链接到cookie*/
function saveCookies(){
	var divlist = parent.document.querySelectorAll(".show_iframe");
    for(var i =0;i<divlist.length;i++){
       if(divlist[i].style.display!='none'){
         var link = divlist[i].getElementsByTagName('iframe')[0].contentWindow.location.href;
         $.cookie('linkback',link,{path:'/'})
       }
   }
}
var ali = $("a[title='修改']");
for(var a=0;a<ali.length;a++) {
	ali[a].onclick=function(){
		saveCookies();
	}
}
$('.l').find('.btn-primary').click(function(){
	saveCookies();
});
</script>
</body>
</html>

<?php $this->endPage() ?>