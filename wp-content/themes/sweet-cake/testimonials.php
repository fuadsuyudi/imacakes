<!--start testimonials-->
<section id="testimonials">
	    
    <?php if($data['anchor_testimonials'] == 1){ ?>
    
    <!--start anchors-->
    <div class="anchors">
    	<div class="contanchors">
            <a href="<?php echo $data['anchortoplink_testimonials']; ?>"><img class="anchortop" alt="" src="<?php if($data['anchortopimage_testimonials']): ?><?php echo $data['anchortopimage_testimonials']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/toptestimonials.png<?php endif; ?>" /></a>
            <a href="<?php echo $data['anchorbottomlink_testimonials']; ?>"><img class="anchorbottom" alt="" src="<?php if($data['anchorbottomimage_testimonials']): ?><?php echo $data['anchorbottomimage_testimonials']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/bottomtestimonials.png<?php endif; ?>" /></a>
        </div>
    </div>
    <!--end anchors-->
    
    <?php } ?>
    
    <!--start dark filter-->
	<div id="darkfilter">	
        
        <!--start container-->
        <div class="container clearfix">
        
            <!--top quote-->
            <div class="grid_12 topquote">
            	<img alt="" src="<?php if($data['topquote_testimonials']): ?><?php echo $data['topquote_testimonials']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/section-testimonials/topquote.png<?php endif; ?>" />
            </div>	
            <!--top quote-->
            
            <!--testimonials-->
			<?php 
			$testimonials=new WP_Query(
				array(
					'posts_per_page'=>2,
					'post_status'=>'publish',
					'post_type' => 'testimonials'
				)
			);
			?>
	
			<?php if($testimonials->have_posts()) :
				$i=0;
				while($testimonials->have_posts()) : $testimonials->the_post(); ?>

                    <!--start testimonial-->
                    <div class="grid_6 <?php if ($i % 2 == 0) { echo "left"; }else{ echo "right";} ?>testimonials <?php if ($data['introeffect_testimonials'] == 1): echo $data['animation_testimonials']; endif ?>">
                    	<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
                    </div>
                    <!--end testimonial-->
                    
                    <?php $i++; ?>
			
				<?php endwhile; 
				$i=0;
			endif; ?>
            <!--end testimonials-->	
            
            <!--bottom quote-->
            <div class="grid_12 bottomquote">
                <img alt="" src="<?php if($data['bottomquote_testimonials']): ?><?php echo $data['bottomquote_testimonials']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/section-testimonials/bottomquote.png<?php endif; ?>" />
            </div>
            <!--bottom quote-->
        
        </div>
        <!--end container--> 
    
    </div>
    <!--end dark filter-->
      
</section>
<!--end testimonials-->