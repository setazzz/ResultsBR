<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.07
 * Time: 14:40
 */

if(isset($_POST['output'])) {

    include ('UserFormSettings.php');
    include ("inc/connection.php");


//get current comp results file name
//    foreach ($filesList as $file) {
//        $fileDate = substr($file, 8, 10);
//
//        if ($dateNow == $fileDate) {
//            $currentResultsFile = 'results/' . $file;
//            $fileExists = true;
//        }
//    }

    $json = $_POST['output'];


//    $file = $currentResultsFile;
//    $results = json_decode(file_get_contents($currentResultsFile));
//
//    if (is_object($results->meta)) {
//        $results->collection->results[] = $json;
//    }

//    $json = json_encode($results);
    $name = $json["name"];
    $result = $json['result'];
    $total = $json['total'];
    $specChal = $json['specChal'];
    $sex = $json['sex'];
    $pro = $json['pro'];

//        file_put_contents('test.txt', $specChal);
//die;
    $sql = "INSERT INTO test2(climber_name, result, total, spec_chal, sex, pro) VALUES('$name', '$result', $total, $specChal, '$sex', $pro)";

    $connection->query($sql);

//    if (mysqli_query($connection, $sql)) {
//        file_put_contents('test.txt', $str);
//    } else {
//        file_put_contents('test.txt', "Error: " . $sql . " " . mysqli_error($connection));
//    }
//    header('location: resultsTableOutput.php');
} else {
    echo '<h1>Access denied</h1>';
    echo '<a href="index.php">Įvesti rezultatą</a>';
}

