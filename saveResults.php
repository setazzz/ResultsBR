<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.07
 * Time: 14:40
 */
if(isset($_POST['categories'])) {
    $json = $_POST['categories'];
    $new_input = $json;
} else {
    echo '<p>Access denied</p>';
    die;
}

$file = 'AllResults.json';
$results = json_decode(file_get_contents($file));

if (is_object($results->collection->results[0])) {
    $results->collection->results[] = $new_input;
}

$json = json_encode($results);

file_put_contents($file, $json);
header('location: resultsTableOutput.php');