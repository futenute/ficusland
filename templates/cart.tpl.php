<h1>Корзина</h1>
<div class="goods-in-cart">
	<?php foreach ($dataCart as $cartArr): ?>
		<div class="good-in-cart"> 
			<img class="good-in-cart-small-img" src="<?= $cartArr['small_img'] ?>">
			<h3><?= $cartArr['name'] ?></h3>
			<span><?= $cartArr['price'] ?> &#x20bd</span>
			<span><?= $cartArr['count'] ?> шт.</span>
			<a class="del-btn" href="../engine/deleteFromCart.php?id=<?=$cartArr['id']?>" onclick="alert('Товар удален')">Удалить</a>
		</div>
	<?php endforeach; ?>
</div>
<div class="cart-sum">
	<?php if($dataCart): ?>
		<p class="cart-items-count">Товаров в корзине: <?= $goodsCount ?></p>
		<p class="cart-items-count">Общая стоимость: <?= $totalPrice ?> &#x20bd</p>
	<?php else: ?>
		<p class="cart-items-count">Корзина пуста</p>
	<?php endif; ?>
</div>

<?php if($dataCart): ?>
<div class="cart-buy">
	<?php if($userLogin && $userPass): ?>
		<p class="cart-items-count">
			<a class="buy-btn" href="order.php">Оформить заказ</a>
		</p>
		
	<?php else: ?>
		<p class="cart-items-count">Чтобы оформить заказ, <a class="cart-login-link" href="login.php">войдите</a> или <a class="cart-login-link" href="registration.php">зарегистрируйтесь</a>.</p>
	<?php endif; ?>
</div>
<?php endif; ?>