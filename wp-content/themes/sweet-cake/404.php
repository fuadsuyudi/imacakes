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
        
        <!--start content-->
        <div class="grid_8">

            <!--single content-->
            <div id="post" class="post">
                <h2 class="pagenotfound">404 - Page not found</h2>
                <div class="postcontent">
                    <p>It seems we can't find what you're looking for.</p>
                </div>
            </div>
            <!--end single content-->

        </div>
        <!--end content-->
        
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