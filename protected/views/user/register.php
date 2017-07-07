<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

Yii::app()->user->logout();//----用户登出
?>

<div id="quote" class="clear">
<div class="coda-slider-wrapper">
  <div class="coda-slider preload" id="coda-slider-1">
    <div class="panel">
      <div class="panel-wrapper">
        <div class="logos alignleft"><h3 class="yahei">用户注册</h3></div>
        <div class="quote">

            <div id="contact">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'user-form',
                            'enableAjaxValidation'=>true,
                    )); ?>
                    <?php //echo $form->errorSummary($model); ?>
                    <table class="form_style margin_left_1">
                        <tr>
                            <td class="form_title"><?php echo $form->labelEx($model,'name'); ?></td>
                            <td class="form_input"><?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>60)); ?></td>
                            <td><?php echo $form->error($model,'username'); ?></td>
                        </tr>
                        <tr>
                          <td><?php echo $form->labelEx($model,'password'); ?></td>
                          <td><?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32)); ?></td>
                          <td><?php echo $form->error($model,'password'); ?></td>
                        </tr>
                        
                        <tr>
                          <td><?php echo $form->labelEx($model,'passwordConfirm'); ?></td>
                          <td><?php echo $form->passwordField($model,'passwordConfirm',array('size'=>32,'maxlength'=>32)); ?></td>
                          <td> <?php echo $form->error($model,'passwordConfirm'); ?></td>
                        </tr>
                        
                        <tr>
                          <td><?php echo CHtml::activeLabelEx($model, 'verifyCode'); ?></td>
                          <td><?php echo CHtml::activeTextField($model, 'verifyCode', array('size' => 8, 'maxlength' => 10))?></td>
                          <td><div id="verifyCode"><?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer'))); ?></div></td>
                        </tr>

                        <tr>
                          <td></td>
                          <td><?php echo CHtml::submitButton($model->isNewRecord ? '立即注册' : '保  存',array('class'=>'submit')); ?></td>
                          <td></td>
                        </tr>
                    </table>
                    <?php $this -> endWidget();?>
            </div>

        </div>
      </div>
    </div>
    <!-- end panel -->
  </div>
</div>
</div>
<!-- end quote -->



    



