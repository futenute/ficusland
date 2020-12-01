<h1>Управление заказами</h1><br>
<?php if($userRole == 1): ?>
	<table>
		<tr>
			<th>№</th>
			<th>Имя</th>
			<th>email</th>
			<th>Телефон</th>
			<th>Товары</th>
			<th>Адрес</th>
			<th>Коммент.</th>
			<th>Сумма</th>
			<th>Завершить</th>
		</tr>
		<?php foreach ($dataOrder as $orderArr): ?>
			<tr>
				<td><?= $orderArr['id'] ?></td>
				<td><?= $orderArr['login'] ?></td>
				<td><?= $orderArr['email'] ?></td>
				<td><?= $orderArr['phone'] ?></td>
				<td> 
					<ul>
						<?php foreach($orderArr['orders'] as $order): ?>
							<li><?= $order['good_name']." - ".$order['count'] ?></li>
						<?php endforeach; ?>
					</ul>
				</td>

				<td><?= $orderArr['address'] ?></td>
				<td><?= $orderArr['comment'] ?></td>
				<td><?= $orderArr['total_price'] ?></td>
				<td><a href="ordersControl.php?delete=<?= $orderArr['id'] ?>">Завершить</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>