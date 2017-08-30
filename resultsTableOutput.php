<?php
include ('UserFormSettings.php');
include ('inc/connection.php');

$compsTable = $connection->query("SELECT * FROM comps ");

if ($compsTable->num_rows > 0) {
    echo '<ul>';
    while($row = $compsTable->fetch_assoc()) {
        echo '<li><a href="' . '?name=' . $row['name'] . '&date=' . $row['date'] . '">';
        echo $row['name'] . ', ' . $row['date'] . '<br>';
        echo '</a></li>';
    }
    echo '</ul>';
}else {
    echo 'No competition yet';
    die;
}

if (isset($_GET['name']) && isset($_GET['date'])) {
    $compName = $_GET['name'];
    $compDate = $_GET['date'];
    $tableName = $compName . str_replace('-', '', $compDate);
    $allResultsMale = $connection->query("SELECT * FROM $tableName WHERE sex = 'male'");
    $allResultsFemale = $connection->query("SELECT * FROM $tableName WHERE sex = 'female'");
    $meta = $connection->query("SELECT * FROM comps WHERE date = '$compDate' ")->fetch_assoc();
    $numberOfRoutes = $meta['number_of_routes'];
    $specChal = $meta['spec_chal'];
} else {
    die('Chose a competition You want');
}

function singleTableOutput($routes, $results, $specChal, $sex) {
    if ($results->num_rows != 0) {
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
        $output .= ($specChal == 1) ? '<th class="column-chal">Spec</th>' : '';
        $output .= '<th class="column-score">Score</th>
        <th class="column-place">Place</th>
        </tr></thead><tbody>';


        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                $thisClimber = $row;
                $singleLineOutput = '';
                $singleLineOutput .= '<tr class="row"><td class="column-name">' . $thisClimber['name'] . '</td>';
                for ($k = 0; $k < $routes; $k++) {
                    $singleLineOutput .= '<td class="column-route lvl';
                    $singleLineOutput .= ceil(($k + 1) / 8) . '">';
                    if ($thisClimber['result'] && $thisClimber['result'][$k] !== '0') {
                        $singleLineOutput .= $thisClimber['result'][$k] . '</td>';
                    } else {
                        $singleLineOutput .= '</td>';
                    }
                }
                if ($row['spec_chal']) {
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
    } else {
        echo 'No results in ' . $sex . ' group yet.<br>';
    }


}

