<?php
$this->breadcrumbs=array(
	'Showings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Showing', 'url'=>array('index')),
	array('label'=>'Manage Showing', 'url'=>array('admin')),
);
?>

<h1>Create Showing</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>