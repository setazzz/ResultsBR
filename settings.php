<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.22
 * Time: 11:55
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Settings</title>
    <?php include('inc/Head.html'); ?>
</head>
<body>
<?php include('inc/SettingsForm.html'); ?>
<a href="results.php" target="_blank">Results</a><br>
<!--<a href="input.php" target="_blank">Input</a><br>-->
<!--<div class="input-content">-->
<!--    <div class="routes">-->
<!--    </div>-->
<!--    <p class="score"></p>-->
<!--    <div class="entry-buttons">-->
<!--        <button class="clear">Clear</button><button class="submit">Submit</button>-->
<!--    </div>-->
<!--</div>-->
<!--<p class="output"></p>-->

<?php include('inc/Scripts.html'); ?>
<script src="js/SettingsFormEvents.js"></script>
</body>
</html>
