<?php
$this->breadcrumbs=array(
	'Seats'=>array('index'),
	$model->seat_id,
);

$this->menu=array(
	array('label'=>'List Seat', 'url'=>array('index')),
	array('label'=>'Create Seat', 'url'=>array('create')),
	array('label'=>'Update Seat', 'url'=>array('update', 'id'=>$model->seat_id)),
	array('label'=>'Delete Seat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->seat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Seat', 'url'=>array('admin')),
);
?>

<h1>View Seat #<?php echo $model->seat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'seat_id',
	),
)); ?>
