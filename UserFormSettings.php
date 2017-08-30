<?php
include ("inc/connection.php");

date_default_timezone_set('Europe/Vilnius');

$sql = $connection->query("SELECT * FROM comps 
                              WHERE date = CURRENT_DATE
                                AND start_time < CURRENT_TIME
                                AND end_time > CURRENT_TIME - INTERVAL 20 MINUTE
                          ");
$comp = $sql->fetch_assoc();

if ($sql->num_rows != 0) {
    $meta = json_encode($comp);
}
