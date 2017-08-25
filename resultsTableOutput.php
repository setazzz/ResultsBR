<?php
include ('UserFormSettings.php');
$file = json_decode(file_get_contents($currentResultsFile));
$allResults = $file->collection->results;
$meta = $file->meta;
$numberOfRoutes = $meta->numberOfRoutes;
$numberOfInputs = count((array)$allResults);
$specChal = ($meta->specChal == 1) ? $meta->specChal : false;

function singleTableOutput($routes, $results, $specChal, $sex) {
    $output = '';

    $output .= '<table id="' . $sex . '"><thead><tr><th class="column-name">Name</th>';
    for ($i = 0; $i < $routes; $i++) {
        $routeNumber = $i + 1;
        $output .= '<th class="column-route lvl';
        $output .= ceil(($i + 1) / 8) . '">';
        if ($routeNumber <= $routes) {
            $output .= $routeNumber . '</th>';
        } else {
            $output .= '</th>';
        }
    }
    $output .= ($specChal == 1) ? '<th class="column-chal">Spec</th>': '';
    $output .= '<th class="column-score">Score</th>
      <th class="column-place">Place</th>
      </tr></thead><tbody>';

    for ($j = 0; $j < count($results); $j++) {
        if ($results[$j]->sex == $sex) {
            $thisClimber = $results[$j];
            $singleLineOutput = '';
            $singleLineOutput .= '<tr class="row"><td class="column-name">' . $thisClimber->name . '</td>';
            for ($k = 0; $k < $routes; $k++) {
                $singleLineOutput .= '<td class="column-route lvl';
                $singleLineOutput .= ceil(($k + 1) / 8) . '">';
                if ($thisClimber->result[$k]) {
                    $singleLineOutput .= $thisClimber->result[$k] . '</td>';
                } else {
                    $singleLineOutput .= '</td>';
                }
            }
            if($specChal) {
                $singleLineOutput .= '<td class="column-chal">+</td>';
            } else {
                $singleLineOutput .= '<td class="column-chal"></td>';
            }
            $singleLineOutput .= '<td class="column-score">' . $thisClimber->total . '</td>';
            $singleLineOutput .= '<td class="column-place">';
            if ($thisClimber->pro == '1') {
                $singleLineOutput .= '-';
            }
            $singleLineOutput .= '</td></tr>';
            $output .= $singleLineOutput;
        }
    }
    $output .= '</tbody></table>';
    return $output;
}

