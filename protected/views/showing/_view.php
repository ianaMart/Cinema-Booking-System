<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('showing_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->showing_id), array('view', 'id'=>$data->showing_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('film_id')); ?>:</b>
	<?php echo CHtml::encode($data->film_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen_id')); ?>:</b>
	<?php echo CHtml::encode($data->screen_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_time')); ?>:</b>
	<?php echo CHtml::encode($data->start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_id')); ?>:</b>
	<?php echo CHtml::encode($data->price_id); ?>
	<br />


</div>