<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oauth_token')); ?>:</b>
	<?php echo CHtml::encode($data->oauth_token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oauth_token_secret')); ?>:</b>
	<?php echo CHtml::encode($data->oauth_token_secret); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('search_tag_1')); ?>:</b>
	<?php echo CHtml::encode($data->search_tag_1); ?>
	<br />


</div>