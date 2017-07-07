<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	 '博客管理'=>array('admin'),
         '发布博客',
);

?>

<h1>发布博客</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>