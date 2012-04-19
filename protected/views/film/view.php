<?php
if (Yii::app()->user->name=='admin') {
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
}
//if (Yii::app()->user->name != 'admin') {    
//    $this->layout='//layouts/column1';
//}
?>

<h1><?php echo $model->title; ?></h1>

<div id="poster" class="span-5">
<?php echo '<img src="' . Yii::app()->getBaseUrl() . '/images/posters/' . $model->film_id . '.jpg" alt="' . $model->title . ' Poster" />'; ?>
</div>

<div id="filminfo" class="span-14">
<?php
echo '<ul>';
echo '<li><b>Title:</b> ' . $model->title . '</li>';
echo '<li><b>Year:</b> ' . $model->year . '</li>';
echo '<li><b>Genres:</b><ul>';
foreach ($movie->genres as $genre) {
  echo $genre . ', ';
}
echo '</li></ul>';

if ($movie->ratings->audience_score >= 0) {
    echo '<li><b>Audience Rating:</b> ' . $movie->ratings->audience_score .  '%</li>';
}
if ($movie->ratings->critics_score >= 0) {
    echo '<li><b>Critics Rating:</b> ' . $movie->ratings->critics_rating . ' (' . $movie->ratings->critics_score . '%)</li>';
}

echo '<li><b>Runtime:</b> ' . $model->runtime . ' minutes</li>';
echo '<li><b>MPAA Rating:</b> ' . $movie->mpaa_rating . '</li>';
echo '<li><b>Cast:</b><ul>';
foreach ($movie->abridged_cast as $cast) {
  echo $cast->name . ', ';
}
echo '</li></ul>';
echo '</ul>';

if ($movie->synopsis != null) {
    echo '<p><b>Synopsis:</b> ' . $movie->synopsis . '</p>';
}

if ($model->trailer != null) {
    echo '<h2>Trailer</h2>';
    echo '<iframe width="560" height="315" src="http://www.youtube.com/embed/' . $model->trailer . '" frameborder="0" allowfullscreen></iframe>';
}
?>
</div>

<?php if (Yii::app()->user->name=='admin') {
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'film_id',
		'rt_id',
		'title',
		'year',
		'runtime',
		'trailer',
	),
));
}?>