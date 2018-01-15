<?php
use yii\helpers\Url;
use common\models\SchoolRole;
$SchoolRole  = new \common\models\SchoolRole;
?>


<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <?=@$this->context->userRole->name?> <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

<div class="text-l"><?=$searchViews;?></div>

	<div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onClick="admin_del('<?=Url::to('/role/delete')?>',$('form').serialize())" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量关闭</a> <a class="btn btn-primary radius" href="javascript:;" onClick="admin_add('添加角色','<?=  Url::toRoute('/role/create')?>','800')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong><?=count($model)?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-hover table-bg">
   		<form>
		<thead>
			<tr>
				<th scope="col" colspan="7">角色管理</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
				<th><?=$SchoolRole->getAttributeLabel('id')?></th>
				<th><?=$SchoolRole->getAttributeLabel('name')?></th>
				<th><?=$SchoolRole->getAttributeLabel('code')?></th>
				<th><?=$SchoolRole->getAttributeLabel('des')?></th>
				<th><?=$SchoolRole->getAttributeLabel('status')?></th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
        <?php foreach($model as $k=>$v){?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?=$v->id?>" name="cbox[]"></td>
				<td><?=$v->id?></td>
				<td><?=$v->name?></td>
				<td><?=$v->code?></td>
				<td><?=$v->des?></td>
				<td><?=$SchoolRole->enumeration('status',$v->status)?></td>
				<td class="f-14">
                <?php if($v->id != 1 ){?>
                <a title="角色编辑" href="javascript:;" onClick="admin_edit('角色编辑','<?=Url::to(['/role/update','id'=>$v->id])?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe665;</i></a> 
                <a title="设置权限" href="javascript:;" onClick="set_edit('设置权限','<?=Url::to(['set-rule','id'=>$v->id])?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                <a title="关闭角色" href="javascript:;" onClick="admin_del('<?=Url::to('/role/delete')?>','cbox[]=<?=$v->id?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                <?php }?>
                
                </td>
			</tr>
            <?php }?>
		</tbody>
		</form>
	</table>
    
</div>



