<?php
/* @var $this IntegralController */
/* @var $model Integral */

$this->breadcrumbs=array(
	'Integrals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Integral', 'url'=>array('index')),
	array('label'=>'Create Integral', 'url'=>array('create')),
	array('label'=>'View Integral', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Integral', 'url'=>array('admin')),
);
?>

<h1>Update Integral <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>