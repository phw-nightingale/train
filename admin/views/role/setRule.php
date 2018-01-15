<?php
// +----------------------------------------------------------------------
// | TITLE: 设置权限
// +----------------------------------------------------------------------
use yii\helpers\Url;


$SchoolRole = new \common\models\SchoolRole;
use yii\bootstrap\ActiveForm;
?>
    <link rel="stylesheet" href="<?= Url::base() ?>/H-ui.admin/static/h-ui.admin/publics/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= Url::base() ?>/H-ui.admin/static/h-ui.admin/publics/css/font-awesome.css" />
	<link rel="stylesheet" href="<?= Url::base() ?>/H-ui.admin/static/h-ui.admin/publics/css/ace-fonts.css" />



     <div id="treeview-checkable" class=""></div>
                <div class="row">
                    <div class="clearfix ">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info ajaxForm" type="button">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                确定
                            </button>&nbsp;
                        </div>
                    </div>
                </div>
                <?php $form =  ActiveForm::begin(
                    ['id' => 'setRule',
                        'action'=>Url::to(['set-rule','id'=>$model->id]),
                        'enableAjaxValidation' => TRUE,
                    ])?>
                <?php ActiveForm::end();?>
</div>

<!--请在下方写此页面业务相关的脚本-->
<!-- 增加的js -->
<script src="<?= Url::base() ?>/H-ui.admin/static/h-ui.admin/publics/tree/src/js/bootstrap-treeview.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">

    $(function() {
        var defaultData = <?php echo json_encode($ruleAll)?>;
        //权限
        var rule = <?php echo json_encode($model->rule);?>;

        var $checkableTree = $('#treeview-checkable').treeview({
            data: defaultData,
            showIcon: false,
            showCheckbox: true,
            onNodeChecked: function(event, node) {
                rule.push( node.id)
            },
            onNodeUnchecked: function (event, node) {
                delete  rule[ $.inArray(node.id, rule)]
            }
        });


        /**
         *改变路由
         */
        function changeRule() {
            var data = Object();
            data._csrf=$('input[name=_csrf]').val();
            data.rule= rule;
            $.ajax({
                url:$('#setRule').attr('action'),
                type:'post',
                dataType:'json',
                data:data,
                success:function (data) {
                    layer.msg(data.message);
                }
            })
        }
        $('.ajaxForm').bind('click',function () {
            changeRule();
        })

    });
</script>









