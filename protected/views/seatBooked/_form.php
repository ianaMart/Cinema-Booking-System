<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seat-booked-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'booking_id'); ?>
		<?php echo $form->textField($model,'booking_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'booking_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'screen_seat_id'); ?>
		<?php echo $form->textField($model,'screen_seat_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'screen_seat_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->