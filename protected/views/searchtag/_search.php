<?php
/* @var $this SearchtagController */
/* @var $model Searchtag */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'searchTagId'); ?>
		<?php echo $form->textField($model,'searchTagId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'searchtag'); ?>
		<?php echo $form->textField($model,'searchtag',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->