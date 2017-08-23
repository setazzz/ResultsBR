<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.22
 * Time: 13:58
 */

if(isset($_POST['output'])) {
    $new_input = $_POST['output'];
    $json = json_encode($new_input);
    $data = json_decode($json);

    $compName = $data->name;
    $compDate = $data->date;
    $fileName = 'results/Results_' . $compDate . '_' . str_replace(' ', '', $compName) . '.json';

    $new_json = '{"collection":{"results":[';
    $new_json .= ']},"meta":';
    $new_json .= $json;
    $new_json .= '}';

    file_put_contents($fileName, $new_json);
} else {
    echo '<h1>Access denied</h1>';
    echo '<a href="index.php">Įvesti rezultatą</a>';
}
