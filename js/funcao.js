
$(function(){
	$('nav.mobile').click(function(){
		var listaMenu = $('nav.mobile ul')
		listaMenu.toggle()
	})
})

$(function(){
	var fechou = 0;
	$('.icone i').click(function(){
		var listaMenu2 = $('.sidebar')
		listaMenu2.toggle()
		//$('.in').css('display','block');
		//$('.out').css('display','none');


	})

})