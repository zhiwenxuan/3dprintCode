<?php
/* @var $this BlogReadController */
/* @var $model BlogRead */

$this->breadcrumbs=array(
	'Blog Reads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogRead', 'url'=>array('index')),
	array('label'=>'Create BlogRead', 'url'=>array('create')),
	array('label'=>'View BlogRead', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BlogRead', 'url'=>array('admin')),
);
?>

<h1>Update BlogRead <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>