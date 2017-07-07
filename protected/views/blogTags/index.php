<?php
/* @var $this BlogTagsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Blog Tags',
);

$this->menu=array(
	array('label'=>'Create BlogTags', 'url'=>array('create')),
	array('label'=>'Manage BlogTags', 'url'=>array('admin')),
);
?>

<h1>Blog Tags</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
