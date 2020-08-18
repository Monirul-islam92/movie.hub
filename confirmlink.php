<?php
session_start();

// initializing variables
$servername = "localhost";
$dbusername = "root";
$password = "dgbhs2008";
$dbname = "mydatabase";
$errors = array();

// connect to the database
$db = mysqli_connect($servername, $dbusername, $password, $dbname);
if (isset($_POST['user'])) {
	$user = $_POST['user'];
	$query = "UPDATE `users` set `is_verified`=1 WHERE `username`='$user'";
	mysqli_query($db, $query);
}
