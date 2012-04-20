<?php
if (Yii::app()->user->name=='admin') {
    $this->breadcrumbs=array(
        'Films',
    );

    $this->menu=array(
        array('label'=>'Create Film', 'url'=>array('create')),
        array('label'=>'Manage Film', 'url'=>array('admin')),
    );
}
if (Yii::app()->user->name != 'admin') {    
    $this->layout='//layouts/column1';
}
?>

<h1>Films</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'template' => "{sorter} {items} {pager}",
    'enableSorting'=>true,
    'sortableAttributes'=>array('film_id','title','year','runtime'),
)); ?>
