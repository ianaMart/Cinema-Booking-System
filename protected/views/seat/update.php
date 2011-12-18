<?php
$this->breadcrumbs=array(
	'Seats'=>array('index'),
	$model->seat_id=>array('view','id'=>$model->seat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Seat', 'url'=>array('index')),
	array('label'=>'Create Seat', 'url'=>array('create')),
	array('label'=>'View Seat', 'url'=>array('view', 'id'=>$model->seat_id)),
	array('label'=>'Manage Seat', 'url'=>array('admin')),
);
?>

<h1>Update Seat <?php echo $model->seat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>