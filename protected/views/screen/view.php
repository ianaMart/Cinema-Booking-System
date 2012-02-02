<?php
$this->breadcrumbs=array(
	'Screens'=>array('index'),
	$model->screen_id,
);

$this->menu=array(
	array('label'=>'List Screen', 'url'=>array('index')),
	array('label'=>'Create Screen', 'url'=>array('create')),
	array('label'=>'Update Screen', 'url'=>array('update', 'id'=>$model->screen_id)),
	array('label'=>'Delete Screen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->screen_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Screen', 'url'=>array('admin')),
);
?>

<h1>View Screen #<?php echo $model->screen_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'screen_id',
		'screen',
		'seating_capacity',
	),
)); ?>
