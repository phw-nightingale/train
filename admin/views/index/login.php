<?php
// +----------------------------------------------------------------------
// | TITLE: this to do?
// +----------------------------------------------------------------------
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

?>
<?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => Url::toRoute('index/login')]); ?>
<style type="text/css">
.formControls p{ float: right;color:#900; padding-top:10px; padding-left:12px;}
</style>

<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="index.html" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3" style="text-align:right"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          
          
																<?= $form->field($model, 'username')
                                                                ->textInput([
                                                                    'autofocus' => true,
                                                                    'class' => 'input-text size-L',
                                                                    'style' => 'width:320px;',
                                                                    'placeholder' => '账户'
                                                                ])
                                                                ->label(false) ?>
          
          
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3" style="text-align:right"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          
																<?= $form->field($model, 'password')
                                                                ->textInput([
                                                                    'class' => 'input-text size-L',
																	'type'=>"password",
                                                                    'style' => 'width:320px;',
                                                                    'placeholder' => '密码'
                                                                ])
                                                                ->label(false) ?> 
          
          
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
			<?= $form->field($model, 'verify_code')
            ->textInput([
                'class' => 'input-text size-L',
                'style' => 'width:120px;',
                'onBlur' => "if(this.value==''){this.value='".Yii::t('app','verify')."';}",
                'onClick' => "if(this.value=='".Yii::t('app','verify')."'){this.value='';}",
                'placeholder' => Yii::t('app','verify')
            ])
            ->label(false) ?> 
 
          <span id='verify'></span> <a id="verifyIMG" href="javascript:;">看不清</a> 
          <p style="padding-top:13px;"><?=$verifyError?></p>
          </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name='loginForm[rememberMe]' value="1">
            使我保持登录状态</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
  </div>
</div>
 <?php ActiveForm::end(); ?>
<div class="footer">Copyright wx.gxmuzi.com by </div>

<script type="text/javascript">

	$(document).ready(function(){
		$('#verify').html("<img src='<?=Url::toRoute('index/verify')?>' width='128' height='48'>");	
		$("#verifyIMG").click( function () { 
			$('#verify').html("<img src='<?=Url::toRoute('index/verify')?>' width='128' height='48'>");		
		});     

	});

</script>




