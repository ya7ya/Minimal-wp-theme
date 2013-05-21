<?php 
/*
    Template Name: Contact Page

*/


?>

<?php 
    function isemail($email) {
    return preg_match('|^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]{2,})+$|i', $email);
}

    $error_name= false;
    $error_email=false;
    $error_message=false;

    if ($_POST['contact-name']){
      
      //init variables for form fields
        $name = '';
        $email='';
        $company='';
        $website='';
        $Message='';
        $reciever_email='';

    //Get the stuff
        if(trim($_POST['contact-name'])===''){
            $error_name=true;
        }
        else{
            $name = trim($_POST['contact-name']);
        }

        if(trim($_POST['contact-email'])===''|| !isemail(trim($_POST['contact-email'])) ){
            $error_email=true;
        }
        else{
            $email = trim($_POST['contact-email']);
        }

        if(trim($_POST['contact-message'])===''){
            $error_message=true;
        }
        else{

            $Message = stripslashes(trim($_POST['contact-message']));
        }

        $company = trim($_POST['contact-company']);
        $website = trim($_POST['contact-url']);
        

    //Check for error
        if (!$error_name || !$error_email || $error_message){
            
            $reciever_email = 'ya7yaz@gmail.com';
            $subject = 'You have been contacted by '.$name;
            $body = 'You have been contacted by '.$name.' Their message is: '. PHP_EOL. PHP_EOL;
            $body.= $Message. PHP_EOL. PHP_EOL;
            $body.= " to contact $name via email at $email".PHP_EOL;
            if($website){
                $body.="website : $website";
            }

            $headers = "From $email".PHP_EOL;
            $headers .= "Reply-To: $email".PHP_EOL;
            $headers .= "MIME-Version: 1.0".PHP_EOL;
            $headers .= "Content-type: text/plain; charset=utf-8".PHP_EOL;
            $headers .= "Content-Transfer-Encoding: quoted-printable".PHP_EOL;

            if (mail($reciever_email, $subject, $body, $headers)){
                $email_sent = true;
            }else{
                $email_sent = false;
            }
        }



    }

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
        	<?php if(have_posts()): ?>
        	<?php while( have_posts() ) : the_post(); ?>
            <article class="clearfix">
                
             	 <header>    
                                            
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <?php if(current_user_can('edit_post', $post->ID)){
                        edit_post_link(__('Edit This','yahya-framework'),'<p class="article-meta-extra">','</p>');
                    } ?>

                </header>

                <?php if($email_sent==true): ?>
                    <h3><?php _e('Message Sent :)','yahya-framework'); ?></h3>
                <?php else: ?>
                    <h3><?php _e('Message NOT Sent :(','yahya-framework'); ?></h3>
                <?php endif; ?>

                <hr class="image-replacement">
                <?php the_content(); ?>
                <hr/>
                <div class="container">
                <form id="contact-form" action="<?php the_permalink(); ?>" method="POST" >
                <div class="row controls-row">
                    <div class="span6 contact-div">
                        <input type="text" name="contact-name" id="contact-name" placeholder="name" />
                    </div>
                    <div class="span6 contact-div">
                        <input type="text" id="contact-company" name="contact-company" placeholder="company" />
                    </div>
                </div>
                <div class="row controls-row">
                    <div class="span6 contact-div">
                        <input type="text" name="contact-email" id="contact-email" placeholder="email" />
                    </div>
                    <div class="span6">
                        <input type="text" id="contact-url" name="contact-url" placeholder="website" />
                    </div>
                </div>
                <div class="row controls-row">
                    <div class="span6">
                        <textarea placeholder="Message" id="contact-message" name="contact-message"></textarea>
                    </div>
                </div>
                <div class="row controls-row">
                    <div class="span12">
                        <input class="btn btn-large btn-success" type="submit" value="Send Message" />
                    </div>
                </div>
            </form>
            </div>

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