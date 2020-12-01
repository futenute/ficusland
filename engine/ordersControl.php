<?php
session_start();

include "../config.php";

$sqlCI = "SELECT client_info.*, users.login, users.email from client_info inner join users on client_info.user_id=users.id";
$resCI = mysqli_query($connect, $sqlCI);

$dataOrder = [];
while($orderArr = mysqli_fetch_assoc($resCI)) {
	$dataOrder[] = $orderArr;
}

for($i=0; $i < count($dataOrder); $i++) {
	$id=$dataOrder[$i]['id'];
	$sql = "SELECT orders.*, goods.name as good_name from orders inner join goods on orders.good_id=goods.id where client_id='$id'";
	$res = mysqli_query($connect, $sql);
	$orders = [];
	while ($orderArr = mysqli_fetch_assoc($res)) {
		$orders[] = $orderArr;
	}
	$dataOrder[$i]['orders'] = $orders;
}

if ($_GET['delete']) {
	$sqlDelOrder = "DELETE from orders where client_id={$_GET['delete']};";
	$sqlDelClient = "DELETE from client_info where id={$_GET['delete']};";
	$resDelOrder = mysqli_query($connect, $sqlDelOrder);
	$resDelClient = mysqli_query($connect, $sqlDelClient);
	if($resDelOrder === false || $resDelClient === false) {
		echo mysqli_error($connect);
		die;
	}
	header("Location: ordersControl.php");
}
include "../templates/blocks/header.php";
include "../templates/ordersControl.tpl.php";