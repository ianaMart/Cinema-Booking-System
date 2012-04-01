<h1>About</h1>

<p>This is a "static" page.</p>

<?php
$apikey = Yii::app()->params['rtApiKey'];
$query = urlencode('batman');
$endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?q=' . $query . '&page_limit=5&page=1&apikey=' . $apikey;
$session = curl_init($endpoint);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($session);
curl_close($session);
$movie = json_decode($data);
if ($movie === NULL) {
    die('Error parsing json');
} else {
    echo '<ul>';
    for ($i = 0; $i < count($movie->movies); $i++) {
        echo '<li><strong>'
        . $movie->movies[$i]->id . '</strong> ' 
        . $movie->movies[$i]->title . ' ('
        . $movie->movies[$i]->year
        . ')</li>';
    }
    echo '</ul>';
}