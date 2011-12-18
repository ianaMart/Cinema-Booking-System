<?php
$this->breadcrumbs=array(
	'Seat Bookeds'=>array('index'),
	$model->seat_booked_id,
);

$this->menu=array(
	array('label'=>'List SeatBooked', 'url'=>array('index')),
	array('label'=>'Create SeatBooked', 'url'=>array('create')),
	array('label'=>'Update SeatBooked', 'url'=>array('update', 'id'=>$model->seat_booked_id)),
	array('label'=>'Delete SeatBooked', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->seat_booked_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SeatBooked', 'url'=>array('admin')),
);
?>

<h1>View SeatBooked #<?php echo $model->seat_booked_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'seat_booked_id',
		'booking_id',
		'screen_seat_id',
	),
)); ?>
