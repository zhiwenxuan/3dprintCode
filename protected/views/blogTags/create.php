<?php
/* @var $this BlogTagsController */
/* @var $model BlogTags */

$this->breadcrumbs=array(
	'Blog Tags'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlogTags', 'url'=>array('index')),
	array('label'=>'Manage BlogTags', 'url'=>array('admin')),
);
?>

<h1>Create BlogTags</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>