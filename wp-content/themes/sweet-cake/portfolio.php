<!--start portfolio-->
<section id="sectionportfolio">
    
    <?php if($data['anchor_portfolio'] == 1){ ?>
    
    <!--start anchors-->
    <div class="anchors">
    	<div class="contanchors">
            <a href="<?php echo $data['anchortoplink_portfolio']; ?>"><img class="anchortop" alt="" src="<?php if($data['anchortopimage_portfolio']): ?><?php echo $data['anchortopimage_portfolio']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/topportfolio.png<?php endif; ?>" /></a>
            <a href="<?php echo $data['anchorbottomlink_portfolio']; ?>"><img class="anchorbottom" alt="" src="<?php if($data['anchorbottomimage_portfolio']): ?><?php echo $data['anchorbottomimage_portfolio']; ?><?php else: ?><?php echo get_template_directory_uri(); ?>/img/anchors/bottomportfolio.png<?php endif; ?>" /></a>
        </div>
    </div>
    <!--end anchors-->
    
    <?php } ?>
    
 	<!--start container-->
    <div class="container clearfix">
    
    	<!--start titlesection-->
        <div class="grid_12 titlesection <?php if ($data['introeffect_portfolio'] == 1): echo $data['animation_portfolio']; endif ?>">
        	<h1><?php echo do_shortcode(stripslashes($data['title_portfolio'])); ?></h1>
        </div>
        <!--end title section-->
        
        <!--start options-->
        <div class="grid_12">
            <div id="options" class="clear">
                <ul id="filters" class="option-set clearfix" data-option-key="filter">
                    <li class="orange"><a href="#filter" data-option-value="*" class="selected">Show all</a></li>
                    
                    <!--start all categories-->
					<?php
					$args=array(
						'type' => 'attachment',
						'child_of'                 => 0,
						'orderby'                  => 'name',
						'order'                    => 'ASC',
						'hide_empty'               => 0,
						'hierarchical'             => 1,
						'post_status'			   => 'inherit',
						'taxonomy'                 => 'portfolio'
					);
					$categories=get_categories($args);
					
					foreach($categories as $category) { ?>
						<li><a style="background-color:<?php echo $category->description; ?>;" href="#filter" data-option-value=".<?php echo $category->slug; ?>"><?php echo $category->name ?></a></li>
					<?php } ?>
                    <!--end all categories-->
                    
                </ul>
            </div>
        </div>
        <!--end options-->
              
        <!--start images-->
        <div id="containerisotope" class="clear">
            
            <?php
            foreach($categories as $category) {
                $args = array(
                    'post_type' => 'attachment',
                    'posts_per_page' => -1,
                    'post_status' => 'inherit',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'portfolio',
                            'field' => 'slug',
                            'terms' => $category -> slug
                        )
                    )
                );
                
				
                $attachments = get_posts($args);
                if ($attachments) {
                    foreach ( $attachments as $attachment ) { ?>
                    
						<?php
                        $id = $attachment->ID;
                        $big_image = wp_get_attachment_image_src($id, '');
                        $thumb_image = wp_get_attachment_image_src($id, 'portfolio-thumbnail');
                        $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                        $image_title = $attachment->post_title;
                        $caption = $attachment->post_excerpt;
                        $description = str_replace('"', '\'',$attachment->post_content);
                        ?>
                        
                        <!--element-->
                        <div class="element <?php echo $category -> slug; ?>" data-category="<?php echo $category -> slug; ?>">
                            
                            <!--start check if alt is declared-->
							<?php if (!empty($alt)) { ?>
								<a href="<?php echo $alt; ?>">
							<?php } else { ?>
								<a class="alttooltip" title="<?php echo $description; ?>" data-rel="prettyPhoto[]" href="<?php echo $big_image[0]; ?>">	
							<?php } ?>
                            <!--end if-->
                            
                                <img alt="<?php echo $alt; ?>" class="imgwork" src="<?php echo $thumb_image[0]; ?>" />
                            </a>
                            <div class="worksarrow">
                                <img alt="" src="<?php echo get_template_directory_uri(); ?>/img/section-works/arrow.png" />
                            </div>
                            <h2><?php echo $image_title; ?></h2>
                            <p><?php echo $caption; ?></p>
                            
                            <div class="worksbottom"></div>
                        </div>
                        <!--element-->
                    
                	<?php } ?>
				<?php } ?>
			<?php } ?>
                    
        
        </div>
        <!--end images-->
    
    </div>
    <!--end container-->   
    
</section>
<!--end portfolio-->