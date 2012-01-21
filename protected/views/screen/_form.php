<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'screen-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'screen_id'); ?>
		<?php echo $form->textField($model,'screen_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'screen_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'screen'); ?>
		<?php echo $form->textField($model,'screen',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'screen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seating_capacity'); ?>
		<?php echo $form->textField($model,'seating_capacity',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'seating_capacity'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->