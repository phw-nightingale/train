<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>


<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <?=$this->context->userRole->name?> <span class="c-gray en">&gt;</span> 学员考试 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<div class="text-l"><?=$searchViews;?></div>
	<div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onClick="admin_del('<?=Url::to('delete')?>',$('form').serialize())" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="javascript:;" onClick="admin_add('添加学员考试','<?=  Url::toRoute('/'.Yii::$app->controller->id.'/create')?>','800')"><i class="Hui-iconfont">&#xe600;</i> 添加学员考试</a> </span> <span class="r">共有数据：<strong><?=$pages->totalCount?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-hover table-bg">
   		<form>
		<thead>
			<tr>
				<th scope="col" colspan="20">学员考试</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
                <th><?= $ClassModel->getAttributeLabel('exa_id') ?></th>
                <th><?= $ClassModel->getAttributeLabel('uid') ?></th>
                <th><?= $ClassModel->getAttributeLabel('content') ?></th>
                <th><?= $ClassModel->getAttributeLabel('score') ?></th>
                <th><?= $ClassModel->getAttributeLabel('right_num') ?></th>
                <th><?= $ClassModel->getAttributeLabel('error_num') ?></th>
                <th><?= $ClassModel->getAttributeLabel('open_date') ?></th>
                <th><?= $ClassModel->getAttributeLabel('end_date') ?></th>
                <th><?= $ClassModel->getAttributeLabel('audit_date') ?></th>
                <th><?= $ClassModel->getAttributeLabel('create_date') ?></th>
                <th><?= $ClassModel->getAttributeLabel('status') ?></th>
               
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
        <?php foreach($model as $k=>$v){?>
			<tr class="text-c">
			
				<?php
                    echo '<td><input type="checkbox" value="'.$v->id.'" name="cbox[]"></td>';
                    echo '<td>' . $v->exa_id . '</td>';
                    echo '<td>' . $v->uid . '</td>';
                    echo '<td>' . $v->content . '</td>';
                    echo '<td>' . $v->score . '</td>';
                    echo '<td>' . $v->right_num . '</td>';
                    echo '<td>' . $v->error_num . '</td>';
                    echo '<td>' . date('Y-m-d H:m',$v->open_date ). '</td>';
                    echo '<td>' . date('Y-m-d H:m',$v->open_date ). '</td>';
                    echo '<td>' . $v->audit_date . '</td>';
                    echo '<td>' . date('Y-m-d H:i:s',$v->create_date) . '</td>';
                     echo '<td>' . $v->enumeration('status',$v->status) . '</td>';
                    echo ' <td>';
                    echo ' <a title="修改" href="' . Url::to(['update', 'id' => $v->id]) . '"  style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>';
                    echo '<a title="删除" href="javascript:;" onClick="admin_del(\'' . Url::toRoute('delete') . '\',\'cbox[]='. $v->id .'\')"  style="text-decoration:none" class="ml-5"><i class="Hui-iconfont">&#xe6e2;</i></a>';

                
                    echo ' </td>';
                    echo ' </tr>';
                ?>
                
			</tr>
            <?php }?>
		</tbody>
	</form>
	</table>
                     <div class="sabrosus">
                                   <p>
                                    <?php 
									echo LinkPager::widget([
                                        'pagination' => $pages,
                                    ]); ?>
                                   </p>
                   </div>
    
    
</div>

