<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'booking-form',
    'action'=>array('create'),
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
    
    <div class="row">
		<?php echo CHtml::dropDownList('showing_id','', array(), array('ajax' => array('type'=>'POST','url'=>CController::createUrl('getSeatsAvailable'),'update'=>'#available_seats'))); ?>
	</div>
        
    <div class="row">
      <?php
      $help[0] = 'Number of seats?';
      for ($i = 1; $i <= 9; $i++) {
        $help[$i] = $i;}
      ?>
		<?php echo CHtml::dropDownList('no_of_seats_booked','', $help, array('ajax' => array('type'=>'POST','url'=>CController::createUrl('calculateTotalPrice'),'update'=>'#price'))); ?>
	</div>
    
    <div class="row">Seats available: <span id="available_seats">?</span></div>
    <div class="row">Total Price: £<span id="price">0</span></div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->