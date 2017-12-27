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
                
				<?php if (is_category()): ?>				
                    <h1>Category: <?php single_cat_title(); ?></h1>
                
				<?php elseif (is_tag()): ?>
                    <h1>Tag: <?php single_tag_title() ?></h1>
                
				<?php elseif (is_home()): ?>
                    <h1>Archive</h1>
                
				<?php elseif (is_month()): ?>
                    <h1>Archive for <?php single_month_title(); ?></h1>
                
				<?php elseif (is_author()): ?>
                    <h1>Author Archive</h1>
                
				<?php else: ?>
                	<h1>Archive</h1>
				
				<?php endif ?>
            
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
                <?php wpex_pagination(); ?>
                <!--end navigation pages-->
                
                
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