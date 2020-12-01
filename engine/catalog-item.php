<?php
session_start();
include "../config.php";
include "../templates/blocks/header.php";

$sql = "select * from goods where id={$_GET['id']}";
$res = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($res);
?>

<div class="catalog-item">
	<span class="good-left">
		<h1><?= $data['name'] ?></h1>
		<img class="good-big-img" src="<?= $data['big_img'] ?>"> 
	</span>
			
	<span class="good-right">
		<span><?= $data['long_desc'] ?></span>
		<span><?= $data['price'] ?> &#x20bd</span>
		<a class="buy-btn" href="addtocart.php?id=<?=$data['id']?>" onclick="alert('Товар добавлен в корзину')"">Купить</a>
	</span>
</div>