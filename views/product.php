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
			<a href="/" class="btn"> Вернуться на главную </a>
		</header>
		<main>
			<div class="info">
				<p>Добавление товара</p>
			</div>
			<div class="content">
					<form action="/product" method="Post">
						<!-- <p class="success"></p> -->
						<span>*</span><input type="text" name="title" placeholder="Название товара">
						<span>*</span><input type="text" name="image"  placeholder="Ссылка на фото">
						<p class="info">обязательно в конце рассширение png,jpg,gif</p>
						<span>*</span><input type="text" name="price" placeholder="Цена товара">
						<p class="info">число или целое или в формате 12,5</p>
						<span>*</span><input type="text" name="nameAuthor" placeholder="Имя автора">
						<p class="info">только кириллица от 3 букв</p>
						<input class="btn default" type="submit">
						<p class="info"> Поля помеченные * обязательны к заполнению</p>
					</form>
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
