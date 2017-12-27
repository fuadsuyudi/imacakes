jQuery(function($){

var SWEET = window.SWEET || {};


//isotope
SWEET.gallery = function(){
  
  var $container = $('#containerisotope');

  $container.isotope({
	itemSelector : '.element'
  });
  
  
  var $optionSets = $('#options .option-set'),
	  $optionLinks = $optionSets.find('a');

  $optionLinks.click(function(){
	var $this = $(this);
	// don't proceed if already selected
	if ( $this.hasClass('selected') ) {
	  return false;
	}
	var $optionSet = $this.parents('.option-set');
	$optionSet.find('.selected').removeClass('selected');
	$this.addClass('selected');

	// make option object dynamically, i.e. { filter: '.my-filter-class' }
	var options = {},
		key = $optionSet.attr('data-option-key'),
		value = $this.attr('data-option-value');
	// parse 'false' as false boolean
	value = value === 'false' ? false : value;
	options[ key ] = value;
	if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	  // changes in layout modes need extra logic
	  changeLayoutMode( $this, options )
	} else {
	  // otherwise, apply new options
	  $container.isotope( options );
	}
	
	return false;
  });

  
}
//end isotope



//map
SWEET.map = function(){
	
var map;

function initialize() {

  var featureOpts = [
  {
    'featureType': 'landscape.man_made',
    'stylers': [
      { 'color': '#92bab4' }
    ]
  },{
    'featureType': 'road.arterial',
    'elementType': 'geometry.stroke',
    'stylers': [
      { 'color': '#6a6a6a' }
    ]
  },{
    'featureType': 'road.arterial',
    'stylers': [
      { 'color': '#a2c2c3' }
    ]
  },{
    'featureType': 'road.arterial',
    'elementType': 'labels.text.fill',
    'stylers': [
      { 'color': '#ffffff' }
    ]
  },{
    'featureType': 'road.arterial',
    'elementType': 'labels.icon',
    'stylers': [
      { 'color': '#ffffff' }
    ]
  },{
    'featureType': 'road.arterial',
    'elementType': 'geometry.stroke',
    'stylers': [
      { 'color': '#83aaa7' }
    ]
  },{
    'featureType': 'road.local',
    'elementType': 'geometry.stroke',
    'stylers': [
      { 'color': '#82ada7' }
    ]
  }
];

  

  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var styledMapOptions = {
    name: 'Custom Style'
  };

  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}

google.maps.event.addDomListener(window, 'load', initialize);
	
	
	
	
}
//end map



//Scroll navigation
SWEET.menu = function(){
$(".internal-link a, .contanchors a, .backtotop").click(function(event){

	event.preventDefault();
	var full_url = this.href;
	var parts = full_url.split("#");
	var trgt = parts[1];
	var target_offset = $("#"+trgt).offset();
	var target_top = target_offset.top;

	$('html,body').animate({scrollTop:target_top -13}, 900);
	
});
}
//End Scroll navigation



//Pretty Photo
SWEET.prettyphoto = function(){
	$(document).ready(function(){
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
					
			animation_speed:'fast',
			slideshow:10000, 
			hideflash: true,
			autoplay_slideshow: false,
			social_tools:false
			
		});
	});
}
//end Pretty Photo



//Marker Map Effect
SWEET.markereffect = function(){

	$("#littlemarker").click(function() {
		
			$("#bigmarker").removeClass("showbigmarker");
        	$("#bigmarker").addClass("hidebigmarker");
			$("#littlemarker").css('display','none');
			$("#littlemarkerclose").css('display','block');
	});
	
	$("#littlemarkerclose").click(function() {
		
			$("#bigmarker").removeClass("hidebigmarker");
        	$("#bigmarker").addClass("showbigmarker");
			$("#littlemarkerclose").css('display','none');
			$("#littlemarker").css('display','block');
	});
		
}
//end Marker Map Effect

//Get section slide height
SWEET.sectionslideheight = function(){

	$(document).ready(function(){
		
			setInterval(function(){ 
				
				var margintop = $("#sectionslide").height();
		
				$(".bottomwavesslide").css({
				  "margin-top": margintop-15
				});	
				   
			}, 0);
			
	});

}
//Get section slide height


//Start Inview
SWEET.inview = function(){

	$(document).ready(function(){
		
		$('.fade-up').bind('inview', function(event, visible) {
			if (visible == true) {
				$(this).addClass('animated fadeInUp');
			} else {
				$(this).removeClass('animated fadeInUp');
			}
		});
		
		
		$('.fade-down').bind('inview', function(event, visible) {
			if (visible == true) {
				$(this).addClass('animated fadeInDown');
			} else {
				$(this).removeClass('animated fadeInDown');
			}
		});
		
		$('.fade-left').bind('inview', function(event, visible) {
			if (visible == true) {
				$(this).addClass('animated fadeInLeft');
			} else {
				$(this).removeClass('animated fadeInLeft');
			}
		});
		
		$('.fade-right').bind('inview', function(event, visible) {
			if (visible == true) {
				$(this).addClass('animated fadeInRight');
			} else {
				$(this).removeClass('animated fadeInRight');
			}
		});
			
	});

}
//End Inview


//init
SWEET.gallery();
SWEET.map();
SWEET.menu();
SWEET.prettyphoto();
SWEET.markereffect();
SWEET.sectionslideheight();
SWEET.inview();
//end init

});