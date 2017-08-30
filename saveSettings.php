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
    $tableName = $compName . str_replace('-', '', $compDate);
    $startTime = $data->startTime;
    $endTime = $data->endTime;
    $numberOfRoutes = $data->numberOfRoutes;
    $specChal = $data->specChal;
    $specChalPoints = $data->specChalPoints;

    $connection->query("CREATE TABLE $tableName(
                                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                name VARCHAR (50) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
                                result VARCHAR (50) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
                                total INT,
                                spec_chal INT,
                                sex VARCHAR (50) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
                                pro INT
                      )");
    if ($connection->error == '') {
        $connection->query("INSERT INTO
                            comps(name, date, start_time, end_time, number_of_routes, spec_chal, spec_chal_points)
                           VALUES('$compName', '$compDate', '$startTime', '$endTime', '$numberOfRoutes', '$specChal', '$specChalPoints')");
    }
} else {
    echo '<h1>Access denied</h1>';
    echo '<a href="index.php">Įvesti rezultatą</a>';
}
