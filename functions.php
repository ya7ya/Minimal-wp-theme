<?php

/************************
Theme Constants
************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT.'/assets/img');
define('JS', THEMEROOT.'/assets/js');

/************************************************
/* Add Theme Support 
***********************************************/
if (function_exists('add_theme_support')){
	
	//Featured Image support
	add_theme_support( 'post-thumbnails' ); 
	add_theme_support( 'post-formats', array('link', 'quote', 'gallery'));
}




/*******************************************
Menus
********************************************/
function register_my_menus(){
	register_nav_menus(array(
		'top-menu'	=> 'Top Menu',
		'main-menu' => 'Main Menu'
	));
}

add_action('init', 'register_my_menus');


/**************************************
 Sidebars
***************************************/
if (function_exists('register_sidebar')){
	register_sidebar(
		
		array(
			'name' => __('Main Sidebar', 'yahya-framework'),
			'id' => 'main-sidebar',
			'description' => __('The main sidebar area','yahya-framework'),
			'before_widget' => '<div class="sidebar-widget">',
			'after_widget' =>	'</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		));



	register_sidebar(
		
		array(
			'name' => __('Left Footer', 'yahya-framework'),
			'id' => 'left-footer',
			'description' => __('The footer left area','yahya-framework'),
			'before_widget' => '<div class="footer-sidebar-widget span3">',
			'after_widget' =>	'</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		));

	register_sidebar(
		
		array(
			'name' => __('Right Footer', 'yahya-framework'),
			'id' => 'right-footer',
			'description' => __('The footer right area','yahya-framework'),
			'before_widget' => '<div class="footer-sidebar-widget span6">',
			'after_widget' =>	'</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		));
}


/***************************************
/* Comments display function 
***************************************/

function minimal_comments($comment, $args, $depth){

	if(get_comment_type() =='pingback' || get_comment_type() == 'trackback') : ?>

		<li class="pingback" id="comment-<?php comment_ID(); ?>">
	        <article <?php comment_class('clearfix'); ?>>
	            <header>
	                <h5><?php _e('Pingback:','yahya-framework'); ?></h5>
	                <p><?php edit_comment_link(); ?></p>
	            </header>

	            <?php comment_author_link(); ?>
	        </article>   
	       </li>

	<?php elseif(get_comment_type()== 'comment'): ?>

		<li id="comment-<?php comment_ID(); ?>">
	        <article <?php comment_class('clearfix'); ?>>
	            <header>
	                <h5><?php comment_author_link(); ?></h5>
	                <p><span><?php comment_date(); ?> at <?php comment_time(); ?> - </span><?php comment_reply_link(array_merge($args,array('depth' => $depth, 'max_depth' =>$args['max_depth']))); ?></p>
	            </header>
	            
	            <figure class="comment-avatar">
	                <?php 
	                	$avatar_size = 80;
	                	if ($comment->comment_parent!=0) {
	                		$avatar_size = 64;
	                	}

	                	echo get_avatar($comment, $avatar_size);
	                 ?>
	            </figure>
	            
	            <?php if($comment-> comment_approved ='0') : ?>
	            	<p class="awaiting-moderation"><?php _e('Your comment is awaiting moderation.','yahya-framework'); ?></p>
	            <?php endif; ?>
	            
	            <?php comment_text(); ?>
	        </article>                          

	<?php endif;

}
/**********************************************
Javascript Linking
*********************************************/

function js_links(){

	wp_enqueue_script(
		'jquery'
		);
	
	wp_enqueue_script(
		'bootstrap',
		JS.'/vendor/bootstrap.min.js'
		);

	wp_enqueue_script(
		'waypoints',
		JS.'/vendor/waypoints.min.js',
		array('jquery')
		);

	wp_enqueue_script(
		'waypoints-sticky',
		JS.'/vendor/waypoints-sticky.min.js',
		array('jquery','waypoints')
		);

	wp_enqueue_script(
		'jquery-masonry'
		);

	wp_enqueue_script(
		'main-script',
		JS.'/main.js',
		array('jquery')
		);
}

add_action('wp_enqueue_scripts','js_links');


function jquery_cdn() {
   if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js', false, '2.0.0');
      wp_enqueue_script('jquery');
      }
   }
add_action('init', 'jquery_cdn');

function bootstrap_cdn() {
   if (!is_admin()) {
      wp_deregister_script('bootstrap');
      wp_register_script('bootstrap', '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js', false, '2.3.2');
      wp_enqueue_script('bootstrap');
      }
   }
add_action('init', 'bootstrap_cdn');

function waypoints_cdn() {
   if (!is_admin()) {
      wp_deregister_script('waypoints');
      wp_register_script('waypoints', '//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.2/waypoints.min.js', false, '2.0.2');
      wp_enqueue_script('waypoints');
      }
   }
add_action('init', 'waypoints_cdn');

function modernizr_cdn() {
   if (!is_admin()) {
      wp_deregister_script('modernizr');
      wp_register_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', false, '2.6.2');
      wp_enqueue_script('modernizr');
      }
   }
add_action('init', 'modernizr_cdn');

function masonry_cdn() {
   if (!is_admin()) {
      wp_deregister_script('jquery-masonry');
      wp_register_script('jquery-masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/2.1.08/jquery.masonry.min.js', false, '2.1.08');
      wp_enqueue_script('jquery-masonry');
      }
   }
add_action('init', 'masonry_cdn');


/*********************************************
/* Removing queries from static domains
/********************************************/

function _remove_script_version( $src ){
    $parts = explode( '?ver', $src );
        return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

?>