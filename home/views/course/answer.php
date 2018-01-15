
<style>
    .title{
        background: #00AA88;
        width:30px;
        height: 10px;
        display: inline;
        font-size:11px;
        padding:0px 3px 1px 3px;
        color: #fff;
        border-radius: 3px;
    }
    .size-S{
        padding-top: 3px;
        padding-bottom:1px;
        padding-left:1px;
        padding-right: 4px;
    }
    .size-M{
        padding-top: 6px;
        padding-bottom:2px;
        padding-left:2px;
        padding-right: 8px;
    }

    .data{
        height:79px;
    }
</style>
<div style="height: 685px;">
<?php  foreach ($models as $model){ ?>
    <div class= "panel panel-default">
        <div class="panel-heading" style="padding-right:3px;">
            <h3 class="panel-title">
                <div style=" " class="glyphicon glyphicon-tasks"></div>
                <?php echo $model["title"];?>
                <div class="title">课件</div>
                <div style="width:20px; height: 20px; float: right; font-size: 18px;position: relative;top: -1px;" class="glyphicon glyphicon-remove-circle" title="删除"></div>
            </h3>


        </div>
        <div class="panel-body data">
            Panel content
            <button type="button" class="btn btn-info size-S"><div style="width:20px; height: 20px;" class="glyphicon glyphicon-search"></div>查看</button>
        </div>

    </div>
<?php }?>
</div>







<div style="width: 100%; text-align: center;">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
