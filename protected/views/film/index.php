<?php
$this->breadcrumbs=array(
	'Films',
);

$this->menu=array(
	array('label'=>'Create Film', 'url'=>array('create'),'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Manage Film', 'url'=>array('admin'),'visible'=>Yii::app()->user->name=='admin'),
);
?>

<h1>Films</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'template' => "{items}",
)); ?>
