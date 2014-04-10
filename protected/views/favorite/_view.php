<?php
/* @var $this FavoriteController */
/* @var $data Favorite */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('favorite_tweet')); ?>:</b>
	<?php echo CHtml::encode($data->favorite_tweet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('search_tag')); ?>:</b>
	<?php echo CHtml::encode($data->search_tag); ?>
	<br />


</div>