<!DOCTYPE html>
<html lang="en">
<head>
    <title>Results</title>
    <?php include('inc/Head.html'); ?>
</head>
<body style="max-width: 100%">
    <div id="settings" class="hide">
        <?php
        include ('UserFormSettings.php');
        echo htmlspecialchars($output);
        ?>
    </div>
    <button class="hideBtn">Hide routes</button>
    <h1 class="title"><?php echo $meta->name;?></h1>
    <h3 class="date"><?php echo $meta->date;?></h3>
    <a href="index.php">Enter Your result</a>
        <?php include 'resultsTableOutput.php';
            echo singleTableOutput($numberOfRoutes, $allResults, $specChal, 'male');
            echo singleTableOutput($numberOfRoutes, $allResults, $specChal, 'female');
        ?>
    <a href="results/Results_2017-08-25_BouldeRingas.json" download>Download file</a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/clickEvents.js"></script>
    <script src="js/sort.js"></script>
</body>
</html>

<?php

