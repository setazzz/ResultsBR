<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.07
 * Time: 14:40
 */
include ('UserFormSettings.php');
include ("inc/connection.php");

if(isset($_POST['output'])) {
    $meta = $connection->query("SELECT * FROM comps WHERE date = CURRENT_DATE ");
    $meta = $meta->fetch_assoc();

    $compName = strtolower($meta['name']);
    $compDate = $meta['date'];
    $tableName = $compName . str_replace('-', '', $compDate);
    $json = $_POST['output'];

    $name = $json["name"];
    $result = $json['result'];
    $total = $json['total'];
    $specChal = $json['specChal'];
    $sex = $json['sex'];
    $pro = $json['pro'];

    $sql = "INSERT INTO $tableName(name, result, total, spec_chal, sex, pro) VALUES('$name', '$result', $total, '$specChal', '$sex', '$pro')";

    $connection->query($sql);

} else {
    echo '<h1>Access denied</h1>';
    echo '<a href="index.php">Įvesti rezultatą</a>';
}

