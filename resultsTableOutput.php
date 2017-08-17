<?php

$allResults = json_decode(file_get_contents('AllResults.json'))->collection->results;
$meta = json_decode(file_get_contents('AllResults.json'))->meta;
$numberOfRoutes = $meta->numberOfRoutes;
$numberOfInputs = count((array)$allResults);

function singleClimber($resultIndex) {
    return 'result' . $resultIndex;
}

function singleTableLineOutput($routes, $results, $climberNumber) {
    $thisClimber = $results[$climberNumber];
    $scoreFlash = intval($thisClimber->total[0]);
    $scoreTop = intval($thisClimber->total[1]);
    $scoreBonus = intval($thisClimber->total[2]);

    echo '<tr><td>' . $thisClimber->name . '</td>';
    for ($i = 0; $i < $routes; $i++) {
        if($thisClimber->result[$i] == 1) {
            echo '<td>F</td>';
        } elseif ($thisClimber->result[$i] == 2) {
            echo '<td>T</td>';
        } elseif ($thisClimber->result[$i] == 3) {
            echo '<td>B</td>';
        } else {
            echo '<td>0</td>';
        }

    }
    echo '<td>' . $scoreFlash . '</td>';
    echo '<td>' . $scoreTop . '</td>';
    echo '<td>' . $scoreBonus . '</td>';
    echo '<td>' . $thisClimber->pro . '</td>';
}

// Start a table and put headings
echo '<table id="male"><thead><tr><th>Name</th>';
for ($i = 0; $i < $numberOfRoutes; $i++) {
    $routeNumber = $i + 1;
    echo '<th>' . $routeNumber . '</th>';
}
echo '<th>Flash</th><th>Top</th><th>Bonus</th><th>Pro</th></tr></thead><tbody>';

// loop through AllResults.json and display results to the table
for ($i = 0; $i < $numberOfInputs; $i++) {
    if ($allResults[$i]->sex == 'male') {
        singleTableLineOutput($numberOfRoutes, $allResults, $i);
    }
}

// end a table
echo '</tr></tbody></table>';

echo '<table id="female"><thead><tr><th>Name</th>';
for ($i = 0; $i < $numberOfRoutes; $i++) {
    $routeNumber = $i + 1;
    echo '<th>' . $routeNumber . '</th>';
}
echo '<th>Flash</th><th>Top</th><th>Bonus</th><th>Pro</th></tr></thead><tbody>';

// loop through AllResults.json and display results to the table
for ($i = 0; $i < $numberOfInputs; $i++) {
    if ($allResults[$i]->sex == 'female') {
        singleTableLineOutput($numberOfRoutes, $allResults, $i);
    }
}

// end a table
echo '</tr></tbody></table>';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sort.js"></script>



