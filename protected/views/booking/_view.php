<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('booking_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->booking_id), array('view', 'id'=>$data->booking_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('showing_id')); ?>:</b>
	<?php echo CHtml::encode($data->showing_id); ?>
	<br />


</div>