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
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'searchtag1'); ?>
		<?php echo $form->textField($model,'searchtag1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'searchtag1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'searchtag2'); ?>
		<?php echo $form->textField($model,'searchtag2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'searchtag2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'searchtag3'); ?>
		<?php echo $form->textField($model,'searchtag3',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'searchtag3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'searchtag4'); ?>
		<?php echo $form->textField($model,'searchtag4',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'searchtag4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'searchtag5'); ?>
		<?php echo $form->textField($model,'searchtag5',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'searchtag5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'searchtag6'); ?>
		<?php echo $form->textField($model,'searchtag6',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'searchtag6'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->