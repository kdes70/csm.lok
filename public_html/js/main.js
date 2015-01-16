jQuery(document).ready(function($) {
	
// Зависимые списки
// 
// 
	
	if(parseInt($('#groups').val()) == 3 || parseInt($('#groups').val()) == 4)
	{
		$('#prof_select').slideDown(400);
		$('#prof_select').removeClass('hidden');
		$('#profession').attr("disabled", false);
	}
	
	$('#groups').change(function() {
		// Получаем ID выбраной группы
		var groups = parseInt($('#groups').val());

		selectProfession(groups);
		console.log(groups);
	});




	////////
	var row_vacansy = $('.row_vacansy');

	row_vacansy.click(function() {

		var id_row = $(this).attr("id");
		var info_row = "#info_block_"+id_row;


		 $(info_row).slideToggle(500);

		console.log(info_row);
	});
	
	// =================== TESTING ====================== //
//TABS
	$(function(){
		$('#test_data').find('div:first').show();
		$('.tabs a').on('click', function(event) {
			event.preventDefault();
			/* Act on the event */
			if($(this).attr('class') == 'tab-active') return false;

			var link = $(this).attr('href'); //Ссылка на выбраную вкладку
			var prevActive = $('.tabs > a.tab-active').attr('href');// Активная ссылка
			
			$('.tabs > a.tab-active').removeClass('tab-active'); //Удаляем класс активной ссылки
			$(this).addClass('tab-active'); // Добовляем активный класс той по которой кликнули

			//Скрываем/Показываем вопросы
			$(prevActive).fadeOut(100, function() {
				$(link).fadeIn(100);
			});

			console.log($(this).attr('href'));
		});
//BUTTON
	$('.btn').click(function() {
		var test = +$('#test_id').text();
		var res = { 'test':test };

		$('.question').each(function() {
			var id = $(this).data('id');
			res[id] = $('input[name=question-'+id+']:checked').val();
			
		});
		$.ajax({
			url: 'testing',
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: res,
		})
		.done(function(html) {
			console.log("success");
			$('#answ_result').html(html);

		})
		.fail(function() {
			console.log("error");
			alert('Error!');
		})
		.always(function() {
			console.log("complete");
		});
		
		
	});

	});




	// =================== TESTING END ====================== //
	

	//ДОБАВЛЕНИЕ ПОЛЕЙ
var MaxInputs       = 5; //максимальное количство для добавления
var Wrap   = $("#Wrapper"); //родительский элемент полей
var AddButton       = $("#INeedMore"); //Кнопка добавить поле
var x = Wrap.length; //подсчет количества полей
var FieldCount=0; //добавляем каждому полю + 1

$(AddButton).click(function (e)  //функция добавления нового поля
{	//Если есть поля показаваем кнопку сохранения
	$('.butt_save').show();

        if(x <= MaxInputs) //проверяем на максимальное кол-во
        {
            FieldCount++; 
            //добавляем поле
            $(Wrap).append('<p><label for="answ_'+ FieldCount +'">Правильный ответ-'+ FieldCount +'<input type="checkbox" name="correct_answer" id="answ_'+ FieldCount +'" value="'+ FieldCount +'"></label><input type="text" name="answer[]" id="answer_'+ FieldCount +'" value=""/><a href="#" class="removeclass"></a></p>');
            x++; //приращение текстового поля
        }
        
return false;
});
$("body").on("click",".removeclass", function(e){ //удаление поля
        if( x > 1 ) {
                $(this).parent('p').remove(); //удалить блок с полем
                x--; //уменьшаем номер текстового поля
        //если блоков меньше 1 убираем кнопку сохранить
        if(x <= 1){
     		$('.butt_save').hide();
        }

        }

 
return false;
}); 




/*

	$('a#go').click( function(event){ // ловим клик по ссылки с id="go"
		event.preventDefault(); // выключаем стандартную роль элемента

		var id_form = $(this).attr('href').substring(1); // Получаем id вакансии
			
		$.ajax({
			url: 'resume/add_resume',
			type: 'POST',
			dataType: 'json',
			data: {id_type: id_form},
			
		})
		.done(function(form_view) {
			console.log("success");

			var res = JSON.parse(form_view);
			console.log(res.id_type);
			alert(res.id_type);

		})
		.fail(function() {

			console.log("error");

		})
		.always(function() {
			console.log("complete");
			$('.ajax_loader').show(400);
		});
		


		console.log(id_form);

		$('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
		 	function(){ // после выполнения предъидущей анимации
				$('#modal_form') 
					.css('display', 'block') // убираем у модального окна display: none;
					.animate({opacity: 1, top: '40%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
		});
	});*/
	/* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
	/*$('#modal_close, #overlay').click( function(){ // ловим клик по крестику или подложке
		$('#modal_form')
			.animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
				function(){ // после анимации
					$(this).css('display', 'none'); // делаем ему display: none;
					$('#overlay').fadeOut(400); // скрываем подложку
				}
			);
	});
*/


});
//
// Функция вкл\выкл показа выпадающего списка с професиями
// на вход ID группы ! - требует модификации - !
function selectProfession (groups) {
	
	var profession = $('#profession');

	$('#prof_select').slideUp(400);
	if(groups == 0)
	{	
		profession.attr("disabled", true);
	}
	if(groups == 3 || groups == 4)
	{	
		$('#prof_select').slideDown(400);
		$('#prof_select').removeClass('hidden');
		profession.attr("disabled", false);
	}

	
}
