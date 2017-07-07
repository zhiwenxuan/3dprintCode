<?php
/* @var $this BlogLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Blog Logs',
);

$this->menu=array(
	array('label'=>'Create BlogLog', 'url'=>array('create')),
	array('label'=>'Manage BlogLog', 'url'=>array('admin')),
);
?>

<h1>Blog Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
