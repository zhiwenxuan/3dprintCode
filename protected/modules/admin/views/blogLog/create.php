<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'博客系统'=>array('admin'),
	'发布博客',
);
?>


<h1>发布博客</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>