<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div id="quote" class="clear">
<div class="coda-slider-wrapper">
  <div class="coda-slider preload" id="coda-slider-1">
    <div class="panel">
      <div class="panel-wrapper">
        <div class="logos alignleft"><h3 class="yahei">会员系统</h3></div>
        <div class="quote">

            <div id="contact">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'user-form',
                            'enableAjaxValidation'=>false,
                    )); ?>
                    <?php echo $form->errorSummary($model); ?>
                    <table class="form_style margin_left_1">
                        <tr>
                            <td class="form_title"><?php echo $form->labelEx($model,'username'); ?></td>
                            <td class="form_input"><?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>60)); ?></td>
                            <td><?php echo $form->error($model,'username'); ?></td>
                        </tr>
                        <tr>
                          <td><?php echo $form->labelEx($model,'password'); ?></td>
                          <td><?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32)); ?></td>
                          <td><?php echo $form->error($model,'password'); ?></td>
                        </tr>
    
                        <tr>
                          <td><?php echo $form->labelEx($model,'groupid'); ?></td>
                          <td><?php echo $form->textField($model,'groupid'); ?></td>
                          <td><?php echo $form->error($model,'groupid'); ?></td>
                        </tr>
                        <tr>
                          <td><?php echo $form->labelEx($model,'stat'); ?></td>
                          <td><?php echo $form->textField($model,'stat',array('size'=>1,'maxlength'=>1)); ?></td>
                          <td><?php echo $form->error($model,'stat'); ?></td>
                        </tr>
                       

                        <tr>
                          <td></td>
                          <td><?php echo CHtml::submitButton($model->isNewRecord ? '新  增' : '保  存',array('class'=>'submit')); ?></td>
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

	
