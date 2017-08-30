<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.18
 * Time: 12:08
 */

$user = 'root';
$pass = '';
$db = 'resultsbr_database';

$connection = new mysqli('localhost', $user, $pass, $db) or die('Unable to connect');
