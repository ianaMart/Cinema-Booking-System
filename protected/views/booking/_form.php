<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'booking-form',
	'enableAjaxValidation'=>false,
));

$film=Film::model()->findAll();
$filmlist=CHtml::listData($film,'film_id','title'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::dropDownList('film_id','', $filmlist, array('empty' => 'Choose a film', 'ajax' => array('type'=>'POST','url'=>CController::createUrl('getDatesShowing'),'update'=>'#start_date'))); ?>
	</div>

	<div class="row">
		<?php echo CHtml::dropDownList('start_date','', array(), array('ajax' => array('type'=>'POST','url'=>CController::createUrl('getTimesShowing'),'update'=>'#showing_id'))); ?>
	</div>
    
    <div class="row buttons">
		<?php echo CHtml::dropDownList('showing_id','', array()); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->