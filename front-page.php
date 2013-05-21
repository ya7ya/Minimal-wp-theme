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
        <h1 class="section-title">I'm Yahya <small> Software Engineer / Web Developer</small> </h1>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <p>I'm a Freelance Software Engineer specialized in web development, Based in Cairo, Egypt. I like to work with clients to build web Applications using clean, reusable code. </p>
                </div>
                <div class="span12">
                    <h3>What I do?</h3>
                    <ul class="check-list">
                        <li>Web design from concept to completion</li>
                        <li>Web Development:
                            <ul>
                                <li>Wordpress powered websites</li>
                                <li>Ruby on Rails/ Django Web applications</li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="span12">
                <hr />
                <h2>Technologies I Use</h2>
                </div>
                <div class="span4">
                    
                    <h3>Front-end</h3>    
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
                        </div> <!-- End of Frontend -->

                    <div class="span4">
                    <h3>Back-end</h3>    
                            <div class="skill">
                            <h6 class="name">PHP</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 75%"></div>
                            </div></div>
                            <div class="skill">
                            <h6 class="name">Python (Django)</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 65%"></div>
                            </div></div>
                            <div class="skill">
                            <h6 class="name">Ruby (Ruby On Rails)</h6>
                            <div class="progress progress-success progress-striped">
                                <div class="bar" style="width: 55%"></div>
                            </div></div>
                    </div><!-- End of Backend-->

                    <div class="span4">
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
                    </div><!-- End of Backend-->
                </div>
                        
            </div><!-- End of Technology Row-->

        </div>
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
                        <p class="project-meta-cat"><?php $categories = get_the_category(); print_r($categories[0]->name); ?></p>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php if(has_post_thumbnail()): ?>

                        <figure class="article-preview-image">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        </figure>

                        <?php endif; ?>
                        <!--<img src="http://lorempixel.com/500/200" alt="Ad" />-->
                        <h4><a href="<?php echo get_post_custom_values('client_link')[0]; ?>"><?php echo get_post_custom_values('client')[0]; ?></a></h4>
                        <p class="project-tags"><?php the_tags('<span class="label">Technologies:</span> <code>','</code>, <code> ','</code>'); ?></p>
                        
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
                            <p class="exp-meta-date">09- 10</p>
                            <p class="exp-meta-cat"><?php $categories = get_the_category(); print_r($categories[0]->name); ?></p>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="exp-meta-location">Kuala Lumpur, Malaysia</p>
                            <p class="exp-meta-title">IT Officer</p>
                            <?php the_content(); ?>
                       </div><!-- END of exp-->
                    
                        <?php endwhile; else : ?>

                        <p>No Work Experience so far. </p>

                        <?php endif; ?>

                       <div class="skill-block project-block">
                            <p class="exp-meta-date">09- 10</p>
                            <p class="exp-meta-cat">Internship</p>
                            <h3><a href="http://www.consurv.com.my/v2/">Consurv Technic Sdn. Bhd.</a></h3>
                            <p class="exp-meta-location">Kuala Lumpur, Malaysia</p>
                            <p class="exp-meta-title">IT Officer</p>
                            <p><b>RESPONSIBLITIES:</b> Network admin, hardware troubleshooting / maintenance, RFID (Active
                Radio Frequency Identification Cards) development</p>
                       </div><!-- END of exp-->
                    
                    <h2> Education</h2>
                            <div class="skill-block project-block">
                            <p class="exp-meta-date">08- 13</p>
                            <p class="exp-meta-cat">Full Time student</p>
                            <h3><a href="http://www.utp.edu.my/">Universiti Teknologi Petronas</a></h3>
                            <p class="exp-meta-location">Perak, Malaysia</p>
                            <p class="exp-meta-title"> Bachelor of Information Technology (ICT)</p>
                            <p><b>Major:</b> Software Engineering (OOP, AI, software Agents, Machine learning) <b>Minor:</b> Corporate Management </p>
                       </div><!-- END of exp-->
        
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