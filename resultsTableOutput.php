<?php
include ('UserFormSettings.php');
include ('inc/connection.php');

//todo: fix hardcoded queries

$allResults = $connection->query("SELECT * FROM test2");
$meta = $connection->query("SELECT * FROM comps WHERE date = CURRENT_DATE ")->fetch_assoc();
$numberOfRoutes = $meta['number_of_routes'];
$specChal = $meta['spec_chal'];
$numberOfInputs = count($allResults);
$allResultsMale = $connection->query("SELECT * FROM test2 WHERE sex = 'male'");
$allResultsFemale = $connection->query("SELECT * FROM test2 WHERE sex = 'female'");


function singleTableOutput($routes, $results, $specChal, $sex) {
    $output = '';

    $output .= '<table id="' . $sex . '"><thead><tr><th class="column-name">Name</th>';
    for ($i = 0; $i < $routes; $i++) {
        $routeNumber = $i + 1;
        $output .= '<th class="column-route lvl';
        $output .= ceil(($routeNumber) / 8) . '">';
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

    if ($results->num_rows > 0) {
        while($row = $results->fetch_assoc()) {
                $thisClimber = $row;
                $singleLineOutput = '';
                $singleLineOutput .= '<tr class="row"><td class="column-name">' . $thisClimber['climber_name'] . '</td>';
                for ($k = 0; $k < $routes; $k++) {
                    $singleLineOutput .= '<td class="column-route lvl';
                    $singleLineOutput .= ceil(($k + 1) / 8) . '">';
                    if ($thisClimber['result'] && $thisClimber['result'][$k] !== '0') {
                        $singleLineOutput .= $thisClimber['result'][$k] . '</td>';
                    } else {
                        $singleLineOutput .= '</td>';
                    }
                }
                if($row['spec_chal']) {
                    $singleLineOutput .= '<td class="column-chal">+</td>';
                } else {
                    $singleLineOutput .= '<td class="column-chal"></td>';
                }
                $singleLineOutput .= '<td class="column-score">' . $thisClimber['total'] . '</td>';
                $singleLineOutput .= '<td class="column-place">';
                if ($thisClimber['pro'] == '1') {
                    $singleLineOutput .= '-';
                }
                $singleLineOutput .= '</td></tr>';
                $output .= $singleLineOutput;
        }
    }

    $output .= '</tbody></table>';
    return $output;
}

