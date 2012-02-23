<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Prototype of <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template' => "{items}",
));