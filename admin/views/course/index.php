<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>


<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <?=$this->context->userRole->name?> <span class="c-gray en">&gt;</span> 课件题目 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="text-l" style="margin-left: 0.5em;margin-top: 2em;"><?=$searchViews;?></div>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l">
            <a href="javascript:;" onClick="admin_del('<?=Url::to('delete')?>',$('form').serialize())" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
            <a class="btn btn-primary radius" href="javascript:;" onClick="admin_add('添加课件组','<?=  Url::toRoute('/'.Yii::$app->controller->id.'/create')?>','800')"><i class="Hui-iconfont">&#xe600;</i> 添加课件题目</a>
        </span> <span class="r">共有数据：<strong><?=$pages->totalCount?></strong> 条</span>
    </div>
    <table class="table table-border table-bordered table-hover table-bg">
        <form>
            <thead>
            <tr>
                <th scope="col" colspan="25">课件组</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" value="" name=""></th>
                <th><?= $ClassModel->getAttributeLabel('uid') ?></th>
                <th><?= $ClassModel->getAttributeLabel('school_id') ?></th>
                <th><?= $ClassModel->getAttributeLabel('type_id') ?></th>
                <th><?= $ClassModel->getAttributeLabel('title') ?></th>
                <th><?= $ClassModel->getAttributeLabel('description') ?></th>
                <th><?= $ClassModel->getAttributeLabel('content') ?></th>
                <th><?= $ClassModel->getAttributeLabel('cover') ?></th>
                <th><?= $ClassModel->getAttributeLabel('people_num') ?></th>
                <th><?= $ClassModel->getAttributeLabel('time_long') ?></th>
                <th><?= $ClassModel->getAttributeLabel('integral') ?></th>
                <th><?= $ClassModel->getAttributeLabel('integral_type') ?></th>
                <th><?= $ClassModel->getAttributeLabel('score') ?></th>
                <th><?= $ClassModel->getAttributeLabel('ave_score') ?></th>
                <th><?= $ClassModel->getAttributeLabel('is_upload') ?></th>
                <th><?= $ClassModel->getAttributeLabel('is_open') ?></th>
                <th><?= $ClassModel->getAttributeLabel('is_ask_too') ?></th>
                <th><?= $ClassModel->getAttributeLabel('status') ?></th>
                <th><?= $ClassModel->getAttributeLabel('label_str') ?></th>
                <th><?= $ClassModel->getAttributeLabel('power_str') ?></th>
                <th><?= $ClassModel->getAttributeLabel('day') ?></th>
                <th><?= $ClassModel->getAttributeLabel('create_date') ?></th>
                <th><?= $ClassModel->getAttributeLabel('update_date') ?></th>
                <th width="70">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($model as $k=>$v){?>
                <tr class="text-c">
                    <?php
                    echo '<td><input type="checkbox" value="'.$v->id.'" name="cbox[]"></td>';
                    echo '<td>' . $v->uid . '</td>';
                    echo '<td>' . $v->school_id . '</td>';
                    echo '<td>' . $v->type_id . '</td>';
                    echo '<td>' . $v->title . '</td>';
                    echo '<td>' . $v->description . '</td>';
                    echo '<td>' . $v->content . '</td>';
                    echo '<td>' . $v->cover . '</td>';
                    echo '<td>' . $v->people_num . '</td>';
                    echo '<td>' . $v->time_long . '</td>';
                    echo '<td>' . $v->integral . '</td>';
                    echo '<td>' . $v->integral_type . '</td>';
                    echo '<td>' . $v->score . '</td>';
                    echo '<td>' . $v->ave_score . '</td>';
                    echo '<td>' . $v->is_upload . '</td>';
                    echo '<td>' . $v->is_open . '</td>';
                    echo '<td>' . $v->is_ask_too . '</td>';
                    echo '<td>' . $v->status . '</td>';
                    echo '<td>' . $v->label_str . '</td>';
                    echo '<td>' . $v->power_str . '</td>';
                    echo '<td>' . $v->day . '</td>';
                    echo '<td>' . date('Y-m-d H:i:s',$v->create_date) . '</td>';
                    echo '<td>' . date('Y-m-d H:i:s',$v->update_date) . '</td>';
                    echo ' <td>';
                    echo ' <a title="修改" href="' . Url::to(['update', 'id' => $v->id]) . '"  style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>';

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