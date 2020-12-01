<?php if($_GET['success']==1): ?>
	<h2>Спасибо за заказ!</h2>
<?php else: ?>
<h1>Оформление заказа</h1>
	<form action="../engine/orderPost.php" method="post" class="order-form">
		<p>Номер телефона</p>
		<input type="text" name="phone"><br>
		<p>Адрес доставки</p>
		<input type="text" name="address"><br>
		<p>Комментарий к заказу</p>
		<textarea name="comment" cols="61" rows="3"></textarea><br>
		<input type="submit" name="submit" value="Заказать">
	</form>
<?php endif; ?>