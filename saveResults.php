<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.07
 * Time: 14:40
 */

if(isset($_POST['output'])) {

    date_default_timezone_set('Europe/Vilnius');
    $dateNow = date('Y-m-d', time());
    $timeNow = date('H:i', time());
    $fileExists = false;
    $filesList = scandir('results/');
    $settings = '';

//get current comp results file name
    foreach ($filesList as $file) {
        $fileDate = substr($file, 8, 10);

        if ($dateNow == $fileDate) {
            $currentResultsFile = 'results/' . $file;
            $fileExists = true;
        }
    }

    $json = $_POST['output'];


    $file = $currentResultsFile;
    $results = json_decode(file_get_contents($currentResultsFile));

    if (is_object($results->meta)) {
        $results->collection->results[] = $json;
    }

    $json = json_encode($results);

    file_put_contents($file, $json);
//    header('location: resultsTableOutput.php');
} else {
    echo '<h1>Access denied</h1>';
    echo '<a href="index.php">Įvesti rezultatą</a>';
}

