<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('seat_booked_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->seat_booked_id), array('view', 'id'=>$data->seat_booked_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('booking_id')); ?>:</b>
	<?php echo CHtml::encode($data->booking_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen_seat_id')); ?>:</b>
	<?php echo CHtml::encode($data->screen_seat_id); ?>
	<br />


</div>