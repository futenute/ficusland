<?php 
session_start();

include "../config.php";
include "../templates/blocks/header.php";


$sqlGoods = "select * from goods";
$resGoods = mysqli_query($connect, $sqlGoods);
if ($resGood === false) {
  echo mysqli_error($connect);
}
$data = mysqli_fetch_assoc($resGoods);
if ($data === false) {
  echo mysqli_error($connect);
}

$sessionId = session_id();

$sqlCart = "select cart.id, cart.count, goods.name as name, goods.price as price, goods.small_img as small_img from goods inner join cart on cart.good_id=goods.id where session_id='$sessionId'";
$resCart = mysqli_query($connect, $sqlCart);

$dataCart = [];
while($cartArr = mysqli_fetch_assoc($resCart)) {
	$dataCart[] = $cartArr;
	$goodsCount += $cartArr['count'];
	$totalPrice += $cartArr['price'] * $cartArr['count'];
};
include "../templates/cart.tpl.php";
?>