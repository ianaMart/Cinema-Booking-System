<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('film_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->film_id), array('view', 'id'=>$data->film_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rt_id')); ?>:</b>
	<?php echo CHtml::encode($data->rt_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('runtime')); ?>:</b>
	<?php echo CHtml::encode($data->runtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rating')); ?>:</b>
	<?php echo CHtml::encode($data->rating); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trailer')); ?>:</b>
	<?php echo CHtml::encode($data->trailer); ?>
	<br />


</div>