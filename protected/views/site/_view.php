<div class="poster">
<?php
$text='<img src="' . Yii::app()->getBaseUrl() . '/images/posters/' . $data->film_id . '.jpg" width="180" alt="' . $data->title . ' Poster" />';
$span='<span>' . $data->title . '</span>';
echo CHtml::link($text, array('film/view', 'id'=>$data->film_id));
echo '<p>' . CHtml::link($span, array('film/view', 'id'=>$data->film_id)) . '</p>';
?>
</div>
