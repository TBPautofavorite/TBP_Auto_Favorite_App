<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oauth_token'); ?>
		<?php echo $form->textField($model,'oauth_token',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'oauth_token'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oauth_token_secret'); ?>
		<?php echo $form->textField($model,'oauth_token_secret',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'oauth_token_secret'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'search_tag_1'); ?>
		<?php echo $form->textField($model,'search_tag_1',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'search_tag_1'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->