<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;

//获取菜单列表
// $dataList = $ClassModel->getAllMenu();
// $typeList = $model->attributeValues();

// echo Url::toRoute('grade/create');die;

?>



<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <?=$this->context->userRole->name?> <span class="c-gray en">&gt;</span> 添加课程 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<article class="page-container">
                <?php $form =  ActiveForm::begin(
                		['id' => '',
                    	'action' => Url::toRoute('create'),
                        'enableAjaxValidation' => true,
						'fieldConfig' => [
						'template' => "<p>{label}<div class='formControls col-xs-5 col-sm-6'>{input}</div>\n<p  class=\"col-lg-8\">{error}</p>",
						'options'=>['class'=>'row cl'],
						'labelOptions' => ['class' => 'form-label col-xs-4 col-sm-3'],
						],
                    ])?>
		
                    <?= $form->field($model, 'school_id')
                        ->textInput(['class' => 'input-text', 'placeholder' => '']) ?>
                    <?= $form->field($model, 'uid')
                        ->textInput(['class' => 'input-text', 'placeholder' => '']) ?>
                    <?= $form->field($model, 'name')
                        ->textInput(['class' => 'input-text', 'placeholder' => ''])?> 
                    <?= $form->field($model, 'description')
                        ->textInput(['class' => 'input-text',  'placeholder' => ''])?>
                    <?= $form->field($model, 'class_id')
                        ->textInput(['class' => 'input-text',  'placeholder' => '']) ?>
                    <?= $form->field($model, 'teacher_str')
                        ->textInput(['class' => 'input-text',  'placeholder' => '']) ?>
                    <?= $form->field($model, 'grade_com_str')
                        ->textInput(['class' => 'input-text',  'placeholder' => '']) ?>
                    <?= $form->field($model, 'create_date')->textInput()
                        ->hiddenInput(['class' => 'input-text','visibility'=>'hidden','value'=>time(),'placeholder' => '']) 
                        ->label(false)
                        ?>
                    <?= $form->field($model, 'update_date')->textInput()
                        ->hiddenInput(['class' => 'input-text','visibility'=>'hidden','value'=>time(),'placeholder' => '']) 
                        ->label(false)
                        ?>
                    <?= $form->field($model, 'open_date')
                        ->textInput(['class' => 'input-text Wdate','onfocus'=> "WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{\'%y-%M-%d\'}' })", 'placeholder' => $model->getAttributeLabel('open_date')]) ?>
                    <?= $form->field($model, 'end_date')
                        ->textInput(['class' => 'input-text Wdate','onfocus'=> "WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{\'%y-%M-%d\'}' })", 'placeholder' => $model->getAttributeLabel('end_date')]) ?>
                   <div class="row cl">
                        <label class="col-sm-3 control-label no-padding-right"
                               for="form-field-1">状态:</label>
                        <label class="col-md-offset-1  col-sm-3 taglabel">
                            <input name="GradeClassCourse[status]" checked value="1"
                             class="ace ace-switch ace-switch-7 " onclick="" type="checkbox">
                            <span class="lbl"></span>
                        </label>
                   </div>
                        <div class="row cl">
                            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3" style="margin-top: 5px">
                                <input id="ajaxForm" class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                            </div>
                        </div>
                <?php ActiveForm::end();?>

</article>


