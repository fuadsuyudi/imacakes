<?php get_header(); ?>

<!--start single-->
<section id="sectionarchive">

    <!--start container-->
    <div class="container clearfix">
		
		
        <!--start titlesection-->
        <div class="titlesection grid_12">			
            <p class="backtohome"><a href="<?php echo home_url(); ?>">BACK TO HOME</a></p>
            <h1><?php echo get_bloginfo('name'); ?></h1>
        </div>
        <!--end title section-->
		
		
        <!--start page-->
        <div class="grid_8">
		
		<?php if(have_posts()) :
            while(have_posts()) : the_post(); ?>
         
                <!--single content-->
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="titlepost"><?php the_title(); ?></h2>
                    <?php if (has_post_thumbnail()): ?>
                    	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a>
                    <?php endif ?>
                    
                    <div class="postcontent">
						<?php the_content(); ?>
                    </div>
                        
                    <!--start info post-->
                    <div class="infoandtagspost">
                    	<p class="infopost">Posted in: <?php the_category(', ') ?> | <?php the_time('j/m/y g:i A') ?> , by <?php the_author(); ?></p>
                        <p class="infotags"><?php the_tags(); ?></p>
                    </div>
                    <!--end infopost-->

					<?php comments_template(); ?>

                </div>
                <!--end single content-->
                
                
                
                <?php $args = array(
					'before'           => '<p>' . __('Pages:', 'sweetcake'),
					'after'            => '</p>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'number',
					'nextpagelink'     => __('Next page', 'sweetcake'),
					'previouspagelink' => __('Previous page', 'sweetcake'),
					'pagelink'         => '%',
					'echo'             => 1
				); ?>
                
                <?php wp_link_pages( $args ); ?> 
                
                
			
			<?php endwhile; ?>

		<?php endif; ?>
        <!--end all team-->
        
        
        </div>
        <!--end page-->
        
        
        <!--start sidebar--> 
        <div class="grid_4">
        	<?php if ( ! dynamic_sidebar( 'Sidebar' ) ) : ?><?php endif ?> 
        </div>
        <!--end sidebat-->
        
        
    </div>
    <!--end container-->   
    
</section>
<!--end single-->

<?php get_footer(); ?>