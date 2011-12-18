<?php
$this->breadcrumbs=array(
	'Seat Bookeds'=>array('index'),
	$model->seat_booked_id=>array('view','id'=>$model->seat_booked_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SeatBooked', 'url'=>array('index')),
	array('label'=>'Create SeatBooked', 'url'=>array('create')),
	array('label'=>'View SeatBooked', 'url'=>array('view', 'id'=>$model->seat_booked_id)),
	array('label'=>'Manage SeatBooked', 'url'=>array('admin')),
);
?>

<h1>Update SeatBooked <?php echo $model->seat_booked_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>