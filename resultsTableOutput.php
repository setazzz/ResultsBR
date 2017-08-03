<?php

$allResults = json_decode(file_get_contents('AllResults.json'))->collection;
$numberOfRoutes = count($allResults->result1) - 1;                                  // should get this number from settings
$numberOfInputs = 3;                                                                // not done yet

function singleClimber($resultIndex) {
    return 'result' . $resultIndex;
}

function singleTableLineOutput($climberId, $results, $climberNumber) {
    $thisClimberId = singleClimber($climberNumber);
    $thisClimber = $results->$thisClimberId;
    echo '<tr><td>' . $thisClimber[$climberId]->name . '</td>';
    for ($i = 0; $i < $climberId; $i++) {
        if($thisClimber[$i]->flash == 1) {
            echo '<td>F</td>';
        } elseif ($thisClimber[$i]->top == 1) {
            echo '<td>T</td>';
        } elseif ($thisClimber[$i]->bonus) {
            if ($thisClimber[$i]->bonus == 1) {
                echo '<td>B</td>';
            }
        } else {
            echo '<td>0</td>';

        }

    }
    echo '<td>' . $thisClimber[$climberId]->flash . '</td>';
    echo '<td>' . $thisClimber[$climberId]->top . '</td>';
    echo '<td>' . $thisClimber[$climberId]->bonus . '</td>';
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


