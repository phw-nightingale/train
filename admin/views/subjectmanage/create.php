<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;

//获取菜单列表

// echo "<pre>";
// print_r($typeList['types']);die;
$typeList = $model->attributeValues();
?>



<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <?=$this->context->userRole->name?> <span class="c-gray en">&gt;</span> 添加题目 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
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
		

          
                    
					<?= $form->field($model, 'school_id')
                        ->textInput(['class' => 'input-text', 'placeholder' => '学校ID']) ?>
                    <?= $form->field($model, 'uid')
                        ->textInput(['class' => 'input-text', 'placeholder' => '创建人']) ?>
                    <?= $form->field($model, 'grade_id')
                        ->textInput(['class' => 'input-text', 'placeholder' => '年级ID']) ?>
                    <?= $form->field($model, 'title')
                        ->textInput(['class' => 'input-text', 'placeholder' => '标题']) ?>
                    <?= $form->field($model, 'content')
                        ->textInput(['class' => 'input-text', 'placeholder' => '内容与答案[JSON数据]']) ?>
                     <?= $form->field($model, 'file_url')
                        ->textInput(['class' => 'input-text', 'placeholder' => '文件地址']) ?>
                     <?= $form->field($model, 'type_id')
                        ->textInput(['class' => 'input-text', 'placeholder' => '学科']) ?>

                     <?= $form->field($model, 'types')
                        ->dropDownList($typeList['types'], ['class' => 'input-text', 'placeholder' => '路由列表', 'readonly' => 'true'])?>

                     <?= $form->field($model, 'is_auto')
                        ->textInput(['class' => 'input-text', 'placeholder' => '自动批量']) ?>

                        <div style="display: none;"><?= $form->field($model, 'create_date')->hiddenInput(['class' => 'input-text', 'value' =>time()])?></div>

                         <!-- 点击选中 -->
                        <div class="row cl">
                            <label class="col-sm-3 control-label no-padding-right"
                                   for="form-field-1">是否公开:</label>
                        <label class="col-md-offset-1  col-sm-3 taglabel">
                            <input checked type="checkbox"
                             class="ace ace-switch ace-switch-7 " onclick="this.nextSibling.value=(this.nextSibling
                             .value==1?0:1)" ><input type="hidden" id='temp' name="ExaSubject[is_open]" value="1">
                            <span class="lbl"></span>
                        </label>
                            <span class="lbl"></span>
                        </label>
                        </div>

                       <div class="row cl">
                            <label class="col-sm-3 control-label no-padding-right"
                                   for="form-field-1">状态:</label>
                        <label class="col-md-offset-1  col-sm-3 taglabel">
                            <input checked type="checkbox"
                             class="ace ace-switch ace-switch-7 " onclick="this.nextSibling.value=(this.nextSibling
                             .value==1?0:1)" ><input type="hidden" id='temp' name="ExaSubject[status]" value="1">
                            <span class="lbl"></span>
                        </label>
                            <span class="lbl"></span>
                        </label>
                        </div>

                       


                        <div class="row cl">
                            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                                <input id="ajaxForm" class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                            </div>
                        </div>
                            <?php ActiveForm::end();?>
</article>


