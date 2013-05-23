<?php 
/* Link POSTS */

 ?>


<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">
                        <header>    
							
							<span class="post-format-url" aria-hidden="true" data-icon="&#xe013;"></span>

                            <p class="article-meta-categories"><?php the_category('&nbsp;/&nbsp;'); ?></p>                         
                            <p class="article-meta-extra"><?php the_date(get_option('date_format'));print(' at '); the_time(get_option('time_format')); ?>, by <?php the_author_posts_link(); ?></p>

                        </header>

                        <?php if(has_post_thumbnail()): ?>

                        <figure class="article-preview-image">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        </figure>

                    	<?php endif; ?>

                    	<div class="url-container">
                        <p><?php the_title(); ?></p>
                    	<span><?php the_content(); ?></span>

                        </div> <!-- end of url container -->

                        
                    </article>

                    <hr class="fancy-hr" />