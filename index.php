<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enter Your result</title>
    <?php include('inc/Head.html'); ?>
</head>
<body>
    <div id="settings" class="hide">
        <?php
            include ('UserFormSettings.php');
            echo htmlspecialchars($output);
        ?>
    </div>
    <h1 class="title"></h1>
    <h3 class="date"></h3>
    <?php include('inc/UserInputForm.html'); ?>
    <a href="results.php" target="_blank">Results</a>
    <div class="input-content">


        <div class="score" id="score-top"></div>



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
    <script src="js/jquery.sticky.js"></script>
</body>
</html>