<?php

session_start();
include "../config.php";
$login = $_POST['login'] ? strip_tags($_POST['login']) : "";
$email = $_POST['email'] ? strip_tags($_POST['email']) : "";
$pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";
$salt = "kjlgsjklg755";
$pass = $salt.md5($pass).$salt;

if($login && $email && $pass) {
	$sql = "select id from users where email='$email'";
} else {
	header("Location: registration.php?input=empty");
}

$res = mysqli_query($connect, $sql) or die("Error: ".mysqli_error($connect));

if(mysqli_num_rows($res)) {
	header("Location: registration.php?email=exist");
} else {
	$sqlAddUser = "insert into users (login, email, pass, role) values ('$login', '$email', '$pass', 0)";
	$resAddUser = mysqli_query($connect, $sqlAddUser);
	header("Location: login.php");
}