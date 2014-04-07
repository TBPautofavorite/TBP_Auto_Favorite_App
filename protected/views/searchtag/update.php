<?php
/* @var $this SearchtagController */
/* @var $model Searchtag */

$this->breadcrumbs=array(
	'Searchtags'=>array('index'),
	$model->searchTagId=>array('view','id'=>$model->searchTagId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Searchtag', 'url'=>array('index')),
	array('label'=>'Create Searchtag', 'url'=>array('create')),
	array('label'=>'View Searchtag', 'url'=>array('view', 'id'=>$model->searchTagId)),
	array('label'=>'Manage Searchtag', 'url'=>array('admin')),
);
?>

<h1>Update Searchtag <?php echo $model->searchTagId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>