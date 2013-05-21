<?php 
/*
    Template Name: Full Width Page

*/


?>

<?php get_header(); ?>
<!-- MAIN CONTENT -->
    <div class="container">
        <div class="row">
            

    <div class="span12 article-container-fix">
                
                <div class="articles">
                	<?php if(have_posts()): ?>
                	<?php while( have_posts() ) : the_post(); ?>
                    <article class="clearfix">
                        
                     	 <header>    
                                                    
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <?php if(current_user_can('edit_post', $post->ID)){
                                edit_post_link(__('Edit This','yahya-framework'),'<p class="article-meta-extra">','</p>');
                            } ?>

                        </header>

                        <hr class="image-replacement">
                        <?php the_content(); ?>
                        

                        <div class="pagination pagination-centered">
                            <ul>

                        		<?php 
                        			$args = array(
                        				'before' => '<li>',
                        				'after' => '</li>',
                        				'pagelink' => 'Page %'
                        			);

                        		wp_link_pages($args); ?>
                                
                            </ul>
                        </div>
                        
                    </article>

                        
                    <?php endwhile; else : ?>
                    	<article>
                    		<h1><?php _e('No Pages were found', 'yahya-framework'); ?></h1>
                    	</article>
                    <?php endif; ?>

                </div> <!-- end articles -->
                
                <div class="comments-area" id="comments">
                    <?php comments_template('', true); ?>
                   
                    
                </div> <!-- end comments-area -->
                
            </div> <!-- end span9 -->


            </div> <!-- End of articles-nav -->
        </div>
    </div>

<?php get_footer(); ?>