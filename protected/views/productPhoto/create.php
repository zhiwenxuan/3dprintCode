<?php
/* @var $this ProductPhotoController */
/* @var $model ProductPhoto */

$this->breadcrumbs=array(
	'Product Photos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductPhoto', 'url'=>array('index')),
	array('label'=>'Manage ProductPhoto', 'url'=>array('admin')),
);
?>

<h1>Create ProductPhoto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>