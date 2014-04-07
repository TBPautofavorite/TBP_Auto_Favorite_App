<?php
/* @var $this SearchtagController */
/* @var $model Searchtag */

$this->breadcrumbs=array(
	'Searchtags'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Searchtag', 'url'=>array('index')),
	array('label'=>'Manage Searchtag', 'url'=>array('admin')),
);
?>

<h1>Create Searchtag</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>