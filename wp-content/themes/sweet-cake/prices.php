<!--start prices-->
<section id="sectionprices">
    
    <?php if($data['anchor_prices'] == 1){ ?>
    
    <!--start anchors-->
    <div class="anchors">
    	<div class="contanchors">
            <a href="<?php echo $data['anchortoplink_prices']; ?>"><img class="anchortop" alt="" src="<?php if($data['anchortopimage_prices']): ?><?php echo $data['anchortopimage_prices']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/topprices.png<?php endif; ?>" /></a>
            <a href="<?php echo $data['anchorbottomlink_prices']; ?>"><img class="anchorbottom" alt="" src="<?php if($data['anchorbottomimage_prices']): ?><?php echo $data['anchorbottomimage_prices']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/bottomprices.png<?php endif; ?>" /></a>
        </div>
    </div>
    <!--end anchors-->
    
    <?php } ?>
    
    <!--start container-->
    <div class="container clearfix">
    
    	<!--start titlesection-->
        <div class="grid_12 titlesection <?php if ($data['introeffect_prices'] == 1): echo $data['animation_prices']; endif ?>">
        	<h1><?php echo do_shortcode(stripslashes($data['title_prices'])); ?></h1>
        </div>
        <!--end title section-->
        
        <!--prices-->
		<?php 
		$qntprices = $data['select_prices'];
		$prices = new WP_Query( array( 'posts_per_page'=>$qntprices, 'post_status'=>'publish', 'post_type' => 'prices' ));
		?>

		<?php if($prices->have_posts()) : ?>
            
			<?php if($qntprices != 4 and $qntprices != 8 and $qntprices != 12): ?>
				<div class="centersinglegrid">
			<?php endif; ?>
			
				<?php while($prices->have_posts()) : $prices->the_post(); ?>
			 
						<!--price-->
						<div class="grid_3 expand">
							<div class="logoprice">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
							</div>
							<?php the_content(); ?>
						</div>
						<!--price-->

				<?php endwhile; ?>
        
			<?php if($qntprices != 4 and $qntprices != 8 and $qntprices != 12): ?>
				<div class="centersinglegrid">
			<?php endif; ?>
		
		<?php endif; ?>
        <!--end prices-->
        
    </div>
    <!--end container-->   
    
</section>
<!--end prices-->