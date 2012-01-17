<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'booking-form',
	'enableAjaxValidation'=>false,
));

$showing=Showing::model()->findAll();
$showingList=CHtml::listData($showing,'start_date','start_date');

 ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::dropDownList('start_date','', $showingList, array('empty' => 'Choose a date', 'ajax' => array('type'=>'POST','url'=>CController::createUrl('getFilmsShowing'),'update'=>'#film_id'))); ?>
	</div>

	<div class="row">
		<?php echo CHtml::dropDownList('film_id','', array(), array('ajax' => array('type'=>'POST','url'=>CController::createUrl('getTimesShowing'),'update'=>'#showing_id'))); ?>
	</div>
    
    <div class="row buttons">
		<?php echo CHtml::dropDownList('showing_id','', array()); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->