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

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oauth_token')); ?>:</b>
	<?php echo CHtml::encode($data->oauth_token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oauth_token_secret')); ?>:</b>
	<?php echo CHtml::encode($data->oauth_token_secret); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('searchtag1')); ?>:</b>
	<?php echo CHtml::encode($data->searchtag1); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('searchtag2')); ?>:</b>
	<?php echo CHtml::encode($data->searchtag2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('searchtag3')); ?>:</b>
	<?php echo CHtml::encode($data->searchtag3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('searchtag4')); ?>:</b>
	<?php echo CHtml::encode($data->searchtag4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('searchtag5')); ?>:</b>
	<?php echo CHtml::encode($data->searchtag5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('searchtag6')); ?>:</b>
	<?php echo CHtml::encode($data->searchtag6); ?>
	<br />

	*/ ?>

</div>