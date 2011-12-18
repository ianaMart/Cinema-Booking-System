<?php
$this->breadcrumbs=array(
	'Films'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Film', 'url'=>array('index')),
	array('label'=>'Create Film', 'url'=>array('create')),
	array('label'=>'Update Film', 'url'=>array('update', 'id'=>$model->film_id)),
	array('label'=>'Delete Film', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->film_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Film', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?></h1>

<?php
$apikey = 'cjc8gt5d555bbrxjkztacxzb';
$query = urlencode($model->title); // make sure to url encode an query parameters

// construct the query with our apikey and the query we want to make
$endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies/' . $model->rt_id . '.json?apikey=' . $apikey;

// setup curl to make a call to the endpoint
$session = curl_init($endpoint);

// indicates that we want the response back
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// exec curl and get the data back
$data = curl_exec($session);

// remember to close the curl session once we are finished retrieveing the data
curl_close($session);

// decode the json data to make it easier to parse the php
$movie = json_decode($data);
if ($movie === NULL) die('Error parsing json');

// play with the data!
echo '<img src="' . $movie->posters->detailed . '" alt="Poster" />';
echo '<ul>';
echo '<li><b>Title:</b> ' . $movie->title . '</li>';
echo '<li><b>Year:</b> ' . $movie->year . '</li>';
echo '<li><b>Genres:</b><ul>';
foreach ($movie->genres as $genre) {
  echo $genre . ', ';
}
echo '</li></ul>';
echo '<li><b>MPAA Rating:</b> ' . $movie->mpaa_rating . '</li>';
echo '<li><b>Runtime:</b> ' . $movie->runtime . ' minutes</li>';
echo '<li><b>Cast:</b><ul>';
foreach ($movie->abridged_cast as $cast) {
  echo $cast->name . ', ';
}
echo '</li></ul>';
echo '</ul>';
echo '<iframe width="560" height="315" src="http://www.youtube.com/embed/' . $model->trailer . '" frameborder="0" allowfullscreen></iframe>'
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'film_id',
		'rt_id',
		'title',
		'runtime',
		'rating',
		'trailer',
	),
)); ?>
