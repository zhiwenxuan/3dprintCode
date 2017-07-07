<?php
/* @var $this BlogCommentController */
/* @var $model BlogComment */

$this->breadcrumbs=array(
	'Blog Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlogComment', 'url'=>array('index')),
	array('label'=>'Manage BlogComment', 'url'=>array('admin')),
);
?>

<h1>Create BlogComment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>