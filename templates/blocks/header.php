<link rel="stylesheet" type="text/css" href="../public/style.css">

<div class="header-wrap">
	<img class="logo-img" src="../public/img/logo.jpg">
	<ul class="menu">
	    <li class="menu-list"><a href="#" class="menu-link">Главная</a></li>
	    <li class="menu-list"><a href="catalog.php" class="menu-link">Каталог</a></li>
	    <li class="menu-list"><a href="#" class="menu-link">Контакты</a></li>
	    <li class="menu-list"><a href="feedback.php" class="menu-link">Отзывы</a></li>
	    <li class="menu-list"><a href="cart.php" class="menu-link">Корзина</a></li>
	    <?php if($userRole == 1): ?>
	    	<li class="menu-list"><a href="admin.php" class="menu-link">Админка</a></li>
	    	<li class="menu-list"><a href="ordersControl.php" class="menu-link">Заказы</a></li>
	    <?php endif; ?>
	    <?php if($userLogin && $userPass): ?>
	    	<li class="menu-list"><a href="logout.php" class="menu-link">Выйти (<?= $userLogin ?>)</a></li>
	    <?php else: ?>
	    	<li class="menu-list"><a href="login.php" class="menu-link">Войти</a></li>
	    <?php endif; ?>
	</ul>
</div>