<?php
/**
 * Template Name: Home
 */
?>

<?php get_header(); ?>

<?php include "navigation.php"; ?>
<?php include "slide.php"; ?>

<?php 	
$layout_home = $data['homepage_builder']['enabled'];

if ($layout_home):
	foreach ($layout_home as $key=>$value){
		switch ($key){
			
			case 'services': 
			?>
			<?php include "services.php"; ?>
            
            <?php
			break;
			case 'testimonials': 
			?>
			<?php include "testimonials.php"; ?>
            
            <?php
			break;
			case 'portfolio': 
			?>
			<?php include "portfolio.php"; ?>
            
            <?php
			break;
			case 'prices': 
			?>
			<?php include "prices.php"; ?>
            
            <?php
			break;
			case 'team': 
			?>
			<?php include "team.php"; ?>
            
            <?php
			break;
			case 'skills': 
			?>
			<?php include "skills.php"; ?>
			
			<?php
			break;
			case 'social': 
			?>
			<?php include "social.php"; ?>
			
			<?php
			break;
		
		}
	}
endif;
?>

<?php include "contacts.php"; ?>

<?php get_footer(); ?>