<div class="poster">
<?php
$text='<img src="../../images/posters/' . $data->film_id . '.jpg" alt="' . $data->title . ' Poster" />';
echo CHtml::link($text, array('film/view', 'id'=>$data->film_id));
echo '<p><span>' . $data->title . '</span></p>';
?>
</div>
