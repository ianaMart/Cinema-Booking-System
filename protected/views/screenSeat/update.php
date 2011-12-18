<?php
$this->breadcrumbs=array(
	'Screen Seats'=>array('index'),
	$model->screen_seat_id=>array('view','id'=>$model->screen_seat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ScreenSeat', 'url'=>array('index')),
	array('label'=>'Create ScreenSeat', 'url'=>array('create')),
	array('label'=>'View ScreenSeat', 'url'=>array('view', 'id'=>$model->screen_seat_id)),
	array('label'=>'Manage ScreenSeat', 'url'=>array('admin')),
);
?>

<h1>Update ScreenSeat <?php echo $model->screen_seat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>