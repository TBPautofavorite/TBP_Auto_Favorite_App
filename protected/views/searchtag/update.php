<?php
/* @var $this SearchtagController */
/* @var $model Searchtag */

$this->breadcrumbs=array(
	'Searchtags'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Searchtag', 'url'=>array('index')),
	array('label'=>'Create Searchtag', 'url'=>array('create')),
	array('label'=>'View Searchtag', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Searchtag', 'url'=>array('admin')),
);
?>

<h1>Update Searchtag <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>