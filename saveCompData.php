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

    $compName = $data->name;
    $compDate = $data->date;
    $startTime = $data->startTime;
    $endTime = $data->endTime;
    $numberOfRoutes = $data->numberOfRoutes;
    $specChal = $data->specChal;
    $specChalPoints = $data->specChalPoints;

//    file_put_contents('test.txt', $data->name . 1);

    $connection->query("CREATE TABLE $compName(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR (50), result VARCHAR (50), total INT, specChal INT, sex VARCHAR (50), pro INT)");
    $connection->query("INSERT INTO comps(name, date, start_time, end_time, number_of_routes, spec_chal, spec_chal_points)VALUES('$compName', '$compDate', '$startTime', '$endTime', '$numberOfRoutes', '$specChal', '$specChalPoints')");


echo 'test2';

} else {
    echo '<h1>Access denied</h1>';
    echo '<a href="index.php">Įvesti rezultatą</a>';
}
