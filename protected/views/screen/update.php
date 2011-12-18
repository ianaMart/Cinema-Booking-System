<?php
$this->breadcrumbs=array(
	'Screens'=>array('index'),
	$model->screen_id=>array('view','id'=>$model->screen_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Screen', 'url'=>array('index')),
	array('label'=>'Create Screen', 'url'=>array('create')),
	array('label'=>'View Screen', 'url'=>array('view', 'id'=>$model->screen_id)),
	array('label'=>'Manage Screen', 'url'=>array('admin')),
);
?>

<h1>Update Screen <?php echo $model->screen_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>