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
				<p>Страница отзывов про товары </p>
			</div>
			<div class="content">
				<div class="review">
					<h2><?= $productItem['title']; ?></h2><span>Оценка <strong><?= $avg; ?></strong></span>
					<img src="<?= $productItem['preview_image']; ?>" alt="" class="reviewImg">

					<?php  foreach ($commentList as $commentItem) :?>
						<div class="comment">
							<h3 class="name"><?= $commentItem['name_author']; ?> <span class="value">Оценка: <?= $commentItem['value']; ?></span></h3>
							<p class="text"><?= $commentItem['comment']; ?></p>
							<p class="date"><?= $commentItem['date']; ?></p>
						</div>
					<?php endforeach; ?>

						<!-- <div class="comment">
							<h3 class="name">Иннокентий <span class="value">Оценка: 7.4</span></h3>
							<p class="text">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Вопрос рот, лучше ему буквоград щеке языкового своих жизни но свое там эта переулка пустился пунктуация снова реторический рукописи. Инициал! 	Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Ее переписывается, маленькая, наш запятых пустился lorem путь большой? Единственное все залетают о рыбными текстов гор, прямо скатился однажды подзаголовок.</p>
							<p class="date">06.08.2016</p>
						</div>

						<div class="comment">
							<h3 class="name">Дмитрий <span class="value">Оценка: 8.4</span></h3>
							<p class="text">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Ее переписывается, маленькая, наш запятых пустился lorem путь большой? Единственное все залетают о рыбными текстов гор, прямо скатился однажды подзаголовок.</p>
							<p class="date">06.08.2016</p>
						</div>

						<div class="comment">
							<h3 class="name">Иннокентий <span class="value">Оценка: 7.4</span></h3>
							<p class="text">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Вопрос рот, лучше ему буквоград щеке языкового своих жизни но свое там эта переулка пустился пунктуация снова реторический рукописи. Инициал! 	Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Ее переписывается, маленькая, наш запятых пустился lorem путь большой? Единственное все залетают о рыбными текстов гор, прямо скатился однажды подзаголовок.</p>
							<p class="date">06.08.2016</p>
						</div> -->

					<form action="/comment" method="post">
						<span>*</span><input type="text" name="author" placeholder="Ваше имя" required="">
						<span>*</span><input type="number" name="value"  placeholder="Ваша оценка" required="" min="1" max="10" step="1">
						<span>*</span><textarea name="review" rows="8" cols="40" placeholder="Ваш отзыв" required=""></textarea>
						<input class="btn default" type="submit" value="Добавить комментарий">
						<p class="info"> Поля помеченные * обязательны к заполнению</p>
						<input type="hidden" name="id" value="<?= $id; ?>">
					</form>
				</div>
			</div>
		</main>
		<footer>
			<h4 class="title">Агрегатор отзывов о товаре</h4>
		</footer>
	</div>
	<script src="/templates/js/libs.min.js"></script>
	<script src="/templates/js/common.js"></script>
	<script>
		/* функция обработки поля имени ,
		для других полей не пишу так как есть для этого html 5
		*/
		(function($) {
			var Author = $("form input[name=Author]");
			var btn = $("form input[type=submit]");

			btn.click(function() {
					var message = Author.val();
					var pattern = /^[А-ЯЁ][а-яё].+{3,40}$/;

					if ( message.search(pattern) == 0 ) {
						$(this).submit;
					} else {
						Author.after("<p class=erorr> Введенное имя должно быть не короче 4 букв и написано кириллицей <p>");
						return false;
					}
				});
			})( jQuery );
	</script>
</body>
</html>
