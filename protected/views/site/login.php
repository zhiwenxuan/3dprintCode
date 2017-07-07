<?php
$this->breadcrumbs=array(
	'登录',
);
?>


 
<div class="font_center">
    <div class="font-style-h1" style="float: left;">用户登录</div>
    <div style="float: right; font-size: 12px; line-height: 42px; color: #ccc; height: 20px;">
        还没有账号?&nbsp;&nbsp;<a href="<?php echo $this->createUrl('customer/register');?>"><font color="brown">立即注册</font></a></p>
    </div>
    <div style="clear: both;"></div>
</div>
<div class="login">
    
    
    <div class="form">
    <?php 
            $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
    ));?>
        <div style="margin-top: 35px;">
        <div class="row">
                <?php echo $form->labelEx($model,'username'); ?>
                &nbsp;&nbsp;
                <?php echo $form->textField($model,'username',array('class'=>'input_width')); ?>
                <?php echo $form->error($model,'username'); ?>
        </div><!--

    -->	<div class="row">
                <?php echo $form->labelEx($model,'password'); ?>
                &nbsp;&nbsp;                                  
                <?php echo $form->passwordField($model,'password',array('class'=>'input_width')); ?>
                <?php echo $form->error($model,'password'); ?>

        </div>

		
		
        <div style="margin-left: 55px; margin-bottom: 30px;">
        	<input type=submit style="display:none;" value="提交" />
            <a id="login"  class="button_login" onclick="$('#login-form').submit();"></a>
        </div>
    
    
        </div>

    <?php $this->endWidget(); ?>
    </div><!-- form -->
    
    
</div>
