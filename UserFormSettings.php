<?php

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

if ($fileExists) {
    $meta = json_decode(file_get_contents($currentResultsFile))->meta;
    $startTime = $meta->startTime;
    $endTime = $meta->endTime;
    if($startTime <= $timeNow && $endTime > $timeNow) {
        $output = json_encode($meta);
    }
} else {
    echo 'There is no competition at the time. Come back later';
    die;
}
