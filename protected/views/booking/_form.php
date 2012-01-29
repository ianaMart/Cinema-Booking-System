<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'booking-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'showing_id'); ?>
		<?php echo $form->textField($model,'showing_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'showing_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_seats_booked'); ?>
		<?php echo $form->textField($model,'no_of_seats_booked',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'no_of_seats_booked'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_price'); ?>
		<?php echo $form->textField($model,'total_price',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'total_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->