<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
//获取菜单列表

?>



<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <?=$this->context->userRole->name?> <span class="c-gray en">&gt;</span> 添加课件题目 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <?php $form =  ActiveForm::begin(
            ['id' => '',
                'action' => Url::toRoute('create'),
                'enableAjaxValidation' => true,
                'fieldConfig' => [
                    'template' => "<p>{label}<div class='formControls col-xs-8 col-sm-9'>{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'options'=>['class'=>'row cl'],
                    'labelOptions' => ['class' => 'form-label col-xs-4 col-sm-3'],
                ],
            ])?>
        <?= $form->field($model, 'school_id')->dropDownList($dataList['name'],['class'=>'select-box','readonly'=>'true']) ?>
        <?= $form->field($model, 'uid')->dropDownList($username['username'],['class'=>'select-box','readonly'=>'true'])?>
        <?= $form->field($model, 'type_id')->dropDownList($course['name'],['class'=>'select-box','readonly'=>'true']) ?>
        <?= $form->field($model, 'title')->textInput(['class' => 'input-text', 'placeholder' => '标题']) ?>
        <?= $form->field($model, 'description')->textInput(['class' => 'input-text', 'placeholder' => '描述']) ?>
        <?= $form->field($model, 'content')->textInput(['class' => 'input-text', 'placeholder' => '内容']) ?>
        <?= $form->field($model, 'cover')->textInput(['class' => 'input-text', 'placeholder' => '封面图片']) ?>
        <?= $form->field($model, 'people_num')->textInput(['class' => 'input-text','placeholder' => '难看人数']) ?>
        <?= $form->field($model, 'time_long')->textInput(['class' => 'input-text', 'placeholder' => '时长']) ?>
        <?= $form->field($model, 'integral')->textInput(['class' => 'input-text', 'placeholder' => '所需积分']) ?>
        <?= $form->field($model, 'integral_type')->textInput(['class' => 'input-text', 'placeholder' => '积分类型']) ?>
        <?= $form->field($model, 'score')->textInput(['class' => 'input-text', 'placeholder' => '总评分']) ?>
        <?= $form->field($model, 'ave_score')->textInput(['class' => 'input-text', 'placeholder' => '平均评分最大10']) ?>
        <?= $form->field($model, 'is_upload')->textInput(['class' => 'input-text', 'placeholder' => '是否上传文件']) ?>
        <?= $form->field($model, 'is_ask_too')->textInput(['class' => 'input-text', 'placeholder' => '回答错误是否可过']) ?>
        <?= $form->field($model, 'label_str')->textInput(['class' => 'input-text', 'placeholder' => '标签ID以”,”拆分']) ?>
        <?= $form->field($model, 'power_str')->textInput(['class' => 'input-text', 'placeholder' => '权限ID以”,”拆分']) ?>
        <?= $form->field($model, 'day')->textInput(['class' => 'input-text', 'placeholder' => '放置天数']) ?>
        <div style="display: none;"><?= $form->field($model, 'create_date')->hiddenInput(['class' => 'input-text', 'value' =>time()])?></div>
        <div class="row cl">
            <label class="col-sm-3 control-label no-padding-right"
                   for="form-field-1">是否公开:</label>
            <label class="col-md-offset-1  col-sm-3">
                <input name="is_open" onclick="if($(this).is(':checked')){
                                    $(this).val(1);
                                }else {
                                    $(this).val(0);
                                }"
                       class="ace ace-switch ace-switch-7 " type="checkbox">
                <span class="lbl"></span>
            </label>
        </div>
        <div class="row cl">
            <label class="col-sm-3 control-label no-padding-right"
                   for="form-field-1">状态:</label>
            <label class="col-md-offset-1  col-sm-3">
                <input name="status" onclick="if($(this).is(':checked')){
                                    $(this).val(1);
                                }else {
                                    $(this).val(0);
                                }"
                       class="ace ace-switch ace-switch-7 " type="checkbox">
                <span class="lbl"></span>
            </label>
        </div>
        <div class="row cl" style="margin-top: 2em;">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input id="ajaxForm" class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
        <?php ActiveForm::end();?>
    </article>
