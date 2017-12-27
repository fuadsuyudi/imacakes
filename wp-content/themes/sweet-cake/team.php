<!--start team-->
<section id="sectionteam">
    
    <?php if($data['anchor_team'] == 1){ ?>
    
    <!--start anchors-->
    <div class="anchors">
    	<div class="contanchors">
            <a href="<?php echo $data['anchortoplink_team']; ?>"><img class="anchortop" alt="" src="<?php if($data['anchortopimage_team']): ?><?php echo $data['anchortopimage_team']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/topteam.png<?php endif; ?>" /></a>
            <a href="<?php echo $data['anchorbottomlink_team']; ?>"><img class="anchorbottom" alt="" src="<?php if($data['anchorbottomimage_team']): ?><?php echo $data['anchorbottomimage_team']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/bottomteam.png<?php endif; ?>" /></a>
        </div>
    </div>
    <!--end anchors-->
    
    <?php } ?>
    
    <!--start container-->
    <div class="container clearfix">
    
    	<!--start titlesection-->
        <div class="grid_12 titlesection <?php if ($data['introeffect_team'] == 1): echo $data['animation_team']; endif ?>">
        	<h1><?php echo do_shortcode(stripslashes($data['title_team'])); ?></h1>
        </div>
        <!--end title section-->
        
        <!--all team-->
		<?php
		$qntteam = $data['select_team']; 
		$team = new WP_Query( array( 'posts_per_page'=>$qntteam, 'post_status'=>'publish', 'post_type' => 'team' ));
		?>

		<?php if($team->have_posts()) : ?>
		
			<?php if($qntteam != 4 and $qntteam != 8 and $qntteam != 12): ?>
				<div class="centersinglegrid">
			<?php endif; ?>
			
				<?php while($team->have_posts()) : $team->the_post(); ?>
			 
						<!--start person-->
						<div class="grid_3">
							<div class="avatarteam">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
							</div>
							<?php the_content(); ?>
						</div>
						<!--end person-->

				<?php endwhile; ?>
			
			<?php if($qntteam != 4 and $qntteam != 8 and $qntteam != 12): ?>
				</div>
			<?php endif; ?>
			
        <?php endif; ?>
        <!--end all team-->
        
    </div>
    <!--end container-->   
    
</section>
<!--end team-->