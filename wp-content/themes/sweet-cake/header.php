<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
 
    <meta charset="<?php bloginfo('charset'); ?>">  
    
    <title><?php global $data; echo $data['title_general']; ?></title> <!--title-->  
     <!--description-->  
    <meta name="author" content="nicDark"> <!--author name-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--meta responsive-->
    
    <!--[if lt IE 9]>  
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>  
    <![endif]-->  
    
    <!--FAVICONS-->
    <link rel="shortcut icon" href="<?php if($data['customfavicon_general']): ?><?php echo $data['customfavicon_general']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico<?php endif; ?>">
    <link rel="apple-touch-icon" href="<?php if($data['iphonefavicon_general']): ?><?php echo $data['iphonefavicon_general']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon.png<?php endif; ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php if($data['ipadfavicon_general']): ?><?php echo $data['ipadfavicon_general']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-72x72.png<?php endif; ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php if($data['retinafavicon_general']): ?><?php echo $data['retinafavicon_general']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-114x114.png<?php endif; ?>">
    <!--END FAVICONS-->
	
	<!--start google font-->
	<?php if($data['google_font_body'] != 'none'): ?>
	<link href='http://fonts.googleapis.com/css?family=<?php echo urlencode($data['google_font_body']); ?>:300,400,400italic,500,600,700,700italic&amp;subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese' rel='stylesheet' type='text/css' />
	<?php endif; ?>
	<?php if($data['google_font_title'] != 'none'): ?>
	<link href='http://fonts.googleapis.com/css?family=<?php echo urlencode($data['google_font_title']); ?>:300,400,400italic,500,600,700,700italic&amp;subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese' rel='stylesheet' type='text/css' />
	<?php endif; ?>
	<!--end gogole fonts-->
     
<?php wp_head(); ?>	  
</head>  
<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php 
if ($data['ribbon_blog']): ?>
<!--img blog-->
<a class="demo-blog" href="<?php echo $data['ribbon_link_blog']; ?>">
<img src="<?php if ($data['ribbon_img_blog']): ?><?php echo $data['ribbon_img_blog']; ?><?php else: echo get_template_directory_uri().'/img/section-archive/blog.png'; ?><?php endif; ?>"></a>
<!--end img blog-->
<?php endif; ?>