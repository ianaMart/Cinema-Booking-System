<?php
Yii::import('application.vendors.*');
require_once('class.rotten_potatoes.php');

$rp = new rotten_potatoes(array("API_KEY" => Yii::app()->params['rtApiKey']));
$movie = $rp->get_movie($data->rt_id);
?>

<div class="poster">
<?php
$text='<img src="' . $movie->posters['detailed'] . '" alt="' . $movie->title . ' Poster" />';
echo CHtml::link($text, array('film/view', 'id'=>$data->film_id));
echo '<p><span>' . $data->title . '</span></p>';
?>
</div>
