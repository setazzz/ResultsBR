<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enter Your result</title>
    <?php include('inc/Head.html'); ?>
</head>
<body>
    <?php include('inc/UserInputForm.html'); ?>
    <a href="results.php" target="_blank">Results</a><br>
    <div class="input-content">
        <div class="routes">
        </div>
        <p class="score"></p>
        <div class="entry-buttons">
            <button class="clear">Clear</button><button class="submit">Submit</button>
        </div>
    </div>
    <p class="output"></p>

    <?php include('inc/Scripts.html'); ?>
</body>
</html>