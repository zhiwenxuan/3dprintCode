<?php
	Yii::app()->user->logout();
?>


<div class="customer_main">


    <div class="register_center">
        <div class="title">注册用户</div>
    </div>
    
    <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
    'enableAjaxValidation'=>true,
	)); ?>

        <div class="row">
        		<?php echo $form->labelEx($model,'name'); ?>
                &nbsp;&nbsp;
				<?php echo $form->textField($model,'name',array('class'=>'m_ipt w_300','size'=>50,'maxlength'=>60)); ?>
                <?php echo $form->error($model,'name'); ?>
        </div>

        
    	<div class="row">
        	<?php echo $form->labelEx($model,'email'); ?>
            &nbsp;&nbsp;
            <?php echo $form->textField($model,'email',array('class'=>'m_ipt w_300','size'=>50,'maxlength'=>60)); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
    
    
        <div class="row">
                <?php echo $form->labelEx($model,'password'); ?>
                 &nbsp;&nbsp;
				<?php echo $form->passwordField($model,'password',array('class'=>'m_ipt w_300','size'=>50,'maxlength'=>60)); ?>
                <?php echo $form->error($model,'password'); ?>
        </div>
        
        <div class="row">
                <?php echo $form->labelEx($model,'verifyPassword'); ?>
                 &nbsp;&nbsp;
				<?php echo $form->passwordField($model,'verifyPassword',array('class'=>'m_ipt w_300','size'=>50,'maxlength'=>60)); ?>
                <?php echo $form->error($model,'verifyPassword'); ?>
        </div>
        
        <div class="row">
             <div class="float_left" style="line-height: 25px;" >
                   <?php echo CHtml::activeLabelEx($model, 'verifyCode'); ?>  
                </div>
                 
                 <div class="float_left" style="margin-left: 28px;">
                     <?php echo CHtml::activeTextField($model, 'verifyCode', array('size' =>4, 'maxlength' => 4,'class'=>'m_ipt'))?>
                 </div>
        
             <div id="verifyCode" class="float_left" ><?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer'))); ?></div>
        </div>
        <div class="clear"></div>


        <div style="margin-left: 75px; margin-bottom: 30px; float:left;">
        	<input type="submit" style="display:none;">
            <a class="button_register" onclick="$('#register-form').submit();"></a>
        </div>
        
        <div style="float:left; margin-left:15px; margin-top:12px;">
         已经是注册用户?&nbsp;<a href="<?php echo $this->createUrl('customer/login');?>"><font color="brown">立即登录</font></a>
        </div>
        
        <div class="clear"></div>
        

    <?php $this->endWidget(); ?>
    </div><!-- form -->
	
    
    
    
</div>