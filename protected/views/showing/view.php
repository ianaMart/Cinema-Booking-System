<?php
$this->breadcrumbs=array(
	'Showings'=>array('index'),
	$model->showing_id,
);

$this->menu=array(
	array('label'=>'List Showing', 'url'=>array('index')),
	array('label'=>'Create Showing', 'url'=>array('create')),
	array('label'=>'Update Showing', 'url'=>array('update', 'id'=>$model->showing_id)),
	array('label'=>'Delete Showing', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->showing_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Showing', 'url'=>array('admin')),
);
?>

<h1>View Showing #<?php echo $model->showing_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'showing_id',
		'film_id',
		'screen_id',
		'start_date',
		'start_time',
		'price_id',
	),
)); ?>
