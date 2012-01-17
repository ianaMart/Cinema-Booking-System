<?php
$endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies/' . $data->rt_id . '.json?apikey=' . Yii::app()->params['rtApiKey'];
$session = curl_init($endpoint);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$rtData = curl_exec($session);
curl_close($session);
$movie = json_decode($rtData);
if ($movie === NULL) die('Error parsing json');
?>

<div class="view">
<?php
$text='<img src="' . $movie->posters->detailed . '" alt="' . $movie->title . ' Poster" />';
echo CHtml::link($text, array('film/view', 'id'=>$data->film_id));
echo CHtml::encode($data->title);
?>

</div>
