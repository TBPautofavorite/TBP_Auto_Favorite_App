<?php
/* @var $this FavoriteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Favorites',
);

$this->menu=array(
	array('label'=>'Create Favorite', 'url'=>array('create')),
	array('label'=>'Manage Favorite', 'url'=>array('admin')),
);
?>

<h1>Favorites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
