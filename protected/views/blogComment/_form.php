<?php
/* @var $this BlogCommentController */
/* @var $model BlogComment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blog-comment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'b_id'); ?>
		<?php echo $form->textField($model,'b_id'); ?>
		<?php echo $form->error($model,'b_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'u_id'); ?>
		<?php echo $form->textField($model,'u_id'); ?>
		<?php echo $form->error($model,'u_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'r_id'); ?>
		<?php echo $form->textField($model,'r_id'); ?>
		<?php echo $form->error($model,'r_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->