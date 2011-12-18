<?php
$this->breadcrumbs=array(
	'Screen Seats'=>array('index'),
	$model->screen_seat_id,
);

$this->menu=array(
	array('label'=>'List ScreenSeat', 'url'=>array('index')),
	array('label'=>'Create ScreenSeat', 'url'=>array('create')),
	array('label'=>'Update ScreenSeat', 'url'=>array('update', 'id'=>$model->screen_seat_id)),
	array('label'=>'Delete ScreenSeat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->screen_seat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ScreenSeat', 'url'=>array('admin')),
);
?>

<h1>View ScreenSeat #<?php echo $model->screen_seat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'screen_seat_id',
		'seat_id',
		'screen_id',
	),
)); ?>
