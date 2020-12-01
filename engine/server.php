<?php 
	include "../config.php";

	$sql = "insert into feedbacks (name, text) VALUES('{$_POST["name"]}', '{$_POST["text"]}');";

	mysqli_query($connect, $sql);

	header("Location: feedback.php?sent=1");