<?php
$this->breadcrumbs=array(
	'Seat Bookeds',
);

$this->menu=array(
	array('label'=>'Create SeatBooked', 'url'=>array('create')),
	array('label'=>'Manage SeatBooked', 'url'=>array('admin')),
);
?>

<h1>Seat Bookeds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
