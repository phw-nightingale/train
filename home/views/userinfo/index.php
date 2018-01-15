<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;

use app\assets\AppAssetUpFile;
AppAssetUpFile::register($this);
?>


<div class="page-container">
<article class="page-container">
                            <?php $form =  ActiveForm::begin(
                            		['id' => '',
                                    'action'=>Url::to(['userinfo/index','id'=>$modelUser->id ]),
                                    'enableAjaxValidation' => true,
									'fieldConfig' => [
									'template' => "<p>{label}<div class='formControls col-xs-8 col-sm-9'>{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
									'options'=>['class'=>'row cl'],
									'labelOptions' => ['class' => 'form-label col-xs-4 col-sm-3'],
									],
                                ])?>
		

                            <?= $form->field($modelUser, 'username')
                                ->textInput([ 'disabled'=>true,'class'=>'input-text','placeholder'=>$modelUser->getAttributeLabel('modelname')])?>
                            <?= $form->field($modelUser, 'mobile')
                                ->textInput(['class'=>'input-text','placeholder'=>$modelUser->getAttributeLabel('mobile')])?>

                            <?= $form->field($modelUser, 'email')
                                ->textInput(['class'=>'input-text','placeholder'=>$modelUser->getAttributeLabel('email')]) ?>
                            <?= $form->field($modelUser, 'loa_password')
                                ->passwordInput(['value'=>'','class'=>'input-text','placeholder'=>$modelUser->getAttributeLabel('loa_password')]) ?>
                            <?= $form->field($modelUser, 'password')
                                ->passwordInput(['value'=>'','class'=>'input-text','placeholder'=>$modelUser->getAttributeLabel('password_hash')]) ?>
                            <?= $form->field($modelUser, 'again_password')
                                ->passwordInput(['value'=>'','class'=>'input-text','placeholder'=>$modelUser->getAttributeLabel('again_password')]) ?>
                                
                            <?= $form->field($modelUser, 'full_name')
                                ->textInput(['class'=>'input-text','placeholder'=>$modelUser->getAttributeLabel('full_name')])?>
                                
							<?= $form->field($modelUser, 'gender')
                        		->radioList(['0'=>'男','1'=>'女'], ['class' => 'select-box']) ?>
                                
                            
                            
                            
                            
<div>个人信息</div>

                            <?= $form->field($modelUserInfo, 'school_id')
                                ->textInput([ 'value'=>$modelSchoolInfo->name, 'disabled'=>true,'class'=>'input-text','placeholder'=>$modelUserInfo->getAttributeLabel('school_id')])?>
                           
                            <?= $form->field($modelUserInfo, 'major')
                                ->textInput([ 'disabled'=>true,'class'=>'input-text','placeholder'=>$modelUserInfo->getAttributeLabel('major')])?>
                                
                            <?= $form->field($modelUserInfo, 'classname')
                                ->textInput([ 'disabled'=>true,'class'=>'input-text','placeholder'=>$modelUserInfo->getAttributeLabel('classname')])?>
                                
                            <?= $form->field($modelUserInfo, 'money')
                                ->textInput([ 'disabled'=>true,'class'=>'input-text','placeholder'=>$modelUserInfo->getAttributeLabel('money')])?>
                                
                            <?= $form->field($modelUserInfo, 'icon')->hiddenInput(['id'=>'input_icon'])?>
                                
                    
                            <div id="icon" ></div>
                            
                            
                          
                        <div class="row cl">
                            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                                <input id="ajaxForm" class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                            </div>
                        </div>
                            <?php ActiveForm::end();?>
</article>
<script type="text/javascript">

/*
* 服务器地址,成功返回,失败返回参数格式依照jquery.ajax习惯;
* 其他参数同WebUploader
*/
$(function(){	
		$('#icon').diyUpload({
			url:'<?=Url::toRoute(['publics/upload','field' => 'icon','_csrf' => Yii::$app->request->csrfToken])?>',
			success:function( data ) {
				//alert(data['result']);
			},
			delfile:function( id ) {//删除文件
					$.get("<?=Url::toRoute(['publics/upload','field' => 'icon','_csrf' => Yii::$app->request->csrfToken])?>", { id: id });
			},
			error:function( err ) {
				alert(data['error']);
			},
			fileNumLimit:20,
			defaultBox:{//默认数据
			},
			accept: {}
		});
		
		
})
</script>



