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
