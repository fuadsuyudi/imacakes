<!--start oursocial-->
<section id="oursocial">
	
    <?php if($data['anchor_social'] == 1){ ?>
    
    <!--start anchors-->
    <div class="anchors">
    	<div class="contanchors">
            <a href="<?php echo $data['anchortoplink_social']; ?>"><img class="anchortop" alt="" src="<?php if($data['anchortopimage_social']): ?><?php echo $data['anchortopimage_social']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/topsocial.png<?php endif; ?>" /></a>
            <a href="<?php echo $data['anchorbottomlink_social']; ?>"><img class="anchorbottom" alt="" src="<?php if($data['anchorbottomimage_social']): ?><?php echo $data['anchorbottomimage_social']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/bottomsocial.png<?php endif; ?>" /></a>
        </div>
    </div>
    <!--end anchors-->
    
    <?php } ?>
    
    <!--start container-->
    <div class="container clearfix">
    
    	<!--start titlesection-->
        <div class="grid_12 titlesection <?php if ($data['introeffect_social'] == 1): echo $data['animation_social']; endif ?>">
        	<h1><?php echo do_shortcode(stripslashes($data['title_social'])); ?></h1>
        </div>
        <!--end title section-->
        
        <!--start social icons-->
		<?php
		$qntsocial = $data['select_social']; 
		$social = new WP_Query( array( 'posts_per_page'=>$qntsocial, 'post_status'=>'publish', 'post_type' => 'social' ));
		?>

		<?php if($social->have_posts()) :
            while($social->have_posts()) : $social->the_post(); ?>
                        
                <!--start social-->
                <div class="<?php echo $data['grid_social']; ?>">
                    <?php the_content(); ?>
                </div>
                <!--end social-->
        
            <?php endwhile; ?>
        <?php endif; ?>
        <!--end social icons-->
    
    </div>
    <!--end container-->   
    
</section>
<!--end oursocial-->