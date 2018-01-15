<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;

//获取菜单列表
// $dataList = $ClassModel->getAllMenu();
// $typeList = $model->attributeValues();

// echo Url::toRoute('grade/create');die;

?>



<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <?=$this->context->userRole->name?> <span class="c-gray en">&gt;</span> 添加课件评分 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
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
        
                    <?= $form->field($model, 'uid')
                        ->textInput(['class' => 'input-text', 'placeholder' => '']) ?>
                    <?= $form->field($model, 'course_id')
                        ->textInput(['class' => 'input-text', 'placeholder' => '']) ?>
                    <?= $form->field($model, 'score')
                        ->textInput(['class' => 'input-text', 'placeholder' => ''])?> 
                    <?= $form->field($model, 'create_date')
                        ->textInput(['class' => 'input-text',  'placeholder' => ''])?>
                   
                        <div class="row cl">
                            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3" style="margin-top: 5px">
                                <input id="ajaxForm" class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                            </div>
                        </div>
                <?php ActiveForm::end();?>
</article>
