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
		

									<?= $form->field($model, 'school_id')
										->textInput(['class' => 'input-text', 'placeholder' => '学校ID'])?>
									<?= $form->field($model, 'uid')
										->textInput(['class' => 'input-text', 'placeholder' => '创建人'])?>
									<?= $form->field($model, 'title')
										->textInput(['class' => 'input-text', 'placeholder' => '试卷标题'])?>
									<?= $form->field($model, 'description')
										->textInput(['class' => 'input-text', 'placeholder' => '描述'])?>
									<?= $form->field($model, 'sub_str')
										->textInput(['class' => 'input-text', 'placeholder' => '题目组'])?>
									<?= $form->field($model, 'grade_id')
										->textInput(['class' => 'input-text','placeholder' => '年级ID'])?>
                                    <?= $form->field($model, 'class_str')
                                        ->textInput(['class' => 'input-text','placeholder' => '班级ID'])?>
                                     <?= $form->field($model, 'subject_num')
                                        ->textInput(['class' => 'input-text','placeholder' => '题目数量'])?>
                                    <?= $form->field($model, 'all_score')
                                        ->textInput(['class' => 'input-text','placeholder' => '总分数'])?>
                                    <?= $form->field($model, 'score_json')
                                        ->textInput(['class' => 'input-text','placeholder' => '分数'])?>
                                     <?= $form->field($model, 'status')
                                        ->dropDownList($model->attributeValues()['status'], ['class' => 'select-box']) ?>
                                        <!-- 日期表 -->
                                    <?= $form->field($model, 'open_date')
                                        ->textInput(['class' => 'input-text Wdate','onfocus'=> "WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{\'%y-%M-%d\'}' })", 'placeholder' => $model->getAttributeLabel('open_date')]) ?>
                                    <?= $form->field($model, 'end_date')
                                        ->textInput(['class' => 'input-text Wdate','onfocus'=> "WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{\'%y-%M-%d\'}' })", 'placeholder' => $model->getAttributeLabel('end_date')]) ?>
                                        

                        <div class="row cl">
                            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                                <input id="ajaxForm" class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                            </div>
                        </div>
                            <?php ActiveForm::end();?>
</article>

