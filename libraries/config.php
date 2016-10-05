<?php
session_start();
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bpm_new';

include 'function.php';
$Mysql = new Mysql();
$Mysql->connect($server, $username, $password, $database);
?>