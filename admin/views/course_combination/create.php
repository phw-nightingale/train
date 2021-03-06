<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
//获取菜单列表

?>



<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <?=$this->context->userRole->name?> <span class="c-gray en">&gt;</span> 添加课件分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <?php $form =  ActiveForm::begin(
            ['id' => '',
                'action' => Url::toRoute('create'),
                'enableAjaxValidation' => true,
                'options' => ['enctype' => 'multipart/form-data'],
                'fieldConfig' => [
                    'template' => "<p>{label}<div class='formControls col-xs-8 col-sm-9'>{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'options'=>['class'=>'row cl'],
                    'labelOptions' => ['class' => 'form-label col-xs-4 col-sm-3'],
                ],
            ])?>
        <?= $form->field($model, 'school_id')->textInput(['class' => 'input-text','placeholder' => '学校id']) ?>
        <?= $form->field($model, 'uid')->textInput(['class' => 'input-text', 'placeholder' => '用户id']) ?>
        <?= $form->field($model, 'title')->textInput(['class' => 'input-text', 'placeholder' => '标题']) ?>
        <?= $form->field($model, 'description')->textInput(['class' => 'input-text', 'placeholder' => '描述']) ?>
        <?= $form->field($model, 'content')->textInput(['class' => 'input-text', 'placeholder' => '内荣']) ?>
        <?= $form->field($model, 'course_str')->textInput(['class' => 'input-text', 'placeholder' => '课件ID以”,”拆分'])?>
        <?= $form->field($model, 'cover')->textInput(['class' => 'input-text', 'placeholder' => '图片上传']) ?>
        <?= $form->field($model, 'course_num')->textInput(['class' => 'input-text', 'placeholder' => '课件数量']) ?>
        <?= $form->field($model, 'score')->textInput(['class' => 'input-text', 'placeholder' => '课件总评分']) ?>
        <?= $form->field($model, 'ave_score')->textInput(['class' => 'input-text', 'placeholder' => '平均评分最大10']) ?>
        <div style="display: none;"><?= $form->field($model, 'create_date')->hiddenInput(['class' => 'input-text', 'value' =>time()])?></div>
        <div class="row cl" style="margin-top: 2em;">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input id="ajaxForm" class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
        <?php ActiveForm::end();?>
    </article>
