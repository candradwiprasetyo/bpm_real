<?php
session_start();
$server = 'localhost';
$username = 'root';
$password = '4DM1nWeB';
$database = 'bpm';

include 'function.php';
$Mysql = new Mysql();
$Mysql->connect($server, $username, $password, $database);
?>