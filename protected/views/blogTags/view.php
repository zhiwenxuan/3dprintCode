<?php
/* @var $this BlogTagsController */
/* @var $model BlogTags */

$this->breadcrumbs=array(
	'Blog Tags'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BlogTags', 'url'=>array('index')),
	array('label'=>'Create BlogTags', 'url'=>array('create')),
	array('label'=>'Update BlogTags', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BlogTags', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogTags', 'url'=>array('admin')),
);
?>

<h1>View BlogTags #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'stat',
		'create_time',
		'edit_time',
	),
)); ?>
