<?php
$this->breadcrumbs=array(
	'Prices'=>array('index'),
	$model->price_id=>array('view','id'=>$model->price_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Price', 'url'=>array('index')),
	array('label'=>'Create Price', 'url'=>array('create')),
	array('label'=>'View Price', 'url'=>array('view', 'id'=>$model->price_id)),
	array('label'=>'Manage Price', 'url'=>array('admin')),
);
?>

<h1>Update Price <?php echo $model->price_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>