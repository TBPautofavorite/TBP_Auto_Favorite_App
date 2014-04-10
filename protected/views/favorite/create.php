<?php
/* @var $this FavoriteController */
/* @var $model Favorite */

$this->breadcrumbs=array(
	'Favorites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Favorite', 'url'=>array('index')),
	array('label'=>'Manage Favorite', 'url'=>array('admin')),
);
?>

<h1>Create Favorite</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>