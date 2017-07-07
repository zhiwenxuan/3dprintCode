<?php
/* @var $this IntegralController */
/* @var $model Integral */

$this->breadcrumbs=array(
	'Integrals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Integral', 'url'=>array('index')),
	array('label'=>'Create Integral', 'url'=>array('create')),
	array('label'=>'Update Integral', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Integral', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Integral', 'url'=>array('admin')),
);
?>

<h1>View Integral #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'u_id',
		'num',
		'type',
		'ad_time',
	),
)); ?>
