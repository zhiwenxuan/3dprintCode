<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'u_id'); ?>
		<?php echo $form->textField($model,'u_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allPrice'); ?>
		<?php echo $form->textField($model,'allPrice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_stat'); ?>
		<?php echo $form->textField($model,'order_stat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_id'); ?>
		<?php echo $form->textField($model,'add_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_time'); ?>
		<?php echo $form->textField($model,'add_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'edit_id'); ?>
		<?php echo $form->textField($model,'edit_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'edit_time'); ?>
		<?php echo $form->textField($model,'edit_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->