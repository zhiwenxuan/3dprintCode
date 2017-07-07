<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'管理员管理'=>array('admin'),
	'修改管理员',
);

?>

<h1>修改管理员</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>