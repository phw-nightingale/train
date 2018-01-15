<?php
use yii\helpers\Url;
?>
<div class="panel panel-menu">
        <div class="panel-heading">
        <span class="no-collapse"><?=$title?><i class="wi wi-appsetting pull-right setting"></i></span>
        </div>
        <ul class="list-group">
        <?php foreach($main as $key=>$row){?>
                <li class="list-group-item ">
                <a href="<?=Url::toRoute($row['route'])?>" class="text-over" ><i class="wi wi-wxapp-apply"></i><?=$row['title']?></a>
                </li>
       <?php }?>
                
        </ul>
</div>