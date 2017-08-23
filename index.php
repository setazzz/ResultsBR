<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enter Your result</title>
    <?php include('inc/Head.html'); ?>
</head>
<body>
<div id="settings" style="display: none">
    <?php
        include ('UserFormSettings.php');
        echo htmlspecialchars($output);
    ?>
</div>
    <h1 class="title"></h1>
    <?php include('inc/UserInputForm.html'); ?>
    <a href="results.php" target="_blank">Results</a>
    <div class="input-content">
        <p class="score" id="score-top"></p>
        <div class="routes">
        </div>
        <p class="score"></p>
        <div class="entry-buttons">
            <button class="clear">Clear</button><button class="submit">Submit</button>
        </div>
    </div>
    <p class="output"></p>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/SettingsUserInput.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/input.js"></script>
    <script src="js/clickEvents.js"></script>
</body>
</html>