<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->price_id), array('view', 'id'=>$data->price_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />


</div>