<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
//获取菜单列表
//$dataList = $ClassModel->getAllMenu($model->id);
//$typeList =  $model->attributeValues();

?>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <?=$this->context->userRole->name?> <span class="c-gray en">&gt;</span> 修改课件题目 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <?php $form =  ActiveForm::begin(
            ['id' => '',
                'action' => Url::to(['update','id'=>$model->id]),
                'enableAjaxValidation' => true,
                'fieldConfig' => [
                    'template' => "<p>{label}<div class='formControls col-xs-8 col-sm-9'>{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'options'=>['class'=>'row cl'],
                    'labelOptions' => ['class' => 'form-label col-xs-4 col-sm-3'],
                ],
            ])?>
        <?= $form->field($model, 'role_id')->dropDownList($dataList['role_id'],['class'=>'select-box','readonly'=>'true']) ?>
        <?= $form->field($model, 'username')->textInput(['class' => 'input-text', 'placeholder' => '用户名']) ?>
        <?= $form->field($model, 'mobile')->textInput(['class' => 'input-text', 'placeholder' => '手机号码']) ?>
        <?= $form->field($model, 'email')->textInput(['class' => 'input-text', 'placeholder' => '邮箱']) ?>
        <?= $form->field($model, 'password_hash')->passwordInput(['value'=>'','class' => 'input-text', 'placeholder' => '密码']) ?>
        <?= $form->field($model, 'password_reset_token')->passwordInput(['class' => 'input-text', 'placeholder' => '密码']) ?>
        <?= $form->field($model, 'auth_key')->textInput(['class' => 'input-text', 'placeholder' => 'key']) ?>
        <?= $form->field($model, 'login_ip')->textInput(['class' => 'input-text', 'placeholder' => '登录IP']) ?>
        <?= $form->field($model, 'login_time')->textInput(['class' => 'input-text', 'placeholder' => '登录时间']) ?>
        <?= $form->field($model, 'login_num')->textInput(['class' => 'input-text', 'placeholder' => '登录次数']) ?>
        <?= $form->field($model, 'full_name')->textInput(['class' => 'input-text', 'placeholder' => '真实姓名']) ?>
        <?= $form->field($model, 'gender')->radioList(['0'=>'男','1'=>'女'],['class' => 'select-box']) ?>
        <?= $form->field($model, 'status')->radioList(['0'=>'停用','1'=>'正常'],['class' => 'select-box']) ?>
        <div style="display: none;"><?= $form->field($model, 'updated_at')->hiddenInput(['class' => 'input-text', 'value' =>time()])?></div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input id="ajaxForm" class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
        <?php ActiveForm::end();?>
    </article>