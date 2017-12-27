<!--start services-->
<section id="services">
 	
    <?php if($data['anchor_services'] == 1){ ?>
    
    <!--start anchors-->
    <div class="anchors">
    	<div class="contanchors">
            <a href="<?php echo $data['anchortoplink_services']; ?>"><img class="anchortop" alt="" src="<?php if($data['anchortopimage_services']): ?><?php echo $data['anchortopimage_services']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/topservices.png<?php endif; ?>" /></a>
            <a href="<?php echo $data['anchorbottomlink_services']; ?>"><img class="anchorbottom" alt="" src="<?php if($data['anchorbottomimage_services']): ?><?php echo $data['anchorbottomimage_services']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/bottomservices.png<?php endif; ?>" /></a>
        </div>
    </div>
    <!--end anchors-->
    
    <?php } ?>
    
    <!--start container-->
    <div class="container clearfix">
    
    	<!--start titlesection-->
        <div class="grid_12 titlesection <?php if ($data['introeffect_services'] == 1): echo $data['animation_services']; endif ?>">
			<h1><?php echo do_shortcode(stripslashes($data['title_services'])); ?></h1>
        </div>
        <!--end title section-->
        
        <!--start our services-->
		<?php 
		$qntservices = $data['select_services'];
		$services = new WP_Query( array( 'posts_per_page'=>$qntservices, 'post_status'=>'publish', 'post_type' => 'services' ));
		?>

		<?php if($services->have_posts()) :
            while($services->have_posts()) : $services->the_post(); ?>
        
                <!--Service-->
                <div class="<?php echo $data['grid_services']; ?>">
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
                <!--Service-->
        
            <?php endwhile; ?>
        <?php endif; ?>
        <!--end our services-->
    
    </div>
    <!--end container-->   
    
</section>
<!--end services-->