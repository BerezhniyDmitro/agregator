<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="/templates/css/style.min.css">

</head>
<body>
	<div class="wrapper">
		<header>
			<h1 class="title">Агрегатор отзывов о товаре</h1>
			<a href="/product" class="btn"> Добавить новый товар </a>
		</header>
		<main>
			<div class="info" style="margin-top: 50px">
				<form class="btn-group" method="POST" action="/">
					<button type="submit" name="title" value="ASC">Название от А-Я(Z) </button>	
					<button type="submit" name="title" value="DESC">Название от А-Я(Z) </button>	

					<button type="submit" name="date" value="ASC">По дате от стар к новым </button>	
					<button type="submit" name="date" value="DESC">По дате от Новым к старым </button>

					<button type="submit" name="author" value="ASC">Имя автора от А-Я(Z) </button>	
					<button type="submit" name="author" value="DESC">Имя автора от А-Я(Z) </button>
                                        <!-- по количеству коменнтариев -->
				</form>
			</div>
			<div class="content">
			
				<?php  foreach ($productList as $productItem) :?>
					<div class="item">
						<img src="<?= $productItem['preview_image']; ?>" alt="">
						<table>
							<tr>
								<th>Название: </th>
								<th><a href="product/view/<?= $productItem['id']; ?>"> <?= $productItem['title']; ?></a></th>
							</tr>
							<tr>
								<td>Дата добавления:</td>
								<td><?= $productItem['date']; ?></td>
							</tr>
							<tr>
								<td>Имя автора:</td>
								<td><?= $productItem['name_author']; ?></td>
							</tr>
							<tr>
								<td>Кол-во отзывов:</td>
								<td>2</td>
							</tr>
						</table>
					</div>
				<?php endforeach; ?>

			</div>
		</main>
		<footer>
			<h4 class="title">Агрегатор отзывов о товаре</h4>
		</footer>
	</div>
	<script src="/templates/js/libs.min.js"></script>
	<script src="/templates/js/common.js"></script>
</body>
</html>
