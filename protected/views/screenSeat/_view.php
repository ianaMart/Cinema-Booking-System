<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen_seat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->screen_seat_id), array('view', 'id'=>$data->screen_seat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seat_id')); ?>:</b>
	<?php echo CHtml::encode($data->seat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen_id')); ?>:</b>
	<?php echo CHtml::encode($data->screen_id); ?>
	<br />


</div>