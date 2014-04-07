<?php
/* @var $this SearchtagController */
/* @var $data Searchtag */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('searchTagId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->searchTagId), array('view', 'id'=>$data->searchTagId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('searchtag')); ?>:</b>
	<?php echo CHtml::encode($data->searchtag); ?>
	<br />


</div>