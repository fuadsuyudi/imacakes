<?php

//SMOF admin panel
require_once ('admin/index.php');

//register my menus
function register_my_menus() {
  register_nav_menu( 'left-menu', __( 'Left Menu', 'sweetcake' ) );
  register_nav_menu( 'right-menu', __( 'Right Menu', 'sweetcake' ) );  
}
add_action( 'init', 'register_my_menus' );

//Thumbnails
if(function_exists('add_theme_support')){
	add_theme_support('post-thumbnails');
	add_image_size( 'portfolio-thumbnail', 278, 183, true);
	add_image_size( 'archive-image', 738, 0);
}

//Content_width
if (!isset($content_width)) $content_width = 738;

//automatic-feed-links
add_theme_support( 'automatic-feed-links' );

//edit excerpt_more
function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//enable shortcode in the field excerpt
add_filter('the_excerpt', 'do_shortcode');

// Sidebar
if (function_exists('register_sidebar'))
{
	// Sidebar Principale
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}


//Custom post services
function register_post_type_services() 
{  
	$labels = array(
		'name' => _x('Services', 'post type general name', 'sweetcake' ),
		'singular_name' => __('Service', 'post type singular name'),
		'add_new' => __('Add New ' . 'service'),
		'add_new_item' => __('Add New Service', 'sweetcake'),
		'edit_item' => __('Edit Service', 'sweetcake' ),
		'new_item' => __('New Service', 'sweetcake' ),
		'all_items' => __('All Services', 'sweetcake' ),
		'view_item' => __('View Service', 'sweetcake' ),
		'search_items' => __('Search Service', 'sweetcake' ),
		'not_found' =>  __('No Services found', 'sweetcake' ),
		'not_found_in_trash' => __('No services items found in Trash', 'sweetcake' ), 
		'parent_item_colon' => '',
		'menu_name' => __("Services", 'sweetcake' )
	);
	$args = array(  
		"labels" => $labels, 
		"public" => true,  
		"show_ui" => true,  
		"capability_type" => "post",  
		"menu_position" => 40,
		"hierarchical" => false,  
		"rewrite" => true,
		"menu_icon" => get_template_directory_uri() . '/img/admin-icons/services.png',  
		"supports" => array("title", "editor", "thumbnail")  
	);
	register_post_type("services", $args);  

}  
add_action("init", "register_post_type_services"); 

function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}

//Custom post testimonials
function register_post_type_testimonials() 
{  
	$labels = array(
		'name' => _x('Testimonials', 'post type general name', 'sweetcake' ),
		'singular_name' => __('Testimonial', 'post type singular name'),
		'add_new' => __('Add New ' . 'testimonial'),
		'add_new_item' => __('Add New Testimonial', 'sweetcake' ),
		'edit_item' => __('Edit Testimonial', 'sweetcake' ),
		'new_item' => __('New Testimonial', 'sweetcake' ),
		'all_items' => __('All Testimonials', 'sweetcake' ),
		'view_item' => __('View Testimonial', 'sweetcake' ),
		'search_items' => __('Search Testimonial', 'sweetcake' ),
		'not_found' =>  __('No Testimonials found', 'sweetcake' ),
		'not_found_in_trash' => __('No Testimonials found in Trash', 'sweetcake' ), 
		'parent_item_colon' => '',
		'menu_name' => __("Testimonials", 'sweetcake' )
	);
	$args = array(  
		"labels" => $labels, 
		"public" => true,  
		"show_ui" => true,  
		"capability_type" => "post",  
		"menu_position" => 41,
		"hierarchical" => false,  
		"rewrite" => true,
		"menu_icon" => get_template_directory_uri() . '/img/admin-icons/testimonials.png',  
		"supports" => array("title", "editor")  
	);
	register_post_type("testimonials", $args);  

}  
add_action("init", "register_post_type_testimonials");


//Custom post prices
function register_post_type_prices() 
{  
	$labels = array(
		'name' => _x('Prices', 'post type general name', 'sweetcake' ),
		'singular_name' => __('Price', 'post type singular name'),
		'add_new' => __('Add New ' . 'price'),
		'add_new_item' => __('Add New Price', 'sweetcake' ),
		'edit_item' => __('Edit Price', 'sweetcake' ),
		'new_item' => __('New Price', 'sweetcake' ),
		'all_items' => __('All Prices', 'sweetcake' ),
		'view_item' => __('View Price', 'sweetcake' ),
		'search_items' => __('Search Price', 'sweetcake' ),
		'not_found' =>  __('No Prices found', 'sweetcake' ),
		'not_found_in_trash' => __('No prices items found in Trash', 'sweetcake' ), 
		'parent_item_colon' => '',
		'menu_name' => __("Prices", 'sweetcake' )
	);
	$args = array(  
		"labels" => $labels, 
		"public" => true,  
		"show_ui" => true,  
		"capability_type" => "post",  
		"menu_position" => 42,
		"hierarchical" => false,  
		"rewrite" => true, 
		"menu_icon" => get_template_directory_uri() . '/img/admin-icons/prices.png', 
		"supports" => array("title", "editor", "thumbnail")  
	);
	register_post_type("prices", $args);  

}  
add_action("init", "register_post_type_prices");


//Custom post team
function register_post_type_team() 
{  
	$labels = array(
		'name' => _x('Team', 'post type general name', 'sweetcake' ),
		'singular_name' => __('Team', 'post type singular name'),
		'add_new' => __('Add New ' . 'person'),
		'add_new_item' => __('Add New Person', 'sweetcake' ),
		'edit_item' => __('Edit Person', 'sweetcake' ),
		'new_item' => __('New Person', 'sweetcake' ),
		'all_items' => __('All People', 'sweetcake' ),
		'view_item' => __('View Person', 'sweetcake' ),
		'search_items' => __('Search Person', 'sweetcake' ),
		'not_found' =>  __('No People found', 'sweetcake' ),
		'not_found_in_trash' => __('No people items found in Trash', 'sweetcake' ), 
		'parent_item_colon' => '',
		'menu_name' => __("Team", 'sweetcake' )
	);
	$args = array(  
		"labels" => $labels, 
		"public" => true,  
		"show_ui" => true,  
		"capability_type" => "post",  
		"menu_position" => 43,
		"hierarchical" => false,  
		"rewrite" => true, 
		"menu_icon" => get_template_directory_uri() . '/img/admin-icons/team.png', 
		"supports" => array("title", "editor", "thumbnail")  
	);
	register_post_type("team", $args);  

}  
add_action("init", "register_post_type_team");


//Custom post skills
function register_post_type_skills() 
{  
	$labels = array(
		'name' => _x('Skills', 'post type general name', 'sweetcake' ),
		'singular_name' => __('Skill', 'post type singular name'),
		'add_new' => __('Add New ' . 'skill'),
		'add_new_item' => __('Add New Skill', 'sweetcake' ),
		'edit_item' => __('Edit Skill', 'sweetcake' ),
		'new_item' => __('New Skill', 'sweetcake' ),
		'all_items' => __('All Skills', 'sweetcake' ),
		'view_item' => __('View Skill', 'sweetcake' ),
		'search_items' => __('Search Skill', 'sweetcake' ),
		'not_found' =>  __('No Skills found', 'sweetcake' ),
		'not_found_in_trash' => __('No skills items found in Trash', 'sweetcake' ), 
		'parent_item_colon' => '',
		'menu_name' => __("Skills", 'sweetcake' )
	);
	$args = array(  
		"labels" => $labels, 
		"public" => true,  
		"show_ui" => true,  
		"capability_type" => "post",  
		"menu_position" => 44,
		"hierarchical" => false,  
		"rewrite" => true,
		"menu_icon" => get_template_directory_uri() . '/img/admin-icons/skills.png',  
		"supports" => array("title", "editor", "thumbnail")  
	);
	register_post_type("skills", $args);  

}  
add_action("init", "register_post_type_skills");


//Custom post social
function register_post_type_social() 
{  
	$labels = array(
		'name' => _x('Social', 'post type general name', 'sweetcake' ),
		'singular_name' => __('Social', 'post type singular name'),
		'add_new' => __('Add New ' . 'social'),
		'add_new_item' => __('Add New Social', 'sweetcake' ),
		'edit_item' => __('Edit Social', 'sweetcake' ),
		'new_item' => __('New Social', 'sweetcake' ),
		'all_items' => __('All Social', 'sweetcake' ),
		'view_item' => __('View Social', 'sweetcake' ),
		'search_items' => __('Search Social', 'sweetcake' ),
		'not_found' =>  __('No Social found', 'sweetcake' ),
		'not_found_in_trash' => __('No social items found in Trash', 'sweetcake' ), 
		'parent_item_colon' => '',
		'menu_name' => __("Social", 'sweetcake' )
	);
	$args = array(  
		"labels" => $labels, 
		"public" => true,  
		"show_ui" => true,  
		"capability_type" => "post",  
		"menu_position" => 45,
		"hierarchical" => false,  
		"rewrite" => true,
		"menu_icon" => get_template_directory_uri() . '/img/admin-icons/social.png',  
		"supports" => array("title", "editor", "thumbnail")  
	);
	register_post_type("social", $args);  

}  
add_action("init", "register_post_type_social"); 


//Taxonomy portfolio
function taxonomy_portfolio() {
    register_taxonomy(
        'portfolio',
        'post',
        array(
            'label'=>__('Portfolio Categories'),
            'rewrite'=>array('slug'=>'portfolio'),
            'hierarchical'=>true
        )
    );
}
add_action('init', 'taxonomy_portfolio');

//add taxonomy to media section
function add_taxonomy_portfolio(){
    register_taxonomy_for_object_type('portfolio', 'attachment');
}
add_action('init', 'add_taxonomy_portfolio');


//add css and js
function theme_enqueue_scripts()
{
	
	if ( is_page_template('template-home.php')) : 
	
	//js
	wp_enqueue_script("jquery-min", get_template_directory_uri() . "/js/jquery.min.js", array(), false, false);
	wp_enqueue_script("google-api", "https://maps.googleapis.com/maps/api/js?sensor=true", array(), false, false);
	wp_enqueue_script("isotope", get_template_directory_uri() . "/js/jquery.isotope.min.js", array(), false, true);
	wp_enqueue_script("prettyphoto", get_template_directory_uri() . "/js/jquery.prettyPhoto.js", array(), false, true);
	wp_enqueue_script("scroolto", get_template_directory_uri() . "/js/scroolto.js", array(), false, true);
	wp_enqueue_script("settings", get_template_directory_uri() . "/js/settings.js", array(), false, true);
	wp_enqueue_script("inview", get_template_directory_uri() . "/js/jquery.inview.min.js", array(), false, true);
	
    endif;

	//comment-reply
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
	//css
    wp_enqueue_style("style", get_template_directory_uri() . "/style.css");
}
add_action("wp_enqueue_scripts", "theme_enqueue_scripts");


//css inline
function add_theme_options_style() { 

	global $data;

?>

	<style type="text/css">
	
		/*start general*/
		h1,h2,#navigationmenu,.numberbar,.btn a,.btnmore a,.archivenextpage a, .archivepreviouspage a,.comment-form input[type="submit"],.postcontent h1, .postcontent h2, .postcontent h3, .postcontent h4, .postcontent h5, .postcontent h6, .commentlist h1, .commentlist h2, .commentlist h3, .commentlist h4, .commentlist h5, .commentlist h6,.postcontent input[type="submit"]{font-family:<?php if($data['google_font_title'] == "none"): ?>'lobster_1.3regular'<?php else: ?><?php echo $data['google_font_title']; ?><?php endif; ?>;}

		p,.caption,#filters li,.widget,.widget ul,#wp-calendar,#searchform input[type="text"],.post, .grid_8 .page, .grid_8 .type-attachment,.commentlist,.comment-form input[type="text"], textarea,.postcontent input[type="password"]{font-family:<?php if($data['google_font_body'] == 'none'): ?>'oswaldlight'<?php else: ?><?php echo $data['google_font_body']; ?><?php endif; ?>;}
		/*end general*/

		/*start header*/
		#navigationmenu{background-image:url(<?php if($data['bg_header']): ?><?php echo $data['bg_header']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/grey-bg.png<?php endif; ?>);} /*pattern*/
		
		nav a{color:<?php if($data['title_header_color']): ?><?php echo $data['title_header_color']; ?><?php else: ?>#7d7d7d<?php endif; ?>;}
		nav a:hover{color:<?php if($data['title_hover_header_color']): ?><?php echo $data['title_hover_header_color']; ?><?php else: ?>#bbbbbb<?php endif; ?>;}
		nav ul li{border-bottom: 1px dashed <?php if($data['navigation_header_border']): ?><?php echo $data['navigation_header_border']; ?><?php else: ?>#D6D5D5<?php endif; ?>;}
		nav ul li{border-top: 1px dashed <?php if($data['navigation_header_border']): ?><?php echo $data['navigation_header_border']; ?><?php else: ?>#D6D5D5<?php endif; ?>;}
		#navigationmenu{text-shadow: 2px 2px 0 <?php if($data['title_header_shadow_color']): ?><?php echo $data['title_header_shadow_color']; ?><?php else: ?>#dfdfdf<?php endif; ?>;}
		/*end header*/
		
		/*start slide*/
		<?php if ($data['waves_slider'] == 1): ?>
		.topwavesslide{background-image:url(<?php if($data['topwaves_slider']): ?><?php echo $data['topwaves_slider']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/topwaves.png<?php endif; ?>);}
		.bottomwavesslide{background-image:url(<?php if($data['bottomwaves_slider']): ?><?php echo $data['bottomwaves_slider']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/bottomwaves.png<?php endif; ?>);}	
		<?php endif; ?>
		/*end slide*/
		
		/*start services*/
		#services .titlesection{background-image:url(<?php if($data['divider_services']): ?><?php echo $data['divider_services']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/divider/services.png<?php endif; ?>);} /*divider*/
		#services{background-image:url(<?php if($data['bg_services']): ?><?php echo $data['bg_services']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/grey-bg.png<?php endif; ?>);} /*pattern*/
		
		#services .titlesection h1, #services .titlesection h1 a{color:<?php if($data['title_services_color']): ?><?php echo $data['title_services_color']; ?><?php else: ?>#7d7d7d<?php endif; ?>;}
		#services .titlesection h1, #services .titlesection h1 a{text-shadow: 3px 3px 0 <?php if($data['title_services_shadow_color']): ?><?php echo $data['title_services_shadow_color']; ?><?php else: ?>#DFDFDF<?php endif; ?>;}
		/*end services*/
		
		/*start blog*/
		#sectionarchive{background-image:url(<?php if($data['bg_blog']): ?><?php echo $data['bg_blog']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/grey-bg.png<?php endif; ?>);} /*pattern*/
		@media only screen and (min-width: 320px) and (max-width: 479px){.demo-blog img{ width:<?php echo $data['ribbon_img_mobile_blog']; ?>px ;} }
		/*end blog*/
		
		/*start copyright*/
		.sectioncopyright{background-color:<?php if($data['background_copyright']): ?><?php echo $data['background_copyright']; ?><?php else: ?>#fafcfc<?php endif; ?>;}
		.sectioncopyright p{color:<?php if($data['colortext_copyright']): ?><?php echo $data['colortext_copyright']; ?><?php else: ?>#92bab4<?php endif; ?>;}
		/*end copyright*
		
		/*start testimonials*/
		<?php if ($data['filter_testimonials'] == 1): ?>#darkfilter{background-image:url(<?php echo get_template_directory_uri(); ?>/img/section-testimonials/darkfilter.png);}<?php endif; ?> /*dark filter*/
		#testimonials{background-image:url(<?php if($data['bg_testimonials']): ?><?php echo $data['bg_testimonials']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/pink-bg.png<?php endif; ?>);} /*pattern*/
		/*end testimonials*/
		
		/*start portfolio*/
		#sectionportfolio .titlesection{background-image:url(<?php if($data['divider_portfolio']): ?><?php echo $data['divider_portfolio']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/divider/portfolio.png<?php endif; ?>);} /*divider*/
		#sectionportfolio{background-image:url(<?php if($data['bg_portfolio']): ?><?php echo $data['bg_portfolio']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/grey-bg.png<?php endif; ?>);} /*pattern*/
		
		#sectionportfolio .titlesection h1, #sectionportfolio .titlesection h1 a{color:<?php if($data['title_portfolio_color']): ?><?php echo $data['title_portfolio_color']; ?><?php else: ?>#7d7d7d<?php endif; ?>;}
		#sectionportfolio .titlesection h1, #sectionportfolio .titlesection h1 a{text-shadow: 3px 3px 0 <?php if($data['title_portfolio_shadow_color']): ?><?php echo $data['title_portfolio_shadow_color']; ?><?php else: ?>#DFDFDF<?php endif; ?>;}
		/*end portfolio*/
		
		/*start prices*/
		#sectionprices .titlesection{background-image:url(<?php if($data['divider_prices']): ?><?php echo $data['divider_prices']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/divider/prices.png<?php endif; ?>);} /*divider*/
		#sectionprices{background-image:url(<?php if($data['bg_prices']): ?><?php echo $data['bg_prices']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/green-bg.png<?php endif; ?>);} /*pattern*/
		
		#sectionprices .titlesection h1, #sectionprices .titlesection h1 a{color:<?php if($data['title_prices_color']): ?><?php echo $data['title_prices_color']; ?><?php else: ?>#fff<?php endif; ?>;}
		#sectionprices .titlesection h1, #sectionprices .titlesection h1 a{text-shadow: 3px 3px 0 <?php if($data['title_prices_shadow_color']): ?><?php echo $data['title_prices_shadow_color']; ?><?php else: ?>#6FB0A7<?php endif; ?>;}
		/*end prices*/
		
		/*start team*/
		#sectionteam .titlesection{background-image:url(<?php if($data['divider_team']): ?><?php echo $data['divider_team']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/divider/team.png<?php endif; ?>);} /*divider*/
		#sectionteam{background-image:url(<?php if($data['bg_team']): ?><?php echo $data['bg_team']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/grey-bg.png<?php endif; ?>);} /*pattern*/
		
		#sectionteam .titlesection h1, #sectionteam .titlesection h1 a{color:<?php if($data['title_team_color']): ?><?php echo $data['title_team_color']; ?><?php else: ?>#7d7d7d<?php endif; ?>;}
		#sectionteam .titlesection h1, #sectionteam .titlesection h1 a{text-shadow: 3px 3px 0 <?php if($data['title_team_shadow_color']): ?><?php echo $data['title_team_shadow_color']; ?><?php else: ?>#DFDFDF<?php endif; ?>;}
		/*end team*/
		
		/*start skills*/
		#sectionskills .titlesection{background-image:url(<?php if($data['divider_skills']): ?><?php echo $data['divider_skills']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/divider/skills.png<?php endif; ?>);} /*divider*/
		#sectionskills{background-image:url(<?php if($data['bg_skills']): ?><?php echo $data['bg_skills']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/pink-bg.png<?php endif; ?>);} /*pattern*/
		
		#sectionskills .titlesection h1, #sectionskills .titlesection h1 a{color:<?php if($data['title_skills_color']): ?><?php echo $data['title_skills_color']; ?><?php else: ?>#fff<?php endif; ?>;}
		#sectionskills .titlesection h1, #sectionskills .titlesection h1 a{text-shadow: 3px 3px 0 <?php if($data['title_skills_shadow_color']): ?><?php echo $data['title_skills_shadow_color']; ?><?php else: ?>#BE7387<?php endif; ?>;}
		/*end skills*/
		
		/*start social*/
		#oursocial .titlesection{background-image:url(<?php if($data['divider_social']): ?><?php echo $data['divider_social']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/divider/oursocial.png<?php endif; ?>);} /*divider*/
		#oursocial{background-image:url(<?php if($data['bg_social']): ?><?php echo $data['bg_social']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/grey-bg.png<?php endif; ?>);} /*pattern*/
		
		#oursocial .titlesection h1, #oursocial .titlesection h1 a{color:<?php if($data['title_social_color']): ?><?php echo $data['title_social_color']; ?><?php else: ?>#7d7d7d<?php endif; ?>;}
		#oursocial .titlesection h1, #oursocial .titlesection h1 a{text-shadow: 3px 3px 0 <?php if($data['title_social_shadow_color']): ?><?php echo $data['title_social_shadow_color']; ?><?php else: ?>#DFDFDF<?php endif; ?>;}
		/*end social*/
		
		/*start contacts*/
		<?php if ($data['waves_contacts'] == 1): ?>
		.topwavescontacts{background-image:url(<?php if($data['topwaves_contacts']): ?><?php echo $data['topwaves_contacts']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/patterns/topwaves.png<?php endif; ?>);}	
		<?php endif; ?>
		/*end contacts*/
		
    </style>
	

<?php
}
add_action('wp_head', 'add_theme_options_style');

// Shortcodes
require_once('include/shortcodes.php');

// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '&rarr;' : '&larr;';
		$next_arrow = is_rtl() ? '&larr;' : '&rarr;';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}

?>
