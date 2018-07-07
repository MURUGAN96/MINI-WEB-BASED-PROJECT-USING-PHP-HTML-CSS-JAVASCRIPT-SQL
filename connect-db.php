<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'test';
$mysqli = new mysqli($server, $user, $pass, $db);
mysqli_report(MYSQLI_REPORT_ERROR);
?>