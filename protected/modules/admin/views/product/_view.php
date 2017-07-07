<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('three_model')); ?>:</b>
	<?php echo CHtml::encode($data->three_model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail')); ?>:</b>
	<?php echo CHtml::encode($data->thumbnail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic1')); ?>:</b>
	<?php echo CHtml::encode($data->pic1); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pic2')); ?>:</b>
	<?php echo CHtml::encode($data->pic2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic3')); ?>:</b>
	<?php echo CHtml::encode($data->pic3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic4')); ?>:</b>
	<?php echo CHtml::encode($data->pic4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buy')); ?>:</b>
	<?php echo CHtml::encode($data->buy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('push')); ?>:</b>
	<?php echo CHtml::encode($data->push); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('material')); ?>:</b>
	<?php echo CHtml::encode($data->material); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shelves')); ?>:</b>
	<?php echo CHtml::encode($data->shelves); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stat')); ?>:</b>
	<?php echo CHtml::encode($data->stat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_uid')); ?>:</b>
	<?php echo CHtml::encode($data->add_uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_time')); ?>:</b>
	<?php echo CHtml::encode($data->add_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edit_uid')); ?>:</b>
	<?php echo CHtml::encode($data->edit_uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edit_time')); ?>:</b>
	<?php echo CHtml::encode($data->edit_time); ?>
	<br />

	*/ ?>

</div>