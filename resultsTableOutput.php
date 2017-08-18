<?php

$allResults = json_decode(file_get_contents('AllResults.json'))->collection->results;
$meta = json_decode(file_get_contents('AllResults.json'))->meta;
$numberOfRoutes = $meta->numberOfRoutes;
$numberOfInputs = count((array)$allResults);

function singleTableLineOutput($routes, $results, $climberNumber) {
    $thisClimber = $results[$climberNumber];
    $scoreFlash = intval($thisClimber->total[0]);
    $scoreTop = intval($thisClimber->total[1]);

    echo '<tr><td class="column-name">' . $thisClimber->name . '</td>';
    for ($i = 0; $i < $routes; $i++) {
        echo '<td class="column-route">' . $thisClimber->result[$i] . '</td>';
    }
    echo '<td class="column-flash">' . $scoreFlash . '</td>';
    echo '<td class="column-top">' . $scoreTop . '</td>';
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
    echo '<th class="column-route">' . $routeNumber . '</th>';
}
echo '<th class="column-flash">Flash</th>
      <th class="column-top">Top</th> 
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




// Start a table and put headings
echo '<table id="female"><thead><tr><th>Name</th>';

for ($i = 0; $i < $numberOfRoutes; $i++) {
    $routeNumber = $i + 1;
    echo '<th class="column-route">' . $routeNumber . '</th>';
}
echo '<th class="column-flash">Flash</th>
      <th class="column-top">Top</th> 
      <th class="column-pro">Pro</th>
      </tr></thead><tbody>';


// loop through AllResults.json and display results to the table
for ($i = 0; $i < $numberOfInputs; $i++) {
    if ($allResults[$i]->sex == 'female') {
        singleTableLineOutput($numberOfRoutes, $allResults, $i);
    }
}

// end a table
echo '</tbody></table>';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sort.js"></script>



