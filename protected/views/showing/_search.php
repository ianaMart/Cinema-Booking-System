<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'showing_id'); ?>
		<?php echo $form->textField($model,'showing_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'film_id'); ?>
		<?php echo $form->textField($model,'film_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'screen_id'); ?>
		<?php echo $form->textField($model,'screen_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price_id'); ?>
		<?php echo $form->textField($model,'price_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->