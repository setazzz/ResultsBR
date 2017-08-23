<?php

date_default_timezone_set('Europe/Vilnius');
$dateNow = date('Y-m-d', time());
$timeNow = date('H:i', time());
$fileExists = false;
$filesList = scandir('results/');
$settings = '';

//var_dump($timeNow);
//get current comp results file name
foreach ($filesList as $file) {
    $fileDate = substr($file, 8, 10);

    if ($dateNow == $fileDate) {
//        $fileTime = substr();

        $currentResultsFile = 'results/' . $file;
        $fileExists = true;
    }
}

if ($fileExists) {
    //var_dump($currentResultsFile);
    $meta = json_decode(file_get_contents($currentResultsFile))->meta;
    $startTime = $meta->startTime;
    $endTime = $meta->endTime;
    if($startTime <= $timeNow && $endTime >= $timeNow) {
        echo 'started<br>';
    } else {
        echo 'not<br>';
    }
//    else if ($endTime >= $timeNow) {
//        echo 'ended';
//    }
//    var_dump($meta->startTime);
//    var_dump($meta->name);
} else {
    echo 'There is no competition at the time. Come back later';
    die;
}

var_dump($settings);


echo json_decode(42);