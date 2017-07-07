<?php
/* @var $this IntegralController */
/* @var $model Integral */

$this->breadcrumbs=array(
	'Integrals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Integral', 'url'=>array('index')),
	array('label'=>'Manage Integral', 'url'=>array('admin')),
);
?>

<h1>Create Integral</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>