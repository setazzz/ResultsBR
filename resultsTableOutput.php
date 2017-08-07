<?php

$allResults = json_decode(file_get_contents('AllResults.json'))->collection;
$meta = json_decode(file_get_contents('AllResults.json'))->meta;
$numberOfRoutes = $meta->numberOfRoutes;
$numberOfInputs = count((array)$allResults);

function singleClimber($resultIndex) {
    return 'result' . $resultIndex;
}

function singleTableLineOutput($routes, $results, $climberNumber) {
    $thisClimberId = singleClimber($climberNumber);
    $thisClimber = $results->$thisClimberId;
    $scoreFlash = 0;
    $scoreTop = 0;
    $scoreBonus = 0;

    echo '<tr><td>' . $thisClimber[0]->name . '</td>';

    for ($i = 0; $i < $routes; $i++) {
        if($thisClimber[0]->result[$i] == 1) {
            echo '<td>F</td>';
            $scoreFlash++;
            $scoreTop++;
            $scoreBonus++;
        } elseif ($thisClimber[0]->result[$i] == 2) {
            echo '<td>T</td>';
            $scoreTop++;
            $scoreBonus++;
        } elseif ($thisClimber[0]->result[$i] == 3) {
            echo '<td>B</td>';
            $scoreBonus++;
        } else {
            echo '<td>0</td>';
        }

    }
    echo '<td>' . $scoreFlash . '</td>';
    echo '<td>' . $scoreTop . '</td>';
    echo '<td>' . $scoreBonus . '</td>';
}

// Start a table and put headings
echo '<table><tr><th>Name</th>';
for ($i = 0; $i < $numberOfRoutes; $i++) {
    $routeNumber = $i + 1;
    echo '<th>' . $routeNumber . '</th>';
}
echo '<th>Flash</th><th>Top</th><th>Bonus</th></tr>';

// loop through AllResults.json and display results to the table
for ($i = 0; $i < $numberOfInputs; $i++) {
    $lineNumber = $i + 1;
    singleTableLineOutput($numberOfRoutes, $allResults, $lineNumber);
}

// end a table
echo '</tr></table>';


