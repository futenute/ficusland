<!DOCTYPE html>
<html>
<head>
	<title>Админка</title>
</head>
<body>
	<?php if($userRole == 1): ?>
		<h1>Админка</h1>
		<div class="goodsAdmin">
			<?php while($data = mysqli_fetch_assoc($res)): ?>
				<form action="adminPost.php" method="post" class="form-admin-change" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $data['id']?>">
					<input type="text" name="name" value="<?= $data['name']?>">
					<input type="text" name="price" value="<?= $data['price']?>">
					<span class="admin-change-img">
						<div>
							<p>Маленькое изображение</p>
							<img class="good-small-img" src="<?= $data['small_img'] ?>">
							<input type="file" name="small_img" accept="image/*">
						</div>
						<div>
							<p>Большое изображение</p>
							<img class="good-big-img" src="<?= $data['big_img'] ?>"> 
							<input type="file" name="big_img" accept="image/*">
						</div>
					</span>
					<p>Краткое описание:</p>
					<textarea name="short_desc" cols="50" rows="2"><?= $data['short_desc']?></textarea>
					<p>Полное описание:</p>
					<textarea name="long_desc" cols="50" rows="8"><?= $data['long_desc']?></textarea>
					<input type="submit" name="submit" value="Сохранить">
					<a href="adminPost.php?action=delete&id=<?= $data['id'] ?>"><button type="button">Удалить товар</button></a>
				</form>
			<?php endwhile; ?>
		</div>
		<h2>Добавить новый товар</h2>
		<form action="adminPost.php" method="post" class="form-admin-create" enctype="multipart/form-data">
			<p>Название товара:</p>
			<input type="text" name="name">
			<p>Цена товара:</p>
			<input type="text" name="price">
			<p>Маленькое изображение:</p>
			<input type="file" name="small_img" accept="image/*">
			<p>Большое изображение:</p>
			<input type="file" name="big_img" accept="image/*">
			<p>Краткое описание:</p>
			<textarea name="short_desc" cols="80" rows="2"></textarea>
			<p>Полное описание:</p>
			<textarea name="long_desc" cols="80" rows="8"></textarea>
			<input type="submit" name="submit" value="Добавить">
		</form>
	<?php endif; ?>
</body>
</html>