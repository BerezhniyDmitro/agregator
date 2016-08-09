/**
* функция isValidate принимает на вход обьект и массив
* регулярных выражений  в ходе работы функция проходит по
* свойствам обьекта и сопоставляет равно ли значение свойства регулярному
* выражению или нет
**/
(function($) {
	function isValidate(object, array, e) {
		var i = 0;

		$.each(object, function(i) {
			if (!$(this).val().search(array[i]) == 0) {
				$(this).css("borderColor","red");
				e.preventDefault();
				return false;
			} else {
				$(this).css("borderColor","green");
				return true;
			}
		});
	}

	var button = $("form input[type=submit]");

	button.click(function(e) {
		var input = $("form input[type=text]");
		var patternArray = [
			/^[а-яА-ЯёЁa-zA-Z].+$/,
			/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\.(png|jpg|gif)$/,
			/^([0-9]*)(,?)([0-9]{1,2})$/,
			/^[А-ЯЁ][а-яё].{3,40}$/
		]

		if ( isValidate(input, patternArray, e) )
			button.submit;
	});

})( jQuery );
