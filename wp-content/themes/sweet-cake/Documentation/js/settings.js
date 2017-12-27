jQuery(function($){

var SWEET = window.SWEET || {};

//Scroll navigation
SWEET.menu = function(){
$("#indice h3 a").click(function(event){

	event.preventDefault();
	var full_url = this.href;
	var parts = full_url.split("#");
	var trgt = parts[1];
	var target_offset = $("#"+trgt).offset();
	var target_top = target_offset.top;

	$('html,body').animate({scrollTop:target_top -0}, 900);
	
});
}
//End Scroll navigation


//init
SWEET.menu();
//end init

});