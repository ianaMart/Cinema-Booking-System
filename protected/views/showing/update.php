<?php
$this->breadcrumbs=array(
	'Showings'=>array('index'),
	$model->showing_id=>array('view','id'=>$model->showing_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Showing', 'url'=>array('index')),
	array('label'=>'Create Showing', 'url'=>array('create')),
	array('label'=>'View Showing', 'url'=>array('view', 'id'=>$model->showing_id)),
	array('label'=>'Manage Showing', 'url'=>array('admin')),
);
?>

<h1>Update Showing <?php echo $model->showing_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>