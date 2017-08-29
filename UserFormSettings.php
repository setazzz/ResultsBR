<?php
include ("inc/connection.php");

date_default_timezone_set('Europe/Vilnius');
//$dateNow = date('Y-m-d', time());
$dateNow = '2017-09-01';
$timeNow = date('H:i', time());
$fileExists = true;
$filesList = scandir('results/');
$settings = '';

$sql = mysqli_query($connection, "SELECT * FROM comps WHERE id = 1"); //todo hardcoded comp id. Get it by date or something else

$comp = $sql->fetch_assoc();



//get current comp results file name
//foreach ($filesList as $file) {
//    $fileDate = substr($file, 8, 10);
//
//    if ($dateNow == $fileDate) {
//        $currentResultsFile = 'results/' . $file;
//        $fileExists = true;
//    }
//}

if ($sql) {
    $meta = json_encode($comp);
} else {
    echo '<br><br>There is no competition at the time. Come back later';
}
