<?php
use yii\helpers\Url;
foreach($userMain as $key=>$list){
	
?>
<li  <?=@$list['active']?>><a href="javascript:void();" onclick="main_left(<?=$list['id']?>);" ><?=$list['title']?></a></li>
<?php }?>
<script type="text/javascript">

	function main_left(id){
			$.get("<?=Url::toRoute('index/main')?>", { id: id }, function(html){
				$('.left-menu-content').html(html);
			});
	}

</script>

