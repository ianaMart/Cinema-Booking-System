<?php
$this->breadcrumbs=array(
	'Screen Seats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ScreenSeat', 'url'=>array('index')),
	array('label'=>'Manage ScreenSeat', 'url'=>array('admin')),
);
?>

<h1>Create ScreenSeat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>