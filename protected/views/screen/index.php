<?php
$this->breadcrumbs=array(
	'Screens',
);

$this->menu=array(
	array('label'=>'Create Screen', 'url'=>array('create'),'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Manage Screen', 'url'=>array('admin'),'visible'=>Yii::app()->user->name=='admin'),
);
?>

<h1>Screens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
