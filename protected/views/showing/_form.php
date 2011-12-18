<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'showing-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'film_id'); ?>
		<?php echo $form->textField($model,'film_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'film_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'screen_id'); ?>
		<?php echo $form->textField($model,'screen_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'screen_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
		<?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_id'); ?>
		<?php echo $form->textField($model,'price_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'price_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->