<?php
session_start();
include "../config.php";
include "../templates/blocks/header.php";

$sql = "select * from goods";
$res = mysqli_query($connect, $sql);
?>
<h1>Каталог</h1>
<div class="goods">
	<?php while($data = mysqli_fetch_assoc($res)): ?>
		<div class="good"> 
			<span class="good-left">
				<a href="catalog-item.php?id=<?=$data['id']?>"><h3><?= $data['name'] ?></h3></a>
				<a href="catalog-item.php?id=<?=$data['id']?>">
					<img class="good-small-img" src="<?= $data['small_img'] ?>"> 
				</a>
				
			</span>
			
			<span class="good-right">
				<span><?= $data['short_desc'] ?></span>
				<span><?= $data['price'] ?> &#x20bd</span>
				<a class="buy-btn" href="addtocart.php?id=<?=$data['id']?>" onclick="alert('Товар добавлен в корзину')">Купить</a>
			</span>
			
		</div>
	<?php endwhile; ?>
</div>