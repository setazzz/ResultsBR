<?php
include ('UserFormSettings.php');
$file = json_decode(file_get_contents($currentResultsFile));
$allResults = $file->collection->results;
$meta = $file->meta;
$numberOfRoutes = $meta->numberOfRoutes;
$numberOfInputs = count((array)$allResults);
$specChal = false;
if($meta->specChal == 1) {
    $specChal = $meta->specChalPoints;
}
function singleTableLineOutput($routes, $results, $climberNumber, $specChal) {
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
    if($specChal) {
        echo '<td class="column-chal">+</td>';
    } else {
        echo '<td class="column-chal"></td>';
    }
    echo '<td class="column-score">' . $score . '</td>';
    echo '<td class="column-place">';
    if ($thisClimber->pro == '1') {
        echo '-';
    }
    echo '</td></tr>';
}

//Header
echo '<h1>' . $meta->name . '</h1>';

// Start a table and put headings
echo '<table id="male"><thead><tr><th class="column-name">Name</th>';
for ($i = 0; $i < $numberOfRoutes; $i++) {
    $routeNumber = $i + 1;
    echo '<th class="column-route lvl';
    echo ceil(($i + 1) / 8) . '">';
    if ($routeNumber) {
        echo $routeNumber;
    } else {
        echo '</td>';
    }
}
if($meta->specChal == 1) {
    echo '<th class="column-chal">Spec</th>';
}

echo '<th class="column-score">Score</th>
      <th class="column-place">Place</th>
      </tr></thead><tbody>';

// loop through AllResults.json and display results to the table
for ($i = 0; $i < $numberOfInputs; $i++) {
    if ($allResults[$i]->sex == 'male') {
        singleTableLineOutput($numberOfRoutes, $allResults, $i, $specChal);
    }
}

// end a table
echo '</tbody></table>';


