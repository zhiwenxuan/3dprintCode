<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_id')); ?>:</b>
	<?php echo CHtml::encode($data->u_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allPrice')); ?>:</b>
	<?php echo CHtml::encode($data->allPrice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_stat')); ?>:</b>
	<?php echo CHtml::encode($data->order_stat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_id')); ?>:</b>
	<?php echo CHtml::encode($data->add_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('add_time')); ?>:</b>
	<?php echo CHtml::encode($data->add_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edit_id')); ?>:</b>
	<?php echo CHtml::encode($data->edit_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edit_time')); ?>:</b>
	<?php echo CHtml::encode($data->edit_time); ?>
	<br />

	*/ ?>

</div>