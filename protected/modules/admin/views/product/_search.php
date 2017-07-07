<?php
/* @var $this ProductController */
/* @var $model Product */
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
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'three_model'); ?>
		<?php echo $form->textField($model,'three_model',array('size'=>60,'maxlength'=>225)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thumbnail'); ?>
		<?php echo $form->textField($model,'thumbnail',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic1'); ?>
		<?php echo $form->textField($model,'pic1',array('size'=>60,'maxlength'=>225)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic2'); ?>
		<?php echo $form->textField($model,'pic2',array('size'=>60,'maxlength'=>225)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic3'); ?>
		<?php echo $form->textField($model,'pic3',array('size'=>60,'maxlength'=>225)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic4'); ?>
		<?php echo $form->textField($model,'pic4',array('size'=>60,'maxlength'=>225)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buy'); ?>
		<?php echo $form->textField($model,'buy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'push'); ?>
		<?php echo $form->textField($model,'push'); ?>
	</div>

	

	

	<div class="row">
		<?php echo $form->label($model,'shelves'); ?>
		<?php echo $form->textField($model,'shelves'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stat'); ?>
		<?php echo $form->textField($model,'stat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_uid'); ?>
		<?php echo $form->textField($model,'add_uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_time'); ?>
		<?php echo $form->textField($model,'add_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'edit_uid'); ?>
		<?php echo $form->textField($model,'edit_uid'); ?>
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