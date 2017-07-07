<?php
/* @var $this BlogTagsController */
/* @var $model BlogTags */

$this->breadcrumbs=array(
	'Blog Tags'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogTags', 'url'=>array('index')),
	array('label'=>'Create BlogTags', 'url'=>array('create')),
	array('label'=>'View BlogTags', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BlogTags', 'url'=>array('admin')),
);
?>

<h1>Update BlogTags <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>