<!--start skills-->
<section id="sectionskills">
    
    <?php if($data['anchor_skills'] == 1){ ?>
    
    <!--start anchors-->
    <div class="anchors">
    	<div class="contanchors">
            <a href="<?php echo $data['anchortoplink_skills']; ?>"><img class="anchortop" alt="" src="<?php if($data['anchortopimage_skills']): ?><?php echo $data['anchortopimage_skills']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/topskills.png<?php endif; ?>" /></a>
            <a href="<?php echo $data['anchorbottomlink_skills']; ?>"><img class="anchorbottom" alt="" src="<?php if($data['anchorbottomimage_skills']): ?><?php echo $data['anchorbottomimage_skills']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/bottomskills.png<?php endif; ?>" /></a>
        </div>
    </div>
    <!--end anchors-->
    
    <?php } ?>
    
    <!--start container-->
    <div class="container clearfix">
    
    	<!--start titlesection-->
        <div class="grid_12 titlesection <?php if ($data['introeffect_skills'] == 1): echo $data['animation_skills']; endif ?>">
        	<h1><?php echo do_shortcode(stripslashes($data['title_skills'])); ?></h1>
        </div>
        <!--end title section-->
        
        <!--start left content-->
        <div class="grid_5">
            
            <!--start all skills-->
			<?php 
            $skills = new WP_Query( array( 'posts_per_page'=>3, 'post_status'=>'publish', 'post_type' => 'skills' ));
            ?>
    
            <?php if($skills->have_posts()) :
                $i=0;
				while($skills->have_posts()) : $skills->the_post(); ?>
             
                    <!--start skill-->
                    <div class="skilldescription">
                        <?php
							if ($i == 0){
								if ($data['operator_skills'] == 1){
									echo '<div id="operator"></div>';	
								}
							}
						?>
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                    <!--end skill-->
                    
                    <?php $i++; ?>
    
                <?php endwhile; 
				$i=0;
			endif; ?>
            <!--end all skills-->
            
        </div>
        <!--end left content-->
        
        <!--start clip-->
        <div class="grid_2 clip">
        	<img class="opacity" alt="" src="<?php if($data['clip_skills']): ?><?php echo $data['clip_skills']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/section-skills/clip.png<?php endif; ?>" />
        </div>
        <!--end clip-->
        
        <!--start progresbar-->
        <div class="grid_5">
            <div id="allprogresbar">
                <?php echo do_shortcode(stripslashes($data['bar_skills'])); ?>
            </div>
        </div>
        <!--end progresbar-->
    
    </div>
    <!--end container-->   
    
</section>
<!--end skills-->