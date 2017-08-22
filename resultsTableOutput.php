<?php

$allResults = json_decode(file_get_contents('JSON/AllResults.json'))->collection->results;
$meta = json_decode(file_get_contents('JSON/AllResults.json'))->meta;
$numberOfRoutes = $meta->numberOfRoutes;
$numberOfInputs = count((array)$allResults);

function singleTableLineOutput($routes, $results, $climberNumber) {
    $thisClimber = $results[$climberNumber];
    $score = intval($thisClimber->total);

    echo '<tr><td class="column-name">' . $thisClimber->name . '</td>';
    for ($i = 0; $i < $routes; $i++) {
        echo '<td class="column-route lvl';
        echo ceil(($i + 1) / 8) . '">';
        if ($thisClimber->result[$i]) {
            echo $thisClimber->result[$i];
        } else {
            echo '</td>';
        }
    }
    echo '<td class="column-result">' . $score . '</td>';
    echo '<td class="column-pro">';
    if ($thisClimber->pro == '1') {
        echo '+';
    }
    echo '</td></tr>';
}


//Header
echo '<h1>' . $meta->name . '</h1>';




// Start a table and put headings
echo '<table id="male"><thead><tr><th class="column-name">Name</th>';
for ($i = 0; $i < $numberOfRoutes; $i++) {
    $routeNumber = $i + 1;
    echo '<td class="column-route lvl';
    echo ceil(($i + 1) / 8) . '">';
    if ($routeNumber) {
        echo $routeNumber;
    } else {
        echo '</td>';
    }}
echo '<th class="column-result">Flash</th>
      <th class="column-pro">Pro</th>
      </tr></thead><tbody>';




// loop through AllResults.json and display results to the table
for ($i = 0; $i < $numberOfInputs; $i++) {
    if ($allResults[$i]->sex == 'male') {
        singleTableLineOutput($numberOfRoutes, $allResults, $i);
    }
}

// end a table
echo '</tbody></table>';


