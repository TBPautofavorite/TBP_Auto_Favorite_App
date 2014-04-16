<?php
/* @var $this SearchtagController */
/* @var $model Searchtag */

$this->breadcrumbs=array(
	'Searchtags'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Searchtag', 'url'=>array('index')),
	array('label'=>'Create Searchtag', 'url'=>array('create')),
	array('label'=>'Update Searchtag', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Searchtag', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Searchtag', 'url'=>array('admin')),
);
?>

<h1>View Searchtag #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'search_tag',
		'user_id',
		'username',
	),
)); ?>
