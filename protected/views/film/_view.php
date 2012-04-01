<?php
Yii::import('application.vendors.*');
require_once('class.rotten_potatoes.php');

$rp = new rotten_potatoes(array("API_KEY" => Yii::app()->params['rtApiKey']));
$movie = $rp->get_movie($data->rt_id);

//$endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies/' . $data->rt_id . '.json?apikey=' . Yii::app()->params['rtApiKey'];
//$session = curl_init($endpoint);
//curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
//$rtData = curl_exec($session);
//curl_close($session);
//$movie = json_decode($rtData);
//if ($movie === NULL) die('Error parsing json');
?>

<div class="poster">
<?php
$text='<img src="' . $movie->posters['detailed'] . '" alt="' . $movie->title . ' Poster" />';
echo CHtml::link($text, array('film/view', 'id'=>$data->film_id));
echo '<p><span>' . $data->title . '</span></p>';
?>
</div>