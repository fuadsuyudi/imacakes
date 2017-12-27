<!--start navigationmenu-->
<header id="navigationmenu">
	
 	<!--start container-->
    <div class="container clearfix">
        
        <?php 
		$layout_header = $data['navigation_builder']['enabled'];
		
		if ($layout_header):
			foreach ($layout_header as $key=>$value){
				switch ($key){
					
					case 'menu_left': 
					?>
                    <!--left navigation-->
                    <div class="<?php echo $data['grid_leftmenu']; ?>">
                        <nav class="leftnavigation <?php if ($data['introeffect_header'] == 1): echo $data['animation_header']; endif ?>">
                        <?php wp_nav_menu( array( 'theme_location' => 'left-menu' ) ); ?>  
                        </nav>
                    </div>
                    <!--end left navigation-->
                    
                    
                    <?php	
					break;
					case 'logo': 
					?>
                    <!--start logo-->
                    <div class="<?php echo $data['grid_logo']; ?> logo">
                        <img alt="" src="<?php if($data['logo_header']): ?><?php echo $data['logo_header']; ?><?php endif; ?>" />
                    </div>
                    <!--end logo-->
                    
                    
                    <?php
					break;
					case 'menu_right': 
					?>
                    <!--right navigation-->
                    <div class="<?php echo $data['grid_rightmenu']; ?>">
                        <nav class="rightnavigation <?php if ($data['introeffect_header'] == 1): echo $data['animation_header']; endif ?>">
                            <?php wp_nav_menu( array( 'theme_location' => 'right-menu' ) ); ?>    
                        </nav>
                    </div>
                    <!--end right navigation-->
                    
                    
                    <?php
					break;
				
				}
			}
		endif;
		?>

    </div>
    <!--end container-->   
    
</header>
<!--end navigationmenu-->