<?php
/* @var $this BlogCommentController */
/* @var $model BlogComment */

$this->breadcrumbs=array(
	'Blog Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogComment', 'url'=>array('index')),
	array('label'=>'Create BlogComment', 'url'=>array('create')),
	array('label'=>'View BlogComment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BlogComment', 'url'=>array('admin')),
);
?>

<h1>Update BlogComment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>