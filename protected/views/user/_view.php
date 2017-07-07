<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('create_id')); ?>:</b>
	<?php echo CHtml::encode($data->create_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('groupid')); ?>:</b>
	<?php echo CHtml::encode($data->groupid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stat')); ?>:</b>
	<?php echo CHtml::encode($data->stat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_id')); ?>:</b>
	<?php echo CHtml::encode($data->last_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('last_edit')); ?>:</b>
	<?php echo CHtml::encode($data->last_edit); ?>
	<br />

	*/ ?>

</div>