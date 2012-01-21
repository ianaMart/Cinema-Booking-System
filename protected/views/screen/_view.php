<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->screen_id), array('view', 'id'=>$data->screen_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen')); ?>:</b>
	<?php echo CHtml::encode($data->screen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seating_capacity')); ?>:</b>
	<?php echo CHtml::encode($data->seating_capacity); ?>
	<br />


</div>