<?php 
	//prevent loading this file directly
	if (!empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SERVER-FILENAME']) == 'comments.php') {
		die(__('You cannot access this file directly','yahya-framework'));
	}

	//check if post is pwd protected
	if (post_password_required()) : ?>
	<p>
		<?php _e('This post is password protected. Enter pass to view the comments','yahya-framework'); ?>
		<?php return; ?>
	</p>

	<?php endif;

	if (have_comments()): ?>
        <a href="#respond" class="article-add-comments">+</a>
    	<h3><?php comments_number(__('No Comments','yahya-framework'),__('One Comment','yahya-framework'), __('% comments','yahya-framework')); ?></h3>

    	<ol class="commentslist">
    		<?php wp_list_comments('callback=minimal_comments'); ?>
    	</ol>
    	


    	<?php if (get_comment_pages_count()>1 && getoption('page_comments')) :?>
	    	<div class="comments-nav-section clearfix">
	                        
	            <p class="fl"><?php previous_comments_link(__('&larr; Older Comments','yahya-framework')); ?></p>
	            <p class="fr"><?php next_comments_link(__('&rarr; Newer Comments','yahya-framework')); ?></p>
	                        
	        </div> <!-- end comments-nav-section -->
	    <?php endif; ?>


	<?php elseif(!comments_open() && !is_page() && post_type_supports(get_post_type(),'comments')): ?>
		<p><?php _e('Comments are closed','yahya-framework'); ?></p>
	<?php endif; 

	//display comment form
	comment_form(); 

?>
