<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.07
 * Time: 14:40
 */
$new_input = [
    "name" => "Zigmas",
    "result" => [1, 1, 1, 2, 4]
];

$file = 'AllResults.json';
$books = json_decode(file_get_contents($file));

if (is_object($books->collection->results[0])) {
    $books->collection->results[] = $new_input;
}

$json = json_encode($books);

file_put_contents($file, $json);
header('location: resultsTableOutput.php');