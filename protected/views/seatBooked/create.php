<?php
$this->breadcrumbs=array(
	'Seat Bookeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SeatBooked', 'url'=>array('index')),
	array('label'=>'Manage SeatBooked', 'url'=>array('admin')),
);
?>

<h1>Create SeatBooked</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>