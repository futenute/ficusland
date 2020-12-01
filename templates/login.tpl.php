<?php if($_GET['auth']=='true'): ?>
	<h1>Вы успешно авторизовались</h1>
	<?php else: ?>
		<?php if($_GET['auth']=='true'): ?>
			<h1>Неверный email или пароль</h1>
		<?php else: ?>
		<h1>Войти</h1>
	<?php endif; ?>
	<form action="../engine/loginPost.php" method="post">
		<p>Ваш логин</p>
		<input type="text" name="login">
		<p>Ваш пароль</p>
		<input type="password" name="pass">
		<br><br>
		<input type="submit" value="Войти">
	</form>
	<br>
	<a href="registration.php">Регистрация</a>
<?php endif; ?>