<?php get_header(); ?>	

<!--start archive-->
<section id="sectionarchive">

    <!--start container-->
    <div class="container clearfix">
 
		
		<!--start if-->
		<?php if(have_posts()) : ?>
        
            <!--start titlesection-->
            <div class="titlesection grid_12">
            	<p class="backtohome"><a href="<?php echo home_url(); ?>">BACK TO HOME</a></p>
                <h1>Search Results for " <?php the_search_query(); ?> "</h1>
            </div>
            <!--end title section-->
            
            <!-- start archive-->
            <div class="grid_8">
                
                <?php $btncolor = array("orange", "red", "green", "navi", "yellow", "blue"); $ibtncolor = 0; ?> <!--I create the array with the classes to be added to the buttons-->
                
                <?php while(have_posts()) : the_post(); ?>
                
                    <?php if($ibtncolor > 5): $ibtncolor = 0; endif; ?> <!--With this code, I decide the color of the buttons-->
             
                    <!--title-->
                    <div class="previewpost">
    
                        <?php if (has_post_thumbnail()): ?>
                            <div class="archivefeaturedimage"><?php the_post_thumbnail('archive-image'); ?></div>
                        <?php endif ?>
                        <h2><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?>
                        <p class="btnmore <?php echo $btncolor[$ibtncolor]; ?>"><a href="<?php the_permalink(); ?>">Read More</a></p>
                    
                    </div>
                    <!--end title-->
                    
                    <?php $ibtncolor ++ ?>
                    
                <?php endwhile; ?>
                
                
                <!--start navigation pages-->
                <?php  if (function_exists('wp_pagenavi')):?>
                
                    <!--need for plugin pagination -->
                    <div class="archivepagination">
                        <?php  wp_pagenavi(); ?> 
                    </div>
                    
                    <?php else: ?>
                    
                    <!--start navigation-->
                    <div class="archivenavigation">
                        <div class="archivenextpage red">
                            <?php next_posts_link('Next Page') ?>
                        </div>
                        <div class="archivepreviouspage red">
                            <?php previous_posts_link('Previous Page') ?>
                        </div>
                    </div>
                    <!--end navigation-->
                    
                <?php  endif ?>
                <!--end navigation pages-->
                
            </div>
            <!--end archive-->
      	
        
        	<?php else: ?>
            
            <!--start titlesection-->
            <div class="titlesection grid_12">
                <p class="backtohome"><a href="<?php echo home_url(); ?>">BACK TO HOME</a></p>
                <h1>Search Results for " <?php the_search_query(); ?> "</h1>
            </div>
            <!--end title section-->
            
            <!-- start archive-->
            <div class="grid_8">

                <!--no search result-->
                <div class="previewpost">
                    <h2>Not Found</h2>
                    <p>Sorry, but you are looking for something that isn't here.</p>
                </div>
                <!--no search result-->

            </div>
            <!--end archive-->
        
		<?php endif; ?>
        <!--end if-->
        
        
        
       	<!--start sidebar--> 
        <div class="grid_4">
        	<?php if ( ! dynamic_sidebar( 'Sidebar' ) ) : ?><?php endif ?> 
        </div>
        <!--end sidebat-->
        
        
    </div>
    <!--end container-->   
    
</section>
<!--end archive-->

<?php get_footer(); ?>