<?php if($_GET['email']=='exist'): ?>
	<h1>Пользователь с таким email уже зарегистрирован.</h1>
<?php endif; ?>

<?php if($_GET['input']=='empty'): ?>
	<h1>Все поля должны быть заполнены.</h1>
<?php endif; ?>


<h1>Регистрация</h1>
<form action="../engine/registrationPost.php" method="post">
	<p>Ваш логин</p>
	<input type="text" name="login">
	<p>Ваш email</p>
	<input type="text" name="email">
	<p>Ваш пароль</p>
	<input type="password" name="pass">
	<br><br>
	<input type="submit" value="Подтвердить">
</form>