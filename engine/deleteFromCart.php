<?php 
	session_start();
	include "../config.php";
	$sessionId = session_id();

	$sql = "delete from cart where id={$_GET['id']} and session_id='$sessionId'";
	$res = mysqli_query($connect, $sql);
	header("Location: cart.php");

 ?>