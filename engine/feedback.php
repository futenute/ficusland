<?php
session_start();
include "../config.php";

$sql = "select * from feedbacks order by date_create desc limit 3";
$res = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Отзывы</title>
</head>
<body>
	<div class="wrapper">

		<?php
        include "../templates/blocks/header.php";
        if ($_GET['sent']==1):?>
			<h3>Ваш отзыв отправлен</h3>
		<?php endif; ?>

		<h1>Отзывы покупателей</h1>

		<div class="feedbacks">
			
			<?php 
				while ($data = mysqli_fetch_assoc($res)):
			?>
			<div class="feedback-item">
				<h3><?= $data['name'] ?></h3>
				<span class="date_create"><?= $data['date_create']?></span>
				<p><?= $data['text'] ?></p>
			</div>

			<?php endwhile; ?>
			
		</div>
		<h3>Оставьте свой отзыв</h3>
		<form action="server.php" method="post" class="feedback-form">
			<input type="text" name="name" placeholder="Ваше имя"><br><br>
			<textarea name="text" cols="80" rows="10" placeholder="Текст отзыва"></textarea><br><br>
			<input type="submit" value="Отправить" name="submit">
		</form>
	</div>
</body>
</html>