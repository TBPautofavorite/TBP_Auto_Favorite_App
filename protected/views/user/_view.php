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

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('twitter_id')); ?>:</b>
	<?php echo CHtml::encode($data->twitter_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oauth_token')); ?>:</b>
	<?php echo CHtml::encode($data->oauth_token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oauth_token_secret')); ?>:</b>
	<?php echo CHtml::encode($data->oauth_token_secret); ?>
	<br />


</div>