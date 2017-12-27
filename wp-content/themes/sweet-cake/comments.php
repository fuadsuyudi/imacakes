<?php if ( have_comments() ) : ?>

<!--start allcomments-->
<div class="allcomments">	
	
    <h3 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>

	<ul class="commentlist">
		<?php wp_list_comments(); ?>
    </ul>
	
    <!--start navigation comment-->
    <div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
    <!--end navigation comment-->
    
</div>
<!--end allcomments-->

<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) :
		// If comments are open, but there are no comments.
	else : // comments are closed
	endif;
endif; 
?>


<!--start comment form-->
<?php comment_form(); ?>
<!--end comment form-->