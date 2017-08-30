<!DOCTYPE html>
<html lang="en">
<head>
    <title>Results</title>
    <?php include('inc/Head.html'); ?>
</head>
<body style="max-width: 100%">
    <div id="settings" style="display: none">
        <?php
        include ('UserFormSettings.php');
        echo htmlspecialchars($meta);
        ?>
    </div>
    <div class="main-content">
        <button class="hideBtn">Hide routes</button>
        <h1 class="title"><?php echo $comp['name'];?></h1>
        <h3 class="date"><?php echo $comp['date'];?></h3>
        <a href="index.php">Enter Your result</a>
    </div>
        <?php include 'resultsTableOutput.php';
                echo singleTableOutput($numberOfRoutes, $allResultsMale, $specChal, 'male');
                echo singleTableOutput($numberOfRoutes, $allResultsFemale, $specChal, 'female');
        ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/clickEvents.js"></script>
    <script src="js/sort.js"></script>
</body>
</html>

<?php

