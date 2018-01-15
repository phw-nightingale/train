<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
//获取菜单列表

?>



<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <?=$this->context->userRole->name?> <span class="c-gray en">&gt;</span> 修改路由权限 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
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
		

									<?= $form->field($model, 'uid')
										->textInput(['class' => 'input-text', 'placeholder' => '创建用户'])?>
									<?= $form->field($model, 'title')
										->textInput(['class' => 'input-text', 'placeholder' => '直播标题'])?>
									<?= $form->field($model, 'teacher_uid')
										->textInput(['class' => 'input-text', 'placeholder' => '直播人ID'])?>
									<?= $form->field($model, 'description')
										->textInput(['class' => 'input-text', 'placeholder' => '描述'])?>
									<?= $form->field($model, 'content')
										->textInput(['class' => 'input-text', 'placeholder' => '内容'])?>
									<?= $form->field($model, 'people_num')
										->textInput(['class' => 'input-text','placeholder' => '可进人数'])?>
                                    <?= $form->field($model, 'integration_type_id')
                                        ->textInput(['class' => 'input-text','placeholder' => '积分类型'])?>
                                     <?= $form->field($model, 'integration')
                                        ->textInput(['class' => 'input-text','placeholder' => '所需积分'])?>
                                    <?= $form->field($model, 'live_url')
                                        ->textInput(['class' => 'input-text','placeholder' => '直播地址链接'])?>
                                    <?= $form->field($model, 'group_str')
                                        ->textInput(['class' => 'input-text','placeholder' => '可进角色权限'])?>
                                     <?= $form->field($model, 'open_date')
                                        ->textInput(['class' => 'input-text', 'placeholder' => '直播开始时间'])?>
                                    <?= $form->field($model, 'end_date')
                                        ->textInput(['class' => 'input-text', 'placeholder' => '直播结束时间'])?>
                                    <?= $form->field($model, 'create_date')
                                        ->textInput(['class' => 'input-text','placeholder' => '创建时间'])?>
                                         
                                     <?= $form->field($model, 'is_audit')
                                        ->textInput(['class' => 'input-text','placeholder' => '审核'])?>
                                    <?= $form->field($model, 'audit_date')
                                        ->textInput(['class' => 'input-text','placeholder' => '审核时间'])?>
                                    <?= $form->field($model, 'audit_school_id')
                                        ->textInput(['class' => 'input-text','placeholder' => '审核管理员ID'])?>
                                   


                        <div class="row cl">
                                                <label class="col-sm-3 control-label no-padding-right"
                                                       for="form-field-1">状态:</label>
                                                <label class="input-text">
                                                    <input name="SchoolRule[status]"  <?php if ($model->status) echo  'checked';?> value="1"
                                                           class="ace ace-switch ace-switch-7 " type="checkbox">
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

