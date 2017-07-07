<?php
/* @var $this BlogReadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Blog Reads',
);

$this->menu=array(
	array('label'=>'Create BlogRead', 'url'=>array('create')),
	array('label'=>'Manage BlogRead', 'url'=>array('admin')),
);
?>

<h1>Blog Reads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
