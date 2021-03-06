<?php
/* @var $this DownloadController */
/* @var $model Download */

$this->breadcrumbs=array(
	'Downloads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Download', 'url'=>array('index')),
	array('label'=>'Create Download', 'url'=>array('create')),
	array('label'=>'Update Download', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Download', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Download', 'url'=>array('admin')),
);
?>

<h1>View Download #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'u_id',
		'p_id',
		'download',
		'add_id',
		'integral',
		'add_time',
	),
)); ?>
