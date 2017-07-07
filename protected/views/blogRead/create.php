<?php
/* @var $this BlogReadController */
/* @var $model BlogRead */

$this->breadcrumbs=array(
	'Blog Reads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlogRead', 'url'=>array('index')),
	array('label'=>'Manage BlogRead', 'url'=>array('admin')),
);
?>

<h1>Create BlogRead</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>