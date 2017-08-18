<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/Head.html'); ?>
</head>
<body>
    <h1>Rezultatai</h1>
    <?php include('includes/UserInputForm.html'); ?>
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

    <?php include('includes/Scripts.html'); ?>
</body>
</html>