<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five");
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//select options
		$select_services_number = array("1","2","3","4","5","6","7","8","9");
		$select_number = array("1","2","3","4","5","6","7","8","9","10","11","12");
		$select_social_number = array("1","2","3","4","5","6","7","8","9","10","11","12");
		$select_zoom_map = array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$select_section = array("#navigationmenu","#sectionslide","#services","#testimonials","#sectionportfolio","#sectionprices","#sectionteam","#sectionskills","#oursocial","#contacts");
		$select_grid = array("grid_1","grid_2","grid_3","grid_4","grid_5","grid_6","grid_7","grid_8","grid_9","grid_10","grid_11","grid_12");
		$select_animations = array("fade-up","fade-down","fade-left","fade-right");
		
		//navigation builder
		$of_options_navigation_builder = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"menu_left"		=> "Menu Left",
				"logo"		=> "Logo",
				"menu_right"	=> "Menu Right",
			),
		);
		
		//Homepage builder
		$of_options_homepage_builder = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"services"		=> "Services",
				"testimonials"		=> "Testimonials",
				"portfolio"	=> "Portfolio",
				"prices"	=> "Prices",
				"team"	=> "Team",
				"skills"	=> "Skills",
				"social"	=> "Social",
			),
		);
		
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post");


		//google fonts
		$google_fonts = array(
			"none" => "none",
			"ABeeZee" => "ABeeZee",
			"Abel" => "Abel",
			"Abril Fatface" => "Abril Fatface",
			"Aclonica" => "Aclonica",
			"Acme" => "Acme",
			"Actor" => "Actor",
			"Adamina" => "Adamina",
			"Advent Pro" => "Advent Pro",
			"Aguafina Script" => "Aguafina Script",
			"Akronim" => "Akronim",
			"Aladin" => "Aladin",
			"Aldrich" => "Aldrich",
			"Alegreya" => "Alegreya",
			"Alegreya SC" => "Alegreya SC",
			"Alex Brush" => "Alex Brush",
			"Alfa Slab One" => "Alfa Slab One",
			"Alice" => "Alice",
			"Alike" => "Alike",
			"Alike Angular" => "Alike Angular",
			"Allan" => "Allan",
			"Allerta" => "Allerta",
			"Allerta Stencil" => "Allerta Stencil",
			"Allura" => "Allura",
			"Almendra" => "Almendra",
			"Almendra Display" => "Almendra Display",
			"Almendra SC" => "Almendra SC",
			"Amarante" => "Amarante",
			"Amaranth" => "Amaranth",
			"Amatic SC" => "Amatic SC",
			"Amethysta" => "Amethysta",
			"Anaheim" => "Anaheim",
			"Andada" => "Andada",
			"Andika" => "Andika",
			"Angkor" => "Angkor",
			"Annie Use Your Telescope" => "Annie Use Your Telescope",
			"Anonymous Pro" => "Anonymous Pro",
			"Antic" => "Antic",
			"Antic Didone" => "Antic Didone",
			"Antic Slab" => "Antic Slab",
			"Anton" => "Anton",
			"Arapey" => "Arapey",
			"Arbutus" => "Arbutus",
			"Arbutus Slab" => "Arbutus Slab",
			"Architects Daughter" => "Architects Daughter",
			"Archivo Black" => "Archivo Black",
			"Archivo Narrow" => "Archivo Narrow",
			"Arimo" => "Arimo",
			"Arizonia" => "Arizonia",
			"Armata" => "Armata",
			"Artifika" => "Artifika",
			"Arvo" => "Arvo",
			"Asap" => "Asap",
			"Asset" => "Asset",
			"Astloch" => "Astloch",
			"Asul" => "Asul",
			"Atomic Age" => "Atomic Age",
			"Aubrey" => "Aubrey",
			"Audiowide" => "Audiowide",
			"Autour One" => "Autour One",
			"Average" => "Average",
			"Average Sans" => "Average Sans",
			"Averia Gruesa Libre" => "Averia Gruesa Libre",
			"Averia Libre" => "Averia Libre",
			"Averia Sans Libre" => "Averia Sans Libre",
			"Averia Serif Libre" => "Averia Serif Libre",
			"Bad Script" => "Bad Script",
			"Balthazar" => "Balthazar",
			"Bangers" => "Bangers",
			"Basic" => "Basic",
			"Battambang" => "Battambang",
			"Baumans" => "Baumans",
			"Bayon" => "Bayon",
			"Belgrano" => "Belgrano",
			"Belleza" => "Belleza",
			"BenchNine" => "BenchNine",
			"Bentham" => "Bentham",
			"Berkshire Swash" => "Berkshire Swash",
			"Bevan" => "Bevan",
			"Bigelow Rules" => "Bigelow Rules",
			"Bigshot One" => "Bigshot One",
			"Bilbo" => "Bilbo",
			"Bilbo Swash Caps" => "Bilbo Swash Caps",
			"Bitter" => "Bitter",
			"Black Ops One" => "Black Ops One",
			"Bokor" => "Bokor",
			"Bonbon" => "Bonbon",
			"Boogaloo" => "Boogaloo",
			"Bowlby One" => "Bowlby One",
			"Bowlby One SC" => "Bowlby One SC",
			"Brawler" => "Brawler",
			"Bree Serif" => "Bree Serif",
			"Bubblegum Sans" => "Bubblegum Sans",
			"Bubbler One" => "Bubbler One",
			"Buda" => "Buda",
			"Buenard" => "Buenard",
			"Butcherman" => "Butcherman",
			"Butterfly Kids" => "Butterfly Kids",
			"Cabin" => "Cabin",
			"Cabin Condensed" => "Cabin Condensed",
			"Cabin Sketch" => "Cabin Sketch",
			"Caesar Dressing" => "Caesar Dressing",
			"Cagliostro" => "Cagliostro",
			"Calligraffitti" => "Calligraffitti",
			"Cambo" => "Cambo",
			"Candal" => "Candal",
			"Cantarell" => "Cantarell",
			"Cantata One" => "Cantata One",
			"Cantora One" => "Cantora One",
			"Capriola" => "Capriola",
			"Cardo" => "Cardo",
			"Carme" => "Carme",
			"Carrois Gothic" => "Carrois Gothic",
			"Carrois Gothic SC" => "Carrois Gothic SC",
			"Carter One" => "Carter One",
			"Caudex" => "Caudex",
			"Cedarville Cursive" => "Cedarville Cursive",
			"Ceviche One" => "Ceviche One",
			"Changa One" => "Changa One",
			"Chango" => "Chango",
			"Chau Philomene One" => "Chau Philomene One",
			"Chela One" => "Chela One",
			"Chelsea Market" => "Chelsea Market",
			"Chenla" => "Chenla",
			"Cherry Cream Soda" => "Cherry Cream Soda",
			"Cherry Swash" => "Cherry Swash",
			"Chewy" => "Chewy",
			"Chicle" => "Chicle",
			"Chivo" => "Chivo",
			"Cinzel" => "Cinzel",
			"Cinzel Decorative" => "Cinzel Decorative",
			"Clicker Script" => "Clicker Script",
			"Coda" => "Coda",
			"Coda Caption" => "Coda Caption",
			"Codystar" => "Codystar",
			"Combo" => "Combo",
			"Comfortaa" => "Comfortaa",
			"Coming Soon" => "Coming Soon",
			"Concert One" => "Concert One",
			"Condiment" => "Condiment",
			"Content" => "Content",
			"Contrail One" => "Contrail One",
			"Convergence" => "Convergence",
			"Cookie" => "Cookie",
			"Copse" => "Copse",
			"Corben" => "Corben",
			"Courgette" => "Courgette",
			"Cousine" => "Cousine",
			"Coustard" => "Coustard",
			"Covered By Your Grace" => "Covered By Your Grace",
			"Crafty Girls" => "Crafty Girls",
			"Creepster" => "Creepster",
			"Crete Round" => "Crete Round",
			"Crimson Text" => "Crimson Text",
			"Croissant One" => "Croissant One",
			"Crushed" => "Crushed",
			"Cuprum" => "Cuprum",
			"Cutive" => "Cutive",
			"Cutive Mono" => "Cutive Mono",
			"Damion" => "Damion",
			"Dancing Script" => "Dancing Script",
			"Dangrek" => "Dangrek",
			"Dawning of a New Day" => "Dawning of a New Day",
			"Days One" => "Days One",
			"Delius" => "Delius",
			"Delius Swash Caps" => "Delius Swash Caps",
			"Delius Unicase" => "Delius Unicase",
			"Della Respira" => "Della Respira",
			"Denk One" => "Denk One",
			"Devonshire" => "Devonshire",
			"Didact Gothic" => "Didact Gothic",
			"Diplomata" => "Diplomata",
			"Diplomata SC" => "Diplomata SC",
			"Domine" => "Domine",
			"Donegal One" => "Donegal One",
			"Doppio One" => "Doppio One",
			"Dorsa" => "Dorsa",
			"Dosis" => "Dosis",
			"Dr Sugiyama" => "Dr Sugiyama",
			"Droid Sans" => "Droid Sans",
			"Droid Sans Mono" => "Droid Sans Mono",
			"Droid Serif" => "Droid Serif",
			"Duru Sans" => "Duru Sans",
			"Dynalight" => "Dynalight",
			"EB Garamond" => "EB Garamond",
			"Eagle Lake" => "Eagle Lake",
			"Eater" => "Eater",
			"Economica" => "Economica",
			"Electrolize" => "Electrolize",
			"Elsie" => "Elsie",
			"Elsie Swash Caps" => "Elsie Swash Caps",
			"Emblema One" => "Emblema One",
			"Emilys Candy" => "Emilys Candy",
			"Engagement" => "Engagement",
			"Englebert" => "Englebert",
			"Enriqueta" => "Enriqueta",
			"Erica One" => "Erica One",
			"Esteban" => "Esteban",
			"Euphoria Script" => "Euphoria Script",
			"Ewert" => "Ewert",
			"Exo" => "Exo",
			"Expletus Sans" => "Expletus Sans",
			"Fanwood Text" => "Fanwood Text",
			"Fascinate" => "Fascinate",
			"Fascinate Inline" => "Fascinate Inline",
			"Faster One" => "Faster One",
			"Fasthand" => "Fasthand",
			"Federant" => "Federant",
			"Federo" => "Federo",
			"Felipa" => "Felipa",
			"Fenix" => "Fenix",
			"Finger Paint" => "Finger Paint",
			"Fjalla One" => "Fjalla One",
			"Fjord One" => "Fjord One",
			"Flamenco" => "Flamenco",
			"Flavors" => "Flavors",
			"Fondamento" => "Fondamento",
			"Fontdiner Swanky" => "Fontdiner Swanky",
			"Forum" => "Forum",
			"Francois One" => "Francois One",
			"Freckle Face" => "Freckle Face",
			"Fredericka the Great" => "Fredericka the Great",
			"Fredoka One" => "Fredoka One",
			"Freehand" => "Freehand",
			"Fresca" => "Fresca",
			"Frijole" => "Frijole",
			"Fruktur" => "Fruktur",
			"Fugaz One" => "Fugaz One",
			"GFS Didot" => "GFS Didot",
			"GFS Neohellenic" => "GFS Neohellenic",
			"Gabriela" => "Gabriela",
			"Gafata" => "Gafata",
			"Galdeano" => "Galdeano",
			"Galindo" => "Galindo",
			"Gentium Basic" => "Gentium Basic",
			"Gentium Book Basic" => "Gentium Book Basic",
			"Geo" => "Geo",
			"Geostar" => "Geostar",
			"Geostar Fill" => "Geostar Fill",
			"Germania One" => "Germania One",
			"Gilda Display" => "Gilda Display",
			"Give You Glory" => "Give You Glory",
			"Glass Antiqua" => "Glass Antiqua",
			"Glegoo" => "Glegoo",
			"Gloria Hallelujah" => "Gloria Hallelujah",
			"Goblin One" => "Goblin One",
			"Gochi Hand" => "Gochi Hand",
			"Gorditas" => "Gorditas",
			"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
			"Graduate" => "Graduate",
			"Grand Hotel" => "Grand Hotel",
			"Gravitas One" => "Gravitas One",
			"Great Vibes" => "Great Vibes",
			"Griffy" => "Griffy",
			"Gruppo" => "Gruppo",
			"Gudea" => "Gudea",
			"Habibi" => "Habibi",
			"Hammersmith One" => "Hammersmith One",
			"Hanalei" => "Hanalei",
			"Hanalei Fill" => "Hanalei Fill",
			"Handlee" => "Handlee",
			"Hanuman" => "Hanuman",
			"Happy Monkey" => "Happy Monkey",
			"Headland One" => "Headland One",
			"Henny Penny" => "Henny Penny",
			"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
			"Holtwood One SC" => "Holtwood One SC",
			"Homemade Apple" => "Homemade Apple",
			"Homenaje" => "Homenaje",
			"IM Fell DW Pica" => "IM Fell DW Pica",
			"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
			"IM Fell Double Pica" => "IM Fell Double Pica",
			"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
			"IM Fell English" => "IM Fell English",
			"IM Fell English SC" => "IM Fell English SC",
			"IM Fell French Canon" => "IM Fell French Canon",
			"IM Fell French Canon SC" => "IM Fell French Canon SC",
			"IM Fell Great Primer" => "IM Fell Great Primer",
			"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
			"Iceberg" => "Iceberg",
			"Iceland" => "Iceland",
			"Imprima" => "Imprima",
			"Inconsolata" => "Inconsolata",
			"Inder" => "Inder",
			"Indie Flower" => "Indie Flower",
			"Inika" => "Inika",
			"Irish Grover" => "Irish Grover",
			"Istok Web" => "Istok Web",
			"Italiana" => "Italiana",
			"Italianno" => "Italianno",
			"Jacques Francois" => "Jacques Francois",
			"Jacques Francois Shadow" => "Jacques Francois Shadow",
			"Jim Nightshade" => "Jim Nightshade",
			"Jockey One" => "Jockey One",
			"Jolly Lodger" => "Jolly Lodger",
			"Josefin Sans" => "Josefin Sans",
			"Josefin Slab" => "Josefin Slab",
			"Joti One" => "Joti One",
			"Judson" => "Judson",
			"Julee" => "Julee",
			"Julius Sans One" => "Julius Sans One",
			"Junge" => "Junge",
			"Jura" => "Jura",
			"Just Another Hand" => "Just Another Hand",
			"Just Me Again Down Here" => "Just Me Again Down Here",
			"Kameron" => "Kameron",
			"Karla" => "Karla",
			"Kaushan Script" => "Kaushan Script",
			"Kavoon" => "Kavoon",
			"Keania One" => "Keania One",
			"Kelly Slab" => "Kelly Slab",
			"Kenia" => "Kenia",
			"Khmer" => "Khmer",
			"Kite One" => "Kite One",
			"Knewave" => "Knewave",
			"Kotta One" => "Kotta One",
			"Koulen" => "Koulen",
			"Kranky" => "Kranky",
			"Kreon" => "Kreon",
			"Kristi" => "Kristi",
			"Krona One" => "Krona One",
			"La Belle Aurore" => "La Belle Aurore",
			"Lancelot" => "Lancelot",
			"Lato" => "Lato",
			"League Script" => "League Script",
			"Leckerli One" => "Leckerli One",
			"Ledger" => "Ledger",
			"Lekton" => "Lekton",
			"Lemon" => "Lemon",
			"Libre Baskerville" => "Libre Baskerville",
			"Life Savers" => "Life Savers",
			"Lilita One" => "Lilita One",
			"Limelight" => "Limelight",
			"Linden Hill" => "Linden Hill",
			"Lobster" => "Lobster",
			"Lobster Two" => "Lobster Two",
			"Londrina Outline" => "Londrina Outline",
			"Londrina Shadow" => "Londrina Shadow",
			"Londrina Sketch" => "Londrina Sketch",
			"Londrina Solid" => "Londrina Solid",
			"Lora" => "Lora",
			"Love Ya Like A Sister" => "Love Ya Like A Sister",
			"Loved by the King" => "Loved by the King",
			"Lovers Quarrel" => "Lovers Quarrel",
			"Luckiest Guy" => "Luckiest Guy",
			"Lusitana" => "Lusitana",
			"Lustria" => "Lustria",
			"Macondo" => "Macondo",
			"Macondo Swash Caps" => "Macondo Swash Caps",
			"Magra" => "Magra",
			"Maiden Orange" => "Maiden Orange",
			"Mako" => "Mako",
			"Marcellus" => "Marcellus",
			"Marcellus SC" => "Marcellus SC",
			"Marck Script" => "Marck Script",
			"Margarine" => "Margarine",
			"Marko One" => "Marko One",
			"Marmelad" => "Marmelad",
			"Marvel" => "Marvel",
			"Mate" => "Mate",
			"Mate SC" => "Mate SC",
			"Maven Pro" => "Maven Pro",
			"McLaren" => "McLaren",
			"Meddon" => "Meddon",
			"MedievalSharp" => "MedievalSharp",
			"Medula One" => "Medula One",
			"Megrim" => "Megrim",
			"Meie Script" => "Meie Script",
			"Merienda" => "Merienda",
			"Merienda One" => "Merienda One",
			"Merriweather" => "Merriweather",
			"Merriweather Sans" => "Merriweather Sans",
			"Metal" => "Metal",
			"Metal Mania" => "Metal Mania",
			"Metamorphous" => "Metamorphous",
			"Metrophobic" => "Metrophobic",
			"Michroma" => "Michroma",
			"Milonga" => "Milonga",
			"Miltonian" => "Miltonian",
			"Miltonian Tattoo" => "Miltonian Tattoo",
			"Miniver" => "Miniver",
			"Miss Fajardose" => "Miss Fajardose",
			"Modern Antiqua" => "Modern Antiqua",
			"Molengo" => "Molengo",
			"Molle" => "Molle",
			"Monda" => "Monda",
			"Monofett" => "Monofett",
			"Monoton" => "Monoton",
			"Monsieur La Doulaise" => "Monsieur La Doulaise",
			"Montaga" => "Montaga",
			"Montez" => "Montez",
			"Montserrat" => "Montserrat",
			"Montserrat Alternates" => "Montserrat Alternates",
			"Montserrat Subrayada" => "Montserrat Subrayada",
			"Moul" => "Moul",
			"Moulpali" => "Moulpali",
			"Mountains of Christmas" => "Mountains of Christmas",
			"Mouse Memoirs" => "Mouse Memoirs",
			"Mr Bedfort" => "Mr Bedfort",
			"Mr Dafoe" => "Mr Dafoe",
			"Mr De Haviland" => "Mr De Haviland",
			"Mrs Saint Delafield" => "Mrs Saint Delafield",
			"Mrs Sheppards" => "Mrs Sheppards",
			"Muli" => "Muli",
			"Mystery Quest" => "Mystery Quest",
			"Neucha" => "Neucha",
			"Neuton" => "Neuton",
			"New Rocker" => "New Rocker",
			"News Cycle" => "News Cycle",
			"Niconne" => "Niconne",
			"Nixie One" => "Nixie One",
			"Nobile" => "Nobile",
			"Nokora" => "Nokora",
			"Norican" => "Norican",
			"Nosifer" => "Nosifer",
			"Nothing You Could Do" => "Nothing You Could Do",
			"Noticia Text" => "Noticia Text",
			"Noto Sans" => "Noto Sans",
			"Noto Serif" => "Noto Serif",
			"Nova Cut" => "Nova Cut",
			"Nova Flat" => "Nova Flat",
			"Nova Mono" => "Nova Mono",
			"Nova Oval" => "Nova Oval",
			"Nova Round" => "Nova Round",
			"Nova Script" => "Nova Script",
			"Nova Slim" => "Nova Slim",
			"Nova Square" => "Nova Square",
			"Numans" => "Numans",
			"Nunito" => "Nunito",
			"Odor Mean Chey" => "Odor Mean Chey",
			"Offside" => "Offside",
			"Old Standard TT" => "Old Standard TT",
			"Oldenburg" => "Oldenburg",
			"Oleo Script" => "Oleo Script",
			"Oleo Script Swash Caps" => "Oleo Script Swash Caps",
			"Open Sans" => "Open Sans",
			"Open Sans Condensed" => "Open Sans Condensed",
			"Oranienbaum" => "Oranienbaum",
			"Orbitron" => "Orbitron",
			"Oregano" => "Oregano",
			"Orienta" => "Orienta",
			"Original Surfer" => "Original Surfer",
			"Oswald" => "Oswald",
			"Over the Rainbow" => "Over the Rainbow",
			"Overlock" => "Overlock",
			"Overlock SC" => "Overlock SC",
			"Ovo" => "Ovo",
			"Oxygen" => "Oxygen",
			"Oxygen Mono" => "Oxygen Mono",
			"PT Mono" => "PT Mono",
			"PT Sans" => "PT Sans",
			"PT Sans Caption" => "PT Sans Caption",
			"PT Sans Narrow" => "PT Sans Narrow",
			"PT Serif" => "PT Serif",
			"PT Serif Caption" => "PT Serif Caption",
			"Pacifico" => "Pacifico",
			"Paprika" => "Paprika",
			"Parisienne" => "Parisienne",
			"Passero One" => "Passero One",
			"Passion One" => "Passion One",
			"Patrick Hand" => "Patrick Hand",
			"Patrick Hand SC" => "Patrick Hand SC",
			"Patua One" => "Patua One",
			"Paytone One" => "Paytone One",
			"Peralta" => "Peralta",
			"Permanent Marker" => "Permanent Marker",
			"Petit Formal Script" => "Petit Formal Script",
			"Petrona" => "Petrona",
			"Philosopher" => "Philosopher",
			"Piedra" => "Piedra",
			"Pinyon Script" => "Pinyon Script",
			"Pirata One" => "Pirata One",
			"Plaster" => "Plaster",
			"Play" => "Play",
			"Playball" => "Playball",
			"Playfair Display" => "Playfair Display",
			"Playfair Display SC" => "Playfair Display SC",
			"Podkova" => "Podkova",
			"Poiret One" => "Poiret One",
			"Poller One" => "Poller One",
			"Poly" => "Poly",
			"Pompiere" => "Pompiere",
			"Pontano Sans" => "Pontano Sans",
			"Port Lligat Sans" => "Port Lligat Sans",
			"Port Lligat Slab" => "Port Lligat Slab",
			"Prata" => "Prata",
			"Preahvihear" => "Preahvihear",
			"Press Start 2P" => "Press Start 2P",
			"Princess Sofia" => "Princess Sofia",
			"Prociono" => "Prociono",
			"Prosto One" => "Prosto One",
			"Puritan" => "Puritan",
			"Purple Purse" => "Purple Purse",
			"Quando" => "Quando",
			"Quantico" => "Quantico",
			"Quattrocento" => "Quattrocento",
			"Quattrocento Sans" => "Quattrocento Sans",
			"Questrial" => "Questrial",
			"Quicksand" => "Quicksand",
			"Quintessential" => "Quintessential",
			"Qwigley" => "Qwigley",
			"Racing Sans One" => "Racing Sans One",
			"Radley" => "Radley",
			"Raleway" => "Raleway",
			"Raleway Dots" => "Raleway Dots",
			"Rambla" => "Rambla",
			"Rammetto One" => "Rammetto One",
			"Ranchers" => "Ranchers",
			"Rancho" => "Rancho",
			"Rationale" => "Rationale",
			"Redressed" => "Redressed",
			"Reenie Beanie" => "Reenie Beanie",
			"Revalia" => "Revalia",
			"Ribeye" => "Ribeye",
			"Ribeye Marrow" => "Ribeye Marrow",
			"Righteous" => "Righteous",
			"Risque" => "Risque",
			"Roboto" => "Roboto",
			"Roboto Condensed" => "Roboto Condensed",
			"Roboto Slab" => "Roboto Slab",
			"Rochester" => "Rochester",
			"Rock Salt" => "Rock Salt",
			"Rokkitt" => "Rokkitt",
			"Romanesco" => "Romanesco",
			"Ropa Sans" => "Ropa Sans",
			"Rosario" => "Rosario",
			"Rosarivo" => "Rosarivo",
			"Rouge Script" => "Rouge Script",
			"Ruda" => "Ruda",
			"Rufina" => "Rufina",
			"Ruge Boogie" => "Ruge Boogie",
			"Ruluko" => "Ruluko",
			"Rum Raisin" => "Rum Raisin",
			"Ruslan Display" => "Ruslan Display",
			"Russo One" => "Russo One",
			"Ruthie" => "Ruthie",
			"Rye" => "Rye",
			"Sacramento" => "Sacramento",
			"Sail" => "Sail",
			"Salsa" => "Salsa",
			"Sanchez" => "Sanchez",
			"Sancreek" => "Sancreek",
			"Sansita One" => "Sansita One",
			"Sarina" => "Sarina",
			"Satisfy" => "Satisfy",
			"Scada" => "Scada",
			"Schoolbell" => "Schoolbell",
			"Seaweed Script" => "Seaweed Script",
			"Sevillana" => "Sevillana",
			"Seymour One" => "Seymour One",
			"Shadows Into Light" => "Shadows Into Light",
			"Shadows Into Light Two" => "Shadows Into Light Two",
			"Shanti" => "Shanti",
			"Share" => "Share",
			"Share Tech" => "Share Tech",
			"Share Tech Mono" => "Share Tech Mono",
			"Shojumaru" => "Shojumaru",
			"Short Stack" => "Short Stack",
			"Siemreap" => "Siemreap",
			"Sigmar One" => "Sigmar One",
			"Signika" => "Signika",
			"Signika Negative" => "Signika Negative",
			"Simonetta" => "Simonetta",
			"Sintony" => "Sintony",
			"Sirin Stencil" => "Sirin Stencil",
			"Six Caps" => "Six Caps",
			"Skranji" => "Skranji",
			"Slackey" => "Slackey",
			"Smokum" => "Smokum",
			"Smythe" => "Smythe",
			"Sniglet" => "Sniglet",
			"Snippet" => "Snippet",
			"Snowburst One" => "Snowburst One",
			"Sofadi One" => "Sofadi One",
			"Sofia" => "Sofia",
			"Sonsie One" => "Sonsie One",
			"Sorts Mill Goudy" => "Sorts Mill Goudy",
			"Source Code Pro" => "Source Code Pro",
			"Source Sans Pro" => "Source Sans Pro",
			"Special Elite" => "Special Elite",
			"Spicy Rice" => "Spicy Rice",
			"Spinnaker" => "Spinnaker",
			"Spirax" => "Spirax",
			"Squada One" => "Squada One",
			"Stalemate" => "Stalemate",
			"Stalinist One" => "Stalinist One",
			"Stardos Stencil" => "Stardos Stencil",
			"Stint Ultra Condensed" => "Stint Ultra Condensed",
			"Stint Ultra Expanded" => "Stint Ultra Expanded",
			"Stoke" => "Stoke",
			"Strait" => "Strait",
			"Sue Ellen Francisco" => "Sue Ellen Francisco",
			"Sunshiney" => "Sunshiney",
			"Supermercado One" => "Supermercado One",
			"Suwannaphum" => "Suwannaphum",
			"Swanky and Moo Moo" => "Swanky and Moo Moo",
			"Syncopate" => "Syncopate",
			"Tangerine" => "Tangerine",
			"Taprom" => "Taprom",
			"Tauri" => "Tauri",
			"Telex" => "Telex",
			"Tenor Sans" => "Tenor Sans",
			"Text Me One" => "Text Me One",
			"The Girl Next Door" => "The Girl Next Door",
			"Tienne" => "Tienne",
			"Tinos" => "Tinos",
			"Titan One" => "Titan One",
			"Titillium Web" => "Titillium Web",
			"Trade Winds" => "Trade Winds",
			"Trocchi" => "Trocchi",
			"Trochut" => "Trochut",
			"Trykker" => "Trykker",
			"Tulpen One" => "Tulpen One",
			"Ubuntu" => "Ubuntu",
			"Ubuntu Condensed" => "Ubuntu Condensed",
			"Ubuntu Mono" => "Ubuntu Mono",
			"Ultra" => "Ultra",
			"Uncial Antiqua" => "Uncial Antiqua",
			"Underdog" => "Underdog",
			"Unica One" => "Unica One",
			"UnifrakturCook" => "UnifrakturCook",
			"UnifrakturMaguntia" => "UnifrakturMaguntia",
			"Unkempt" => "Unkempt",
			"Unlock" => "Unlock",
			"Unna" => "Unna",
			"VT323" => "VT323",
			"Vampiro One" => "Vampiro One",
			"Varela" => "Varela",
			"Varela Round" => "Varela Round",
			"Vast Shadow" => "Vast Shadow",
			"Vibur" => "Vibur",
			"Vidaloka" => "Vidaloka",
			"Viga" => "Viga",
			"Voces" => "Voces",
			"Volkhov" => "Volkhov",
			"Vollkorn" => "Vollkorn",
			"Voltaire" => "Voltaire",
			"Waiting for the Sunrise" => "Waiting for the Sunrise",
			"Wallpoet" => "Wallpoet",
			"Walter Turncoat" => "Walter Turncoat",
			"Warnes" => "Warnes",
			"Wellfleet" => "Wellfleet",
			"Wendy One" => "Wendy One",
			"Wire One" => "Wire One",
			"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
			"Yellowtail" => "Yellowtail",
			"Yeseva One" => "Yeseva One",
			"Yesteryear" => "Yesteryear",
			"Zeyada" => "Zeyada"
		);


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


				
//start general info				
$of_options[] = array( 	"name" 		=> "General",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_general",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">General Settings</h3>
						Here you can set your general information",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( "name" => "Select Body Font",
						"desc" => "Select a font family for body text",
						"id" => "google_font_body",
						"std" 		=> "",
						"type" => "select_google_font",
						"options" => $google_fonts
				);
				
$of_options[] = array( "name" => "Select Title Font",
						"desc" => "Select a font family for your title and menu",
						"id" => "google_font_title",
						"std" 		=> "",
						"type" => "select_google_font",
						"options" => $google_fonts
				);				
				
$of_options[] = array( 	"name" 		=> "Custom Favicon ICO",
						"desc" 		=> "Upload a 16px x 16px ico image that will represent your website's favicon.",
						"id" 		=> "customfavicon_general",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Iphone Favicon",
						"desc" 		=> "Upload a 57px x 57px PNG/GIF image that will represent your website's favicon on Iphone.",
						"id" 		=> "iphonefavicon_general",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Ipad Favicon",
						"desc" 		=> "Upload a 72px x 72px PNG/GIF image that will represent your website's favicon on Ipad.",
						"id" 		=> "ipadfavicon_general",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Retina Favicon",
						"desc" 		=> "Upload a 114px x 114px PNG/GIF image that will represent your website's favicon on retina display.",
						"id" 		=> "retinafavicon_general",
						"type" 		=> "upload"
				);
				
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_seo",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Seo</h3>
						Paste your site title and description for SEO optimization.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Site Title",
						"desc" 		=> "Insert your site title",
						"id" 		=> "title_general",
						"std"		=> "Sweet Cake WP version",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Description",
						"desc" 		=> "Insert your site description",
						"id" 		=> "description_general",
						"std"		=> "Sweet Cake WP version",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Tracking Code",
						"desc" 		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		=> "trackingcode_general",
						"type" 		=> "textarea"
				);
//end general info

//start home section				
$of_options[] = array( 	"name" 		=> "Home",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_home",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Home Settings</h3>
						Here you can set your Home page",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Home page Builder",
						"desc" 		=> "Organize how you want the layout to appear on your homepage",
						"id" 		=> "homepage_builder",
						"std" 		=> $of_options_homepage_builder,
						"type" 		=> "sorter"
				);
//end home section

//start header section				
$of_options[] = array( 	"name" 		=> "Header",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_general",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Settings</h3>
						Here you can set your header section",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Intro navigation effect",
						"desc" 		=> "Enable or Disable the intro effect animation",
						"id" 		=> "introeffect_header",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Animation",
						"desc" 		=> "Select your favourite animation",
						"id" 		=> "animation_header",
						"fold" 		=> "introeffect_header", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_animations
				);
				
$of_options[] = array( 	"name" 		=> "Logo Uploader",
						"desc" 		=> "Upload your logo here. for a correct visualization in all device you have to upload logo image with this size: 180px x 239px",
						"id" 		=> "logo_header",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Color Title",
						"desc" 		=> "Pick a color for your section title.",
						"id" 		=> "title_header_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Color Title Hover",
						"desc" 		=> "Pick a color for your section title hover.",
						"id" 		=> "title_hover_header_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Shadow Color Title",
						"desc" 		=> "Pick a color for your section title shadow.",
						"id" 		=> "title_header_shadow_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Border Navigation",
						"desc" 		=> "Pick a color for your menu label border.",
						"id" 		=> "navigation_header_border",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Background",
						"desc" 		=> "If you want you can insert a different background pattern",
						"id" 		=> "bg_header",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Navigation Builder",
						"desc" 		=> "Organize how you want the layout to appear on header section",
						"id" 		=> "navigation_builder",
						"std" 		=> $of_options_navigation_builder,
						"type" 		=> "sorter"
				);
				
$of_options[] = array( 	"name" 		=> "Left Menu Grid",
						"desc" 		=> "Select the grid system you want to use for your left menu",
						"id" 		=> "grid_leftmenu",
						"std" 		=> "grid_5",
						"type" 		=> "select",
						"options" 	=> $select_grid
				);
				
$of_options[] = array( 	"name" 		=> "Logo Grid",
						"desc" 		=> "Select the grid system you want to use for your logo",
						"id" 		=> "grid_logo",
						"std" 		=> "grid_2",
						"type" 		=> "select",
						"options" 	=> $select_grid
				);
				
$of_options[] = array( 	"name" 		=> "Right Menu Grid",
						"desc" 		=> "Select the grid system you want to use for your right menu",
						"id" 		=> "grid_rightmenu",
						"std" 		=> "grid_5",
						"type" 		=> "select",
						"options" 	=> $select_grid
				);	
//end header section

//start slider section				
$of_options[] = array( 	"name" 		=> "Slider",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_slider",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Slider Settings</h3>
						Here you can set your slider section",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Slider ID",
						"desc" 		=> "Insert the ID of your revolution slider for see it in your site.",
						"id" 		=> "id_slider",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Waves",
						"desc" 		=> "Enable or Disable top and bottom waves",
						"id" 		=> "waves_slider",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Top Waves",
						"desc" 		=> "If you want you can insert a different pattern img of Top Waves",
						"id" 		=> "topwaves_slider",
						"fold" 		=> "waves_slider", /* the checkbox hook */
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Bottom Waves",
						"desc" 		=> "If you want you can insert a different pattern img of Bottom Waves",
						"id" 		=> "bottomwaves_slider",
						"fold" 		=> "waves_slider", /* the checkbox hook */
						"type" 		=> "upload"
				);				
//end slider section

//start services section settings				
$of_options[] = array( 	"name" 		=> "Services",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_services",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Services</h3>
						Here you can set your section services",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Intro title effect",
						"desc" 		=> "Enable or Disable the intro effect animation",
						"id" 		=> "introeffect_services",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Animation",
						"desc" 		=> "Select your favourite animation",
						"id" 		=> "animation_services",
						"fold" 		=> "introeffect_services", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_animations
				);
				
$of_options[] = array( 	"name" 		=> "Title",
						"desc" 		=> "Insert the section services title",
						"id" 		=> "title_services",
						"std" 		=> "Section Services",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Color Title",
						"desc" 		=> "Pick a color for your section title.",
						"id" 		=> "title_services_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Shadow Color Title",
						"desc" 		=> "Pick a color for your section title shadow.",
						"id" 		=> "title_services_shadow_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Divider",
						"desc" 		=> "If you want you can insert a different divider image (580px x 17px)",
						"id" 		=> "divider_services",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Background",
						"desc" 		=> "If you want you can insert a different background pattern",
						"id" 		=> "bg_services",
						"type" 		=> "upload"
				);	
				
$of_options[] = array( 	"name" 		=> "Number of services",
						"desc" 		=> "Select how many services you want to display",
						"id" 		=> "select_services",
						"std" 		=> "6",
						"type" 		=> "select",
						"options" 	=> $select_services_number
				);

$of_options[] = array( 	"name" 		=> "Grid System",
						"desc" 		=> "Select the grid system you want to use for your services",
						"id" 		=> "grid_services",
						"std" 		=> "grid_4",
						"type" 		=> "select",
						"options" 	=> $select_grid
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Links",
						"desc" 		=> "Enable or Disable the anchor links",
						"id" 		=> "anchor_services",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchortoplink_services",
						"fold" 		=> "anchor_services", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Image",
						"desc" 		=> "If you want you can insert a different Anchor Top Image",
						"id" 		=> "anchortopimage_services",
						"fold" 		=> "anchor_services", /* the checkbox hook */
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchorbottomlink_services",
						"fold" 		=> "anchor_services", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Image",
						"desc" 		=> "If you want you can insert a different Anchor Bottom Image",
						"id" 		=> "anchorbottomimage_services",
						"fold" 		=> "anchor_services", /* the checkbox hook */
						"type" 		=> "upload"
				);
//end services section

//start testimonials section settings				
$of_options[] = array( 	"name" 		=> "Testimonials",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_testimonials",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Testimonials</h3>
						Here you can set your section testimonials",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Intro content effect",
						"desc" 		=> "Enable or Disable the intro effect animation",
						"id" 		=> "introeffect_testimonials",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Animation",
						"desc" 		=> "Select your favourite animation",
						"id" 		=> "animation_testimonials",
						"fold" 		=> "introeffect_testimonials", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_animations
				);

$of_options[] = array( 	"name" 		=> "Background",
						"desc" 		=> "If you want you can insert a different background pattern",
						"id" 		=> "bg_testimonials",
						"type" 		=> "upload"
				);	
				
$of_options[] = array( 	"name" 		=> "Dark Filter",
						"desc" 		=> "Enable or Disable dark filter on your background",
						"id" 		=> "filter_testimonials",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Quote (top)",
						"desc" 		=> "If you want you can insert a different top quote icon (64px x 51px)",
						"id" 		=> "topquote_testimonials",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Quote (bottom)",
						"desc" 		=> "If you want you can insert a different bottom quote icon (64px x 51px)",
						"id" 		=> "bottomquote_testimonials",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Links",
						"desc" 		=> "Enable or Disable the anchor links",
						"id" 		=> "anchor_testimonials",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchortoplink_testimonials",
						"fold" 		=> "anchor_testimonials", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Image",
						"desc" 		=> "If you want you can insert a different Anchor Top Image",
						"id" 		=> "anchortopimage_testimonials",
						"fold" 		=> "anchor_testimonials", /* the checkbox hook */
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchorbottomlink_testimonials",
						"fold" 		=> "anchor_testimonials", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Image",
						"desc" 		=> "If you want you can insert a different Anchor Bottom Image",
						"id" 		=> "anchorbottomimage_testimonials",
						"fold" 		=> "anchor_testimonials", /* the checkbox hook */
						"type" 		=> "upload"
				);
//end testimonials section

//start portfolio section settings				
$of_options[] = array( 	"name" 		=> "Portfolio",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_portfolio",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Portfolio</h3>
						Here you can set your section portfolio",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Intro title effect",
						"desc" 		=> "Enable or Disable the intro effect animation",
						"id" 		=> "introeffect_portfolio",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Animation",
						"desc" 		=> "Select your favourite animation",
						"id" 		=> "animation_portfolio",
						"fold" 		=> "introeffect_portfolio", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_animations
				);
				
$of_options[] = array( 	"name" 		=> "Title",
						"desc" 		=> "Insert the section portfolio title.",
						"id" 		=> "title_portfolio",
						"std" 		=> "Section Portfolio",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Color Title",
						"desc" 		=> "Pick a color for your section title.",
						"id" 		=> "title_portfolio_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Shadow Color Title",
						"desc" 		=> "Pick a color for your section title shadow.",
						"id" 		=> "title_portfolio_shadow_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Divider",
						"desc" 		=> "If you want you can insert a different divider image (580px x 17px)",
						"id" 		=> "divider_portfolio",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Background",
						"desc" 		=> "If you want you can insert a different background pattern",
						"id" 		=> "bg_portfolio",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Anchor Links",
						"desc" 		=> "Enable or Disable the anchor links",
						"id" 		=> "anchor_portfolio",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchortoplink_portfolio",
						"fold" 		=> "anchor_portfolio", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Image",
						"desc" 		=> "If you want you can insert a different Anchor Top Image",
						"id" 		=> "anchortopimage_portfolio",
						"fold" 		=> "anchor_portfolio", /* the checkbox hook */
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchorbottomlink_portfolio",
						"fold" 		=> "anchor_portfolio", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Image",
						"desc" 		=> "If you want you can insert a different Anchor Bottom Image",
						"id" 		=> "anchorbottomimage_portfolio",
						"fold" 		=> "anchor_portfolio", /* the checkbox hook */
						"type" 		=> "upload"
				);
//end portfolio section

//start prices section settings				
$of_options[] = array( 	"name" 		=> "Prices",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_prices",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Prices</h3>
						Here you can set your section prices",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Intro title effect",
						"desc" 		=> "Enable or Disable the intro effect animation",
						"id" 		=> "introeffect_prices",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Animation",
						"desc" 		=> "Select your favourite animation",
						"id" 		=> "animation_prices",
						"fold" 		=> "introeffect_prices", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_animations
				);
				
$of_options[] = array( 	"name" 		=> "Title",
						"desc" 		=> "Insert the section prices title.",
						"id" 		=> "title_prices",
						"std" 		=> "Section Prices",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Color Title",
						"desc" 		=> "Pick a color for your section title.",
						"id" 		=> "title_prices_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Shadow Color Title",
						"desc" 		=> "Pick a color for your section title shadow.",
						"id" 		=> "title_prices_shadow_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Divider",
						"desc" 		=> "If you want you can insert a different divider image (580px x 17px)",
						"id" 		=> "divider_prices",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Background",
						"desc" 		=> "If you want you can insert a different background pattern",
						"id" 		=> "bg_prices",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Number of prices",
						"desc" 		=> "Select how many prices you want to display",
						"id" 		=> "select_prices",
						"std" 		=> "4",
						"type" 		=> "select",
						"options" 	=> $select_number
				);

$of_options[] = array( 	"name" 		=> "Anchor Links",
						"desc" 		=> "Enable or Disable the anchor links",
						"id" 		=> "anchor_prices",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchortoplink_prices",
						"fold" 		=> "anchor_prices", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Image",
						"desc" 		=> "If you want you can insert a different Anchor Top Image",
						"id" 		=> "anchortopimage_prices",
						"fold" 		=> "anchor_prices", /* the checkbox hook */
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchorbottomlink_prices",
						"fold" 		=> "anchor_prices", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Image",
						"desc" 		=> "If you want you can insert a different Anchor Bottom Image",
						"id" 		=> "anchorbottomimage_prices",
						"fold" 		=> "anchor_prices", /* the checkbox hook */
						"type" 		=> "upload"
				);
//end prices section

//start team section settings				
$of_options[] = array( 	"name" 		=> "Team",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_team",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Team</h3>
						Here you can set your section team",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Intro title effect",
						"desc" 		=> "Enable or Disable the intro effect animation",
						"id" 		=> "introeffect_team",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Animation",
						"desc" 		=> "Select your favourite animation",
						"id" 		=> "animation_team",
						"fold" 		=> "introeffect_team", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_animations
				);
				
$of_options[] = array( 	"name" 		=> "Title",
						"desc" 		=> "Insert the section team title.",
						"id" 		=> "title_team",
						"std" 		=> "Section Team",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Color Title",
						"desc" 		=> "Pick a color for your section title.",
						"id" 		=> "title_team_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Shadow Color Title",
						"desc" 		=> "Pick a color for your section title shadow.",
						"id" 		=> "title_team_shadow_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Divider",
						"desc" 		=> "If you want you can insert a different divider image (580px x 17px)",
						"id" 		=> "divider_team",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Background",
						"desc" 		=> "If you want you can insert a different background pattern",
						"id" 		=> "bg_team",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Number of members",
						"desc" 		=> "Select how many people you want to display",
						"id" 		=> "select_team",
						"std" 		=> "4",
						"type" 		=> "select",
						"options" 	=> $select_number
				);

$of_options[] = array( 	"name" 		=> "Anchor Links",
						"desc" 		=> "Enable or Disable the anchor links",
						"id" 		=> "anchor_team",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchortoplink_team",
						"fold" 		=> "anchor_team", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Image",
						"desc" 		=> "If you want you can insert a different Anchor Top Image",
						"id" 		=> "anchortopimage_team",
						"fold" 		=> "anchor_team", /* the checkbox hook */
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchorbottomlink_team",
						"fold" 		=> "anchor_team", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Image",
						"desc" 		=> "If you want you can insert a different Anchor Bottom Image",
						"id" 		=> "anchorbottomimage_team",
						"fold" 		=> "anchor_team", /* the checkbox hook */
						"type" 		=> "upload"
				);	
//end team section

//start team social section settings				
$of_options[] = array( 	"name" 		=> "Team social",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_team",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Team Social</h3>
						Here you can set your section team social",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Facebook",
						"desc" 		=> "If you want you can insert a different Facebook icon (56px x 56px)",
						"id" 		=> "facebook_team_icon",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Twitter",
						"desc" 		=> "If you want you can insert a different Twitter icon (56px x 56px)",
						"id" 		=> "twitter_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Instagram",
						"desc" 		=> "If you want you can insert a different Instagram icon (56px x 56px)",
						"id" 		=> "instagram_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Google Plus",
						"desc" 		=> "If you want you can insert a different Google Plus icon (56px x 56px)",
						"id" 		=> "google_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Pinterest",
						"desc" 		=> "If you want you can insert a different Pinterest icon (56px x 56px)",
						"id" 		=> "pinterest_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Flickr",
						"desc" 		=> "If you want you can insert a different flickr icon (56px x 56px)",
						"id" 		=> "flickr_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Dribble",
						"desc" 		=> "If you want you can insert a different Dribble icon (56px x 56px)",
						"id" 		=> "dribble_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Behance",
						"desc" 		=> "If you want you can insert a different Behance icon (56px x 56px)",
						"id" 		=> "behance_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Github",
						"desc" 		=> "If you want you can insert a different Github icon (56px x 56px)",
						"id" 		=> "github_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Linkedin",
						"desc" 		=> "If you want you can insert a different Linkedin icon (56px x 56px)",
						"id" 		=> "linkedin_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Tumblr",
						"desc" 		=> "If you want you can insert a different Tumblr icon (56px x 56px)",
						"id" 		=> "tumblr_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Skype",
						"desc" 		=> "If you want you can insert a different Skype icon (56px x 56px)",
						"id" 		=> "skype_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Youtube",
						"desc" 		=> "If you want you can insert a different Youtube icon (56px x 56px)",
						"id" 		=> "youtube_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Vimeo",
						"desc" 		=> "If you want you can insert a different Vimeo icon (56px x 56px)",
						"id" 		=> "vimeo_team_icon",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Deviantart",
						"desc" 		=> "If you want you can insert a different Deviantart icon (56px x 56px)",
						"id" 		=> "deviantart_team_icon",
						"type" 		=> "upload"
				);
//end team social section


//start skills section settings				
$of_options[] = array( 	"name" 		=> "Skills",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_skills",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Skills</h3>
						Here you can set your section skills",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Intro title effect",
						"desc" 		=> "Enable or Disable the intro effect animation",
						"id" 		=> "introeffect_skills",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Animation",
						"desc" 		=> "Select your favourite animation",
						"id" 		=> "animation_skills",
						"fold" 		=> "introeffect_skills", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_animations
				);

$of_options[] = array( 	"name" 		=> "Title",
						"desc" 		=> "Insert the section skills title.",
						"id" 		=> "title_skills",
						"std" 		=> "Section Skills",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Color Title",
						"desc" 		=> "Pick a color for your section title.",
						"id" 		=> "title_skills_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Shadow Color Title",
						"desc" 		=> "Pick a color for your section title shadow.",
						"id" 		=> "title_skills_shadow_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Divider",
						"desc" 		=> "If you want you can insert a different divider image (580px x 17px)",
						"id" 		=> "divider_skills",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Background",
						"desc" 		=> "If you want you can insert a different background pattern",
						"id" 		=> "bg_skills",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Operator Symbols",
						"desc" 		=> "Enable or Disable the Operator Symbols between yours skills",
						"id" 		=> "operator_skills",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Clip image",
						"desc" 		=> "If you want you can insert a different clip image (92px x 334px)",
						"id" 		=> "clip_skills",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Skills Bar",
						"desc" 		=> "You can use the following shortcodes in your Skills Bar: [skills_bar title=\"LOREM IPSUM DOLOR SIT\" bar=\"60\" number=\"60\"]",
						"id" 		=> "bar_skills",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Links",
						"desc" 		=> "Enable or Disable the anchor links",
						"id" 		=> "anchor_skills",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchortoplink_skills",
						"fold" 		=> "anchor_skills", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Image",
						"desc" 		=> "If you want you can insert a different Anchor Top Image",
						"id" 		=> "anchortopimage_skills",
						"fold" 		=> "anchor_skills", /* the checkbox hook */
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchorbottomlink_skills",
						"fold" 		=> "anchor_skills", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Image",
						"desc" 		=> "If you want you can insert a different Anchor Bottom Image",
						"id" 		=> "anchorbottomimage_skills",
						"fold" 		=> "anchor_skills", /* the checkbox hook */
						"type" 		=> "upload"
				);				
//end skills section settings


//start social section settings				
$of_options[] = array( 	"name" 		=> "Social",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_social",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Social</h3>
						Here you can set your social section",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Intro title effect",
						"desc" 		=> "Enable or Disable the intro effect animation",
						"id" 		=> "introeffect_social",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Animation",
						"desc" 		=> "Select your favourite animation",
						"id" 		=> "animation_social",
						"fold" 		=> "introeffect_social", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_animations
				);
				
$of_options[] = array( 	"name" 		=> "Title",
						"desc" 		=> "Insert the social section title.",
						"id" 		=> "title_social",
						"std" 		=> "Section Social",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Color Title",
						"desc" 		=> "Pick a color for your section title.",
						"id" 		=> "title_social_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Shadow Color Title",
						"desc" 		=> "Pick a color for your section title shadow.",
						"id" 		=> "title_social_shadow_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Divider",
						"desc" 		=> "If you want you can insert a different divider image (580px x 17px)",
						"id" 		=> "divider_social",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Background",
						"desc" 		=> "If you want you can insert a different background pattern",
						"id" 		=> "bg_social",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Number of social",
						"desc" 		=> "Select how many social you want to display",
						"id" 		=> "select_social",
						"std" 		=> "6",
						"type" 		=> "select",
						"options" 	=> $select_social_number
				);

$of_options[] = array( 	"name" 		=> "Grid System",
						"desc" 		=> "Select the grid system you want to use for your social",
						"id" 		=> "grid_social",
						"std" 		=> "grid_2",
						"type" 		=> "select",
						"options" 	=> $select_grid
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Links",
						"desc" 		=> "Enable or Disable the anchor links",
						"id" 		=> "anchor_social",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchortoplink_social",
						"fold" 		=> "anchor_social", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Top Image",
						"desc" 		=> "If you want you can insert a different Anchor Top Image",
						"id" 		=> "anchortopimage_social",
						"fold" 		=> "anchor_social", /* the checkbox hook */
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Link",
						"desc" 		=> "Select your link to favoutite section",
						"id" 		=> "anchorbottomlink_social",
						"fold" 		=> "anchor_social", /* the checkbox hook */
						"type" 		=> "select",
						"options" 	=> $select_section
				);
				
$of_options[] = array( 	"name" 		=> "Anchor Bottom Image",
						"desc" 		=> "If you want you can insert a different Anchor Bottom Image",
						"id" 		=> "anchorbottomimage_social",
						"fold" 		=> "anchor_social", /* the checkbox hook */
						"type" 		=> "upload"
				);
//end social section


//start contact section settings				
$of_options[] = array( 	"name" 		=> "Contact",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_contact",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Contact</h3>
						Here you can set your contact section",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Coordinates Google maps",
						"desc" 		=> "Insert your Google maps Coordinates",
						"id" 		=> "coordinatesgooglemaps_contacts",
						"std"		=> "40.759277, -73.977064",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Zoom Map",
						"desc" 		=> "Select your zoom map",
						"id" 		=> "zoom_contacts",
						"std"		=> "17",
						"type" 		=> "select",
						"options" 	=> $select_zoom_map
				);
				
$of_options[] = array( 	"name" 		=> "Map Draggable",
						"desc" 		=> "Enable or Disable the draggable option",
						"id" 		=> "draggable_contacts",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Title Contacts",
						"desc" 		=> "Insert your company name",
						"id" 		=> "title_contacts",
						"std" 		=> "Sweet Cake",
						"type" 		=> "text"
				);
			
$of_options[] = array( 	"name" 		=> "Address",
						"desc" 		=> "Insert your address",
						"id" 		=> "address_contacts",
						"std" 		=> "insert your address",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Telephone number",
						"desc" 		=> "Insert your Telephone number",
						"id" 		=> "telephone_contacts",
						"std" 		=> "insert your telephone",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Fax number",
						"desc" 		=> "Insert your Fax number",
						"id" 		=> "fax_contacts",
						"std" 		=> "insert your fax",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Mail",
						"desc" 		=> "Insert your email",
						"id" 		=> "mail_contacts",
						"std" 		=> "insert your email",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Waves",
						"desc" 		=> "Enable or Disable top waves",
						"id" 		=> "waves_contacts",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Top Waves",
						"desc" 		=> "If you want you can insert a different pattern img of Top Waves",
						"id" 		=> "topwaves_contacts",
						"fold" 		=> "waves_contacts", /* the checkbox hook */
						"type" 		=> "upload"
				);		
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_copyright",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Copyright</h3>
						Copyright Settings",
						"icon" 		=> true,
						"type" 		=> "info"
				);				
$of_options[] = array( 	"name" 		=> "Copyright section",
						"desc" 		=> "Add copyright section",
						"id" 		=> "section_copyright",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> "Copyright text",
						"desc" 		=> "Insert your copyright text",
						"id" 		=> "text_copyright",
						"fold" 		=> "section_copyright", /* the checkbox hook */
						"std" 		=> "Copyright Nicdark",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Text Color",
		"desc" 		=> "Pick a color for your copyright text.",
		"id" 		=> "colortext_copyright",
		"fold" 		=> "section_copyright", /* the checkbox hook */
		"std" 		=> "",
		"type" 		=> "color"
);	
$of_options[] = array( 	"name" 		=> "Background Color",
						"desc" 		=> "Pick a background color for your copyright background.",
						"id" 		=> "background_copyright",
						"fold" 		=> "section_copyright", /* the checkbox hook */
						"std" 		=> "",
						"type" 		=> "color"
				);
	
				
//end contact section

//start blog settings
$of_options[] = array( 	"name" 		=> "Blog",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Blog!",
						"desc" 		=> "",
						"id" 		=> "introduction_blog",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Blog</h3>
						Blog Settings.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Background",
						"desc" 		=> "If you want you can insert a different background pattern",
						"id" 		=> "bg_blog",
						"type" 		=> "upload"
				);
$of_options[] = array( 	"name" 		=> "Ribbon",
						"desc" 		=> "Enable or disable the Ribbon for link to your favourite page",
						"id" 		=> "ribbon_blog",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> "Link",
						"desc" 		=> "Insert your link",
						"id" 		=> "ribbon_link_blog",
						"fold" 		=> "ribbon_blog", /* the checkbox hook */
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Image",
						"desc" 		=> "If you want you can insert a different image",
						"id" 		=> "ribbon_img_blog",
						"fold" 		=> "ribbon_blog", /* the checkbox hook */
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Resize image mobile",
						"desc" 		=> "Resize your image on smarthphone",
						"id" 		=> "ribbon_img_mobile_blog",
						"fold" 		=> "ribbon_blog", /* the checkbox hook */
						"std" 		=> "80",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);				
//end blog settings
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
