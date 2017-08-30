<?php
include ("inc/connection.php");

date_default_timezone_set('Europe/Vilnius');
$dateNow = '2017-09-01';
$timeNow = date('H:i', time());
$fileExists = true;
$filesList = scandir('results/');
$settings = '';

$sql = $connection->query("SELECT * FROM comps WHERE date = CURRENT_DATE AND start_time < CURRENT_TIME AND end_time > CURRENT_TIME "); //todo: hardcoded comp id. Get it by date or something else
$comp = $sql->fetch_assoc();

if ($sql->num_rows != 0) {
    $meta = json_encode($comp);
}