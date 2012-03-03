<?php
$this->breadcrumbs=array(
	'Showings',
);

$this->menu=array(
	array('label'=>'Create Showing', 'url'=>array('create'),'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Manage Showing', 'url'=>array('admin'),'visible'=>Yii::app()->user->name=='admin'),
);
?>

<h1>Showings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
