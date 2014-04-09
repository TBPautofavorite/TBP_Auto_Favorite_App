<?php
/* @var $this SearchtagController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Searchtags',
);

$this->menu=array(
	array('label'=>'Create Searchtag', 'url'=>array('create')),
	array('label'=>'Manage Searchtag', 'url'=>array('admin')),
);
?>

<h1>Searchtags</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
