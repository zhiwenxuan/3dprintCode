<?php
/* @var $this BlogCommentController */
/* @var $model BlogComment */

$this->breadcrumbs=array(
	'Blog Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BlogComment', 'url'=>array('index')),
	array('label'=>'Create BlogComment', 'url'=>array('create')),
	array('label'=>'Update BlogComment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BlogComment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogComment', 'url'=>array('admin')),
);
?>

<h1>View BlogComment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'b_id',
		'u_id',
		'r_id',
		'create_time',
	),
)); ?>
