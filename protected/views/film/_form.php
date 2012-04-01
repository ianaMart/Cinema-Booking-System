<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'film-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rt_id'); ?>
		<?php echo $form->textField($model,'rt_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rt_id'); ?>
	</div>

	<div id="showing_id"></div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'ajax' => array('type'=>'POST','url'=>CController::createUrl('rt'),'update'=>'#showing_id'))); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'runtime'); ?>
		<?php echo $form->textField($model,'runtime',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'runtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trailer'); ?>
		<?php echo $form->textField($model,'trailer',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'trailer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->