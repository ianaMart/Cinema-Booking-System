<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('seat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->seat_id), array('view', 'id'=>$data->seat_id)); ?>
	<br />


</div>