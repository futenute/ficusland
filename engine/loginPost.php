<?php
session_start();
include "../config.php";
$email = $_POST['email'] ? strip_tags($_POST['email']) : "";
$pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";
$login = $_POST['login'] ? strip_tags($_POST['login']) : "";
$salt = "kjlgsjklg755";
$pass = $salt.md5($pass).$salt;

$sql = "select id, role, email from users where login='$login' and pass='$pass'";
$res = mysqli_query($connect, $sql) or die("Error: ".mysqli_error($connect));

if(mysqli_num_rows($res) == 1) {
	header("Location: login.php?auth=true");
	$_SESSION['pass'] = $pass;
	$_SESSION['login'] = $login;
	$data = mysqli_fetch_assoc($res);
	$_SESSION['role'] = $data['role'];
	$_SESSION['email'] = $data['email'];
} else {
	header("Location: login.php?auth=false");
}