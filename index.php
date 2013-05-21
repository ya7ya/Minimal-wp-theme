<?php get_header(); ?>
 <!-- MAIN CONTENT -->
    <div class="container">
        <div class="row">
            <aside class="span3 main-sidebar">
                <?php get_sidebar(); ?>

            </aside>
            

            <div class="span9 article-container-fix">
                <div class="articles">
                <?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part('content', get_post_format()); ?>
                	

                <?php endwhile; else: ?>
                	
                	<h1>No posts in this blog</h1>
                <?php endif; ?>
                    
                    

                    <div class="articles-nav clearfix">

                        <p class="articles-nav-prev"><?php next_posts_link('&larr; Older Posts'); ?></p>
                        <p class="articles-nav-next"><?php previous_posts_link('&rarr; Newer Posts'); ?></p>
                    </div> <!-- End of articles-nav -->

                </div><!-- End of article -->

            </div> <!-- End of articles-nav -->
        </div>
    </div>



<?php get_footer(); ?>