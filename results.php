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
    <a href="index.php">Input</a>
    <?php include 'resultsTableOutput.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/clickEvents.js"></script>
    <script src="js/sort.js"></script>
</body>
</html>

<?php

