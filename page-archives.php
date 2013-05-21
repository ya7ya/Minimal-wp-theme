<?php 
/*
    Template Name: Archives Page

*/


?>


<?php get_header(); ?>
<!-- MAIN CONTENT -->
    <div class="container">
        <div class="row">
            <aside class="span3 main-sidebar">
                <?php get_sidebar(); ?>
            </aside>
            

    <div class="span9 article-container-fix">
        
        <div class="articles">
        	
            <article class="clearfix">
                
             	 <header>    
                                            
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <?php if(current_user_can('edit_post', $post->ID)){
                        edit_post_link(__('Edit This','yahya-framework'),'<p class="article-meta-extra">','</p>');
                    } ?>

                </header>

                <hr class="image-replacement">

                <h4><?php _e('Archives by Month','yahya-framework'); ?></h4>
                <ul>
                <?php wp_get_archives('type=monthly'); ?>
                </ul>

                <h4><?php _e('Archives by Subject','yahya-framework'); ?></h4>
                <ul>
                <?php wp_list_categories('title_li='); ?>
                </ul>


            </article>

        </div> <!-- end articles -->
                
    </div> <!-- end span9 -->


        </div> <!-- End of articles-nav -->
    </div>


<?php get_footer(); ?>