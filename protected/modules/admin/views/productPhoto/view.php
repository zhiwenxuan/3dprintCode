<?php
/* @var $this ProductPhotoController */
/* @var $model ProductPhoto */

$this->breadcrumbs=array(
	'Product Photos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductPhoto', 'url'=>array('index')),
	array('label'=>'Create ProductPhoto', 'url'=>array('create')),
	array('label'=>'Update ProductPhoto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductPhoto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductPhoto', 'url'=>array('admin')),
);
?>

<h1>View ProductPhoto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'p_id',
		'pic',
		'threeModel',
		'add_id',
		'add_time',
	),
)); ?>
