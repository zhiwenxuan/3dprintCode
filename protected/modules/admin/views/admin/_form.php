<?php
/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<table class="info_table">
       
          
        <tr>
            <td width="60"><?php echo $form->labelEx($model, 'name'); ?></td>
            <td><?php echo $form->textField($model, 'name', array('size' => 20, 'maxlength' => 20)); ?></td>
            <td><?php echo $form->error($model, 'name'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'password'); ?></td>
            <td><?php echo $form->passwordField($model, 'password', array('size' => 40, 'maxlength' => 40)); ?></td>
            <td><?php echo $form->error($model, 'password'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'email'); ?></td>
            <td><?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 96)); ?></td>
            <td><?php echo $form->error($model, 'email'); ?></td>
        </tr>

        <tr>
            <td></td>
            <td colspan="2"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
        </tr>
        </table>


<?php $this->endWidget(); ?>

</div><!-- form -->