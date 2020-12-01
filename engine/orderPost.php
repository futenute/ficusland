<?php

session_start();
include "../config.php";

$sqlUser = "select id from users where email='$userEmail'";
$resUser = mysqli_query($connect, $sqlUser);
$dataUser = mysqli_fetch_assoc($resUser);
$userId = $dataUser['id'];

$phone = $_POST['phone'] ? strip_tags($_POST['phone']) : "";
$address = $_POST['address'] ? strip_tags($_POST['address']) : "";
$comment = $_POST['comment'] ? strip_tags($_POST['comment']) : "";

$sessionId = session_id();
$sqlOrder = "select good_id, count from cart where session_id='$sessionId'";
$resOrder = mysqli_query($connect, $sqlOrder);

$dataOrder = [];
while($orderArr = mysqli_fetch_assoc($resOrder)) {
	$dataOrder[] = $orderArr;
}

$sqlPrice = "select cart.count, goods.price from cart INNER JOIN goods on cart.good_id=goods.id where session_id='$sessionId'";
$resPrice = mysqli_query($connect, $sqlPrice);
$totalPrice = 0;
while($dataPrice = mysqli_fetch_assoc($resPrice)) {
	$totalPrice += $dataPrice['price'] * $dataPrice['count'];
}

$sqlClient = "insert into client_info(user_id, phone, address, total_price, comment) values('$userId', '$phone', '$address', '$totalPrice', '$comment')";

$resClient = mysqli_query($connect, $sqlClient);
$clientId = mysqli_insert_id($connect);

foreach ($dataOrder as $value) {
	$sqlAddOrder = "insert into orders (client_id, good_id, count) values('$clientId','{$value['good_id']}', '{$value['count']}')";
	$resAddOrder = mysqli_query($connect, $sqlAddOrder);
}

$sqlDel = "delete from cart where session_id='$sessionId'";
$resDel = mysqli_query($connect, $sqlDel);

header("Location: order.php?success=1");