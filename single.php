<?php get_header(); ?>
<!-- MAIN CONTENT -->
    <div class="container">
        <div class="row">
            <aside class="span3 main-sidebar">
                <?php get_sidebar(); ?>
            </aside>
            

    <div class="span9 article-container-fix">
                
                <div class="articles">
                	<?php if(have_posts()): ?>
                	<?php while( have_posts() ) : the_post(); ?>
                    <article class="clearfix">
                        
                     	 <header>    
                            <?php 
                            	//Comments 
                            	if (comments_open() && !post_password_required()){
                            		comments_popup_link('0','1','%','article-meta-comments');
                            	}


                             ?>
                         

                            <p class="article-meta-categories"><?php the_category('&nbsp;/&nbsp;'); ?></p>                            
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <p class="article-meta-extra"><?php the_date(get_option('date_format'));print(' at '); the_time(get_option('time_format')); ?>, by <?php the_author_posts_link(); ?></p>

                        </header>

                        <?php if(has_post_thumbnail()): ?>

                        <figure class="article-preview-image">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        </figure>

                        <?php endif; ?>
                        <?php the_content(); ?>
                        
                        <?php if(has_tag()):  ?>
                        <p class="tag-container"><?php the_tags(); ?></p>
                        <?php endif; ?>

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

                    <div class="article-author">
                        
                        <h5>Article by <?php the_author_posts_link(); ?></h5>
                        <?php the_author_meta('description'); ?>
                    </div> <!-- end article-author -->
                    
                    <?php endwhile; else : ?>
                    	<article>
                    		<h1><?php _e('No Posts were found', 'yahya-framework'); ?></h1>
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