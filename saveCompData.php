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
    $compDate = substr($data->date, 5);
    $fileName = 'results/Results_' . str_replace(' ', '', $compName) . '_' . $compDate . '.json';

    $new_json = '{"collection":{"results":[';
    $new_json .= ']},"meta":';
    $new_json .= $json;
    $new_json .= '}';

    file_put_contents($fileName, $new_json);
} else {
    echo '<h1>Access denied</h1>';
    echo '<a href="index.php">Įvesti rezultatą</a>';
}
