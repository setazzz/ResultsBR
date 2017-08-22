<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.07
 * Time: 14:40
 */

if(!isset($_POST['output'])) {

    $json = $_POST['output'];


    $file = 'JSON/AllResults2.json';
    $results = json_decode(file_get_contents($file));

    if (is_object($results->meta)) {
        $results->collection->results[] = $json;
    }

    $json = json_encode($results);

//    file_put_contents($file, $json);
//    header('location: resultsTableOutput.php');
} else {
    echo '<h1>Access denied</h1>';
    echo '<a href="index.php">Įvesti rezultatą</a>';
}

