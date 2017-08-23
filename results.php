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
    echo htmlspecialchars($output);
    ?>
</div>
    <?php include 'resultsTableOutput.php';?>

    <?php include('inc/Scripts.html'); ?>
</body>
</html>

<?php

