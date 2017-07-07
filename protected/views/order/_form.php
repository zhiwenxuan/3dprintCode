<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'u_id'); ?>
		<?php echo $form->textField($model,'u_id'); ?>
		<?php echo $form->error($model,'u_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allPrice'); ?>
		<?php echo $form->textField($model,'allPrice',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'allPrice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textField($model,'remarks',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address'); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_stat'); ?>
		<?php echo $form->textField($model,'order_stat'); ?>
		<?php echo $form->error($model,'order_stat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_id'); ?>
		<?php echo $form->textField($model,'add_id'); ?>
		<?php echo $form->error($model,'add_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_time'); ?>
		<?php echo $form->textField($model,'add_time'); ?>
		<?php echo $form->error($model,'add_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edit_id'); ?>
		<?php echo $form->textField($model,'edit_id'); ?>
		<?php echo $form->error($model,'edit_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edit_time'); ?>
		<?php echo $form->textField($model,'edit_time'); ?>
		<?php echo $form->error($model,'edit_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->