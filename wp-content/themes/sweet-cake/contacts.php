<!--start contacts-->
<footer id="contacts">
    
    <div class="topwavescontacts"></div> <!--waves-->
    
    <!--anchor back to top-->
    <a class="backtotop" href="#navigationmenu">
    	<img alt="" src="<?php echo get_template_directory_uri(); ?>/img/anchors/backtotop.png" />
    </a>
    <!--end anchor back to top-->
    
    <!--all markers-->
    <div id="markers">
    
    	<!--big marker-->
        <div id="bigmarker">
            <h2><?php echo $data['title_contacts']; ?></h2>
            <ul>
                
                <?php if ($data['address_contacts']): ?>
                <li>
                    <p class="iconhome"><?php echo $data['address_contacts']; ?></p> <!--insert your address-->
                </li>
				<?php endif; ?>
                
                <?php if ($data['telephone_contacts']): ?>
                <li>
                    <p class="iconphone"><?php echo $data['telephone_contacts']; ?></p> <!--insert your telephone number-->
                </li>
                <?php endif; ?>
                
                <?php if ($data['fax_contacts']): ?>
                <li>
                    <p class="iconfax"><?php echo $data['fax_contacts']; ?></p> <!--insert your fax number-->
                </li>
                <?php endif; ?>
                
                <?php if ($data['mail_contacts']): ?>
                <li>
                    <p class="iconmail noborder">Mail:
                    	<a title="Contact Me :)" href="mailto:<?php echo $data['mail_contacts']; ?>"><?php echo $data['mail_contacts']; ?></a> <!--enter you email and remember to change the mailto: links-->
                    </p>
                </li>
                <?php endif; ?>
                
            </ul>
        </div>
        <!--end big marker-->
        
        <!--little marker-->
        <div id="littlemarker" class="rotate">
        	<img alt="" src="<?php echo get_template_directory_uri(); ?>/img/section-contact/littlemarker.png" />
        </div>
        <!--end little marker-->
        
        <!--little marker close: need for js effect-->
        <div id="littlemarkerclose" class="rotate">
        	<img alt="" src="<?php echo get_template_directory_uri(); ?>/img/section-contact/littlemarkerclose.png" />
        </div>
        <!--end little marker-->
        
    </div>
    <!--end all markers--> 
    
	<!--google maps-->
    <script type='text/javascript'>
		/* <![CDATA[ */
		var MY_MAPTYPE_ID = 'custom_style';
		
		var mysweetmap = new google.maps.LatLng(<?php echo $data['coordinatesgooglemaps_contacts']; ?>);
		
		var mapOptions = {
			zoom: <?php echo $data['zoom_contacts']; ?>,
			center: mysweetmap,
			<?php if($data['draggable_contacts'] != 1): echo "draggable: false,"; endif; ?>
			disableDefaultUI: true,
			scrollwheel: false,
			mapTypeControlOptions: {
			  mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
			},
			mapTypeId: MY_MAPTYPE_ID
		  };
		

		/* ]]> */
	</script>
    <div id="map-canvas"></div>
    <!--google maps-->
     
</footer>
<!--end contacts-->

<?php if ($data['section_copyright']): ?>
<!--start copyright-->
<div class="sectioncopyright">
	<p><?php echo $data['text_copyright']; ?></p>
</div>
<!--end copyright-->
<?php endif; ?>