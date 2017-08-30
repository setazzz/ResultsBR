<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.22
 * Time: 13:58
 */

if(isset($_POST['output'])) {
    include ("inc/connection.php");

    $new_input = $_POST['output'];
    $json = json_encode($new_input);
    $data = json_decode($json);

    $compDate = $data->date;
    $compName = $data->name;
//    $str = str_replace('-', '', $compDate);
    $tableName = $compName . str_replace('-', '', $compDate);
    $startTime = $data->startTime;
    $endTime = $data->endTime;
    $numberOfRoutes = $data->numberOfRoutes;
    $specChal = $data->specChal;
    $specChalPoints = $data->specChalPoints;

    $connection->query("CREATE TABLE $tableName(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR (50), result VARCHAR (50), total INT, spec_chal INT, sex VARCHAR (50), pro INT)");
    if ($connection->error == '') {
        $connection->query("INSERT INTO comps(name, date, start_time, end_time, number_of_routes, spec_chal, spec_chal_points)VALUES('$compName', '$compDate', '$startTime', '$endTime', '$numberOfRoutes', '$specChal', '$specChalPoints')");
    }


echo 'test2';

} else {
    echo '<h1>Access denied</h1>';
    echo '<a href="index.php">Įvesti rezultatą</a>';
}
