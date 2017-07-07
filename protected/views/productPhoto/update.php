<?php
/* @var $this ProductPhotoController */
/* @var $model ProductPhoto */

$this->breadcrumbs=array(
	'Product Photos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductPhoto', 'url'=>array('index')),
	array('label'=>'Create ProductPhoto', 'url'=>array('create')),
	array('label'=>'View ProductPhoto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductPhoto', 'url'=>array('admin')),
);
?>

<h1>Update ProductPhoto <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>