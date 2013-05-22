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
    <section id="about" class="section-block first-block">

        <!-- Grabbing the content of the About page -->
        <?php $about = get_page_by_title('About'); 

            echo $about->post_content;?>

    </section><!-- End of About Section -->
<!-- =================================================================
    ================================================================-->

    <!--Portfolio -->
    <section id="portfolio" class="section-block">
        <h1 class="section-title">Portfolio<small>Coming Soon (I'm working on it. gimmie a break, I just graduated!!) </small></h1>
        
        <div class='container-fluid project' id="project-container">
        <?php 
            
            $args = array(
                    'category_name' => 'projects',
                );

            $projects = new WP_Query($args); 
            
            #The Loop 
            if($projects -> have_posts()):
                while ($projects -> have_posts()): $projects ->the_post(); ?>
                    
                    
                       <div <?php post_class('span6 project-block') ?> id="project-container-<?php the_ID(); ?>">
                        <p class="project-meta-cat"><?php $categories = get_the_category(); echo $categories[0]->name; ?></p>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php if(has_post_thumbnail()): ?>

                        <figure class="article-preview-image">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        </figure>

                        <?php endif; ?>
                    
                        <?php the_excerpt(); ?>

                       </div><!-- END of project-block -->
                    
                <?php endwhile; ?>
            
            <?php else: ?>
                <p>No projects.. WOrking on it :) </p>
            <?php endif; ?>
             </div>

    </section><!-- End of Portfolio -->

<!-- =================================================================
    ================================================================-->

    <!--Resume -->
    <section id="resume" class="section-block">
        <h1 class="section-title">Resume</h1>
        <div class="container">
            <div class="row">
                <div class="span3 skill-list">Skill list
                    <div class="inner-container">
                        <h3>Languages:</h3>
                        <div class="skill-block">
                         <div class="skill">
                            <h6 class="name">Java</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 65%"></div>
                            </div></div>
                        <div class="skill">
                            <h6 class="name">Python</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 75%"></div>
                            </div></div>
                         <div class="skill">
                            <h6 class="name">PHP</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 85%"></div>
                            </div></div>
                        <div class="skill">
                            <h6 class="name">Ruby (Ruby On Rails)</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 55%"></div>
                            </div></div>
                         <div class="skill">
                            <h6 class="name">C/C++</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 45%"></div>
                            </div></div>
                        </div>

                        <h3>Web Tech:</h3>
                        <div class="skill-block">
                        <div class="skill">
                            <h6 class="name">Wordpress</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 75%"></div>
                            </div></div>
                        <div class="skill">
                            <h6 class="name">HTML</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 85%"></div>
                            </div></div>
                        <div class="skill">
                            <h6 class="name">CSS3 (SASS)</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 75%"></div>
                            </div></div>
                        <div class="skill">
                            <h6 class="name">Javascript (jQuery)</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 65%"></div>
                            </div></div>
                        </div>

                        <h3>Software & Tools:</h3>
                        <div class="skill-block">
                        <h5>Adobe CS6</h5>
                        <div class="skill">
                            <h6 class="name">Photoshop</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 65%"></div>
                            </div></div>
                        <div class="skill">
                            <h6 class="name">Fireworks</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 75%"></div>
                            </div></div>

                        <h5>IDE / Editors</h5>
                        <div class="skill">
                            <h6 class="name">Eclipse</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 75%"></div>
                            </div></div>
                        <div class="skill">
                            <h6 class="name">Sublime Text 2</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 65%"></div>
                            </div></div>

                        <h5>Other:</h5>
                        <div class="skill">
                            <h6 class="name">Git</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 75%"></div>
                            </div></div>
                        <div class="skill">
                            <h6 class="name">VirtualBox</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 90%"></div>
                            </div></div>
                        </div>

                    </div>
                </div> <!-- END of Skill List-->

                <div class="span9 article-container-fix">
                    <div class="inner-container">
                        <h2> Work Experience </h2>

                        <?php 

                        $args = array(
                                'category_name' => 'experience',
                            );

                        $experiences = new WP_Query($args); 
                        
                        #The Loop 
                        if($experiences -> have_posts()):
                            while ($experiences -> have_posts()): $experiences ->the_post(); ?>
                                

                        <div <?php post_class('skill-block project-block'); ?> id="experience-container-<?php the_ID(); ?>">
                            <p class="exp-meta-date"><?php $duration = get_post_custom_values('duration'); echo $duration[0]; ?></p>
                            <p class="exp-meta-cat"><?php $categories = get_the_category(); echo $categories[1]->name ; ?></p>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="exp-meta-location"><?php $location = get_post_custom_values('location'); echo $location[0]; ?></p>
                            <p class="exp-meta-title"><?php $job_title = get_post_custom_values('job_title'); echo $job_title[0]; ?></p>
                            <?php the_content(); ?>
                       </div><!-- END of exp-->
                    
                        <?php endwhile; else : ?>

                        <p>No Work Experience so far. </p>

                        <?php endif; ?>

                    
                    <h2> Education</h2>
                        <?php 

                        $args = array(
                                'category_name' => 'Education',
                            );

                        $education = new WP_Query($args); 
                        
                        #The Loop 
                        if($education -> have_posts()):
                            while ($education -> have_posts()): $education ->the_post(); ?>
                                

                        <div <?php post_class('skill-block project-block'); ?> id="experience-container-<?php the_ID(); ?>">
                            <p class="exp-meta-date"><?php $duration = get_post_custom_values('duration'); echo $duration[0]; ?></p>
                            <p class="exp-meta-cat"><?php $categories = get_the_category(); echo $categories[1]->name ; ?></p>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="exp-meta-location"><?php $location = get_post_custom_values('location'); echo $location[0]; ?></p>
                            <p class="exp-meta-title"><?php $job_title = get_post_custom_values('job_title'); echo $job_title[0]; ?></p>
                            <?php the_content(); ?>
                       </div><!-- END of exp-->
                    
                        <?php endwhile; else : ?>

                        <p>No Education Experience so far. </p>

                        <?php endif; ?>

        
                    </div><!-- End of inner container -->
                </div><!-- End of span9 article-container -->    

            </div><!-- End of Row -->
        </div>
    </section><!-- End of Portfolio -->

<!-- =================================================================
    ================================================================-->


    <!--Contact -->
    <section id="contact" class="section-block">
        <h1 class="section-title">Contact Me<small>I'm available for new projects opporunities</small></h1>
        
        <div class="container">
            <div class="span12">
                <h1><small><a href="http://www.twitter.com/ya7ya">Twitter</a> | <a href="http://www.github.com/ya7ya">Github</a> | <a href="http://www.linkedin.com/in/ya7ya"> Linkedin</a></small></h1> 
            </div>
            <form id="contact-form" action="<?php echo get_permalink($post->ID); ?>" method="POST" >
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

        
    </section><!-- End of Contact -->

<!-- =================================================================
    ================================================================-->
<?php get_footer(); ?>