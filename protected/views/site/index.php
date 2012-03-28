<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Now Showing</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template' => "{items}",
));