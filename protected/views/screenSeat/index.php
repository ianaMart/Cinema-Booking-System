<?php
$this->breadcrumbs=array(
	'Screen Seats',
);

$this->menu=array(
	array('label'=>'Create ScreenSeat', 'url'=>array('create')),
	array('label'=>'Manage ScreenSeat', 'url'=>array('admin')),
);
?>

<h1>Screen Seats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
