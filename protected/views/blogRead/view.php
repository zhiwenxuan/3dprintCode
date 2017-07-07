<?php
/* @var $this BlogReadController */
/* @var $model BlogRead */

$this->breadcrumbs=array(
	'Blog Reads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BlogRead', 'url'=>array('index')),
	array('label'=>'Create BlogRead', 'url'=>array('create')),
	array('label'=>'Update BlogRead', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BlogRead', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogRead', 'url'=>array('admin')),
);
?>

<h1>View BlogRead #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'log_id',
		'ip_address',
		'create_time',
	),
)); ?>
