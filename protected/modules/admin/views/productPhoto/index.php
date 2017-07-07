<?php
/* @var $this ProductPhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Photos',
);

$this->menu=array(
	array('label'=>'Create ProductPhoto', 'url'=>array('create')),
	array('label'=>'Manage ProductPhoto', 'url'=>array('admin')),
);
?>

<h1>Product Photos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
