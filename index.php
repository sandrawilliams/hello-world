<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Default Responsive Theme
 * 
 */

get_header(); ?>
			
<!-- Intro Section -->
    <section id="intro" class="intro-section dark">
        <div class="container">
            <div class="row"> <!-- page-row class here? -->
                <div class="col-lg-12">                  
                    <img class="fokiss-logo" src="wp-content/themes/theme/images/fokiss-logo.png">
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-default page-scroll" href="#about">Read More</a>        
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 intro-text">
                    <p>Lorem ipsum dolor sit amet, elit utroque probatus eos no, animal deseruisse deterruisset est ne. 
                    Homero tincidunt et per, atqui scripserit id vim, mel odio nostrud te. Mel quis modo senserit an. 
                    Eu populo fabulas quo, no cum aliquip impedit deterruisset, ut his justo facer semper.
                    Pri mentitum sadipscing definitiones ad, nam falli dicant reprimique an.<p>
                    <p>Inermis persecuti cum an, qui partem alienum fierent in, quo ex labitur maluisset efficiendi. Ea 
                    esse ornatus commune mel, qui cuprimis democritum, audire assentior sea ut. His mutat lorem tamquam ne. 
                    No qui laudem salutatus sadipscing. Quem mutat melius eos no, sumo atomorum mea ne, usu ad postea mollis. 
                    Ius percipit reprehendunt ne, hinc putent persequeris duo ut. Nam at vocibus dolores, ad discere delenit qui. 
                    Et ius aperiam diceret.</p>
                </div>     
            </div>
        </div>
    </section>

    <!-- About Section -->
    
    </section><!-- end section -->

    <section id="services" class="light">
        <div class="container">
            <div class="row page-row">
                <div class="col-lg-12">
                    <div class="col-xs-5 line"><hr></div>
                    <div class="col-xs-2 logo"><h1>Packages</h1></div>
                    <div class="col-xs-5 line"><hr></div>
                </div>                 
                <!--<div class="col-lg-12 services-intro">   
                    <p>Lorem ipsum dolor sit amet, elit utroque probatus eos no, animal deseruisse deterruisset est ne. 
                    Homero tincidunt et per, atqui scripserit id vim, mel odio nostrud te. Mel quis modo senserit an. 
                    Eu populo fabulas quo, no cum aliquip impedit deterruisset, ut his justo facer semper.
                    Pri mentitum sadipscing definitiones ad, nam falli dicant reprimique an.</p>
                    <p>Atqui scripserit id vim, mel odio nostrud te. Mel quis modo senserit an. 
                    Eu populo fabulas quo, no cum aliquip impedit deterruisset, ut his justo facer semper. Lorem ipsum 
                    dolor sit amet, elit utroque probatus eos no, animal deseruisse deterruisset est ne.</p>
                </div>-->
                <div class="col-lg-12 services">                    
                    <?php
                        $args = array(
                            'post_type'=> 'services',                        
                        );
                        $the_query = new WP_Query( $args );
                        $slider = '';
                        if($the_query->have_posts()){
                            while($the_query->have_posts()){ $the_query->the_post();  ?>
                            <div class="col-lg-2 col-xs-15 panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="panel-title"><?php echo get_the_title();?></h2>
                                </div>
                                <div class="panel-body">
                                    <h3><span>From <?php echo get_field('services_price');?></span></h3>
                                    <img src="<?php echo get_field('services_image');?>">
                                </div>
                                <div class="class">                                    
                                    <a href="#"><p>View</p><?php echo get_the_title();?> <br><p>Gallery</p></a>
                                                                      
                                </div>
                            </div><!-- end col 2 panel -->                            
                            <?php
                            }
                        }
                    ?>                    
                </div><!-- end col 12 services -->

                <div class="col-lg-12 page-title">
                    <div class="col-xs-5 line"><hr></div>
                    <div class="col-xs-2 logo"><h1>Wedding Packages</h1></div>
                    <div class="col-xs-5 line"><hr></div>
                </div><!-- end col 12 -->

                <div class="col-lg-12 packages-wrapper">
                    <div id="ps-container" class="ps-container col-lg-12">   
                        <div class="col-lg-6 ps-contentwrapper">   
                            <?php
                                $args = array(
                                    'post_type'=> 'packages',                        
                                );
                                $the_query = new WP_Query( $args );
                                $slider = '';
                                if($the_query->have_posts()){
                                    while($the_query->have_posts()){ $the_query->the_post();  ?>         
                                        <div class="ps-content">                                            
                                            <!--<span class="ps-price"><?php echo get_field('package_price');?></span>-->
                                            <h2><?php echo get_the_title();?></h2>   
                                            <?php
                                                // check if the repeater field has rows of data
                                                if( have_rows('package_description') ):

                                                // loop through the rows of data
                                                while ( have_rows('package_description') ) : the_row();   
                                            ?>     
                                                <p><?php the_sub_field('package_item'); ?></p>  

                                            <!--<a href="">Find Out More</a>-->
                                            <?php 
                                                endwhile;
                                                endif;
                                            ?>
                                        </div><!-- end ps-content -->
                                    <?php 
                                    $slider .= '<div style="background-image:url('.get_field('package_image').');"></div>';
                                    }
                                }
                            ?>
                        </div><!-- end ps-contentwrapper -->   
                        <div class="col-lg-6 ps-slidewrapper">            
                            <div class="ps-slides">
                                <?php echo $slider; ?>        
                            </div><!-- end ps-slides -->

                            <nav class="nav">
                                <a id="prev-text" href="#" class="ps-prev"></a>
                                <a id="next-text" href="#" class="ps-next"></a>
                            </nav>
                        </div><!-- end ps-slidewrapper -->                         
                    </div><!-- end ps-container -->
                </div><!-- end packages-wrapper -->
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="clearfix"></div>
    </section><!-- end section -->  
    

    <!-- Testimonials Section -->
    <section id="testimonials" class="light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 page-title">
                    <div class="col-xs-5 line"><hr></div>
                    <div class="col-xs-2 logo"><h1>Testimonials</h1></div>
                    <div class="col-xs-5 line"><hr></div>
                </div><!-- end col 12 -->                   
                    
                <?php
                    $args = array(
                        'post_type'=> 'testimonials',                        
                    );
                    $the_query = new WP_Query( $args );

                    if($the_query->have_posts()){
                        while($the_query->have_posts()){ $the_query->the_post(); ?>
                          <div class="row testimonial-row"> 
                          <div class="col-lg-2"></div>
                            <div class="col-lg-8 testimonial-img testimonials-details">
                                <img src="<?php echo get_field('testimonial_image');?>">
                                <p>     <?php echo get_field('testimonial_content');?>  </p>
                                <!--<p>     <?php echo get_field('testimonial_date');?>     </p>-->
                                <h3>    <?php echo get_the_title().', '.get_field('location');  ?> </h3>  
                            </div>
                          <div class="col-lg-2"></div>   
                        </div><!-- end row -->  
                        <hr class="hr-class">    
                <?php
                        }
                    }
                ?>
                    
                </div><!-- end col 12 -->
            </div><!-- end row -->        
        </div><!-- end container -->
        <div class="clearfix"></div>
    </section><!-- end section -->

    <!-- Contact Section -->
    <section id="contact" class="dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 page-title">
                    <div class="col-xs-5 line"><hr></div>
                    <div class="col-xs-2 logo"><h1>Contact</h1></div>
                    <div class="col-xs-5 line"><hr></div>
                </div>  
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12 contact">
                    <ul>
                        <li>
                        <a href="mailto:sandrawilliams1@gmail.com">
                            <span class="ripple2"><img src="wp-content/themes/theme/images/mail2.png"></span>                            
                            <p>EMAIL</p>
                            <p>fokissphotograpy@gmail.com</p>
                        </li>
                        <li>
                            <span class="ripple2"><img src="wp-content/themes/theme/images/phone.png"></span>
                            <p>PHONE</p>  
                            <p>+353 (0) 860312438</p>
                        </li>
                        <li>
                            <a href="http://facebook.com" target="blank">
                                <span class="ripple2"><img src="wp-content/themes/theme/images/fb3.png"></span>
                                <p>FACEBOOK</p>   
                                <p>fokisssphotography</p>
                            </a>
                        </li>
                        <li>
                            <a href="http://twitter.com" target="blank">
                                <span class="ripple2"><img src="wp-content/themes/theme/images/twitter.png"></span>
                                <p>TWITTER</p>
                                <p>@tanyasweb</p>
                            </a>
                        </li>
                    </ul>
                </div><!-- end col 12 contact --> 

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6 contact-cols">
                        <h2>Get in Touch</h2>
                        <!--<p>Contact Fokiss directly using the form below and hear from us within 24 hours.</p>-->
                        <?php
                            echo do_shortcode('[contact-form-7 id="7" title="Contact Form 2"]')  
                        ?>
                    </div><!-- end col 6 -->  
                    <div class="col-lg-6 contact-cols">
                        <h2>Find Us</h2>
                        <!--<p>We are based in Clifden, Co. Galway but travel nationwide for your event.</p>-->
                        <?php
                            echo do_shortcode('[wpgmza id="1"]')  
                        ?>
                    </div><!-- end col 6 --> 
                </div><!-- end col 12 -->                                            
            </div><!-- end row -->    
                          
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="clearfix"></div>
    </section><!-- end section -->

    <!--<div class="container">
        <section class="grid-wrap">
            <ul class="grid swipe-down" id="grid">
                <li><a href="#"><img src="wp-content/themes/theme/images/portraits/portrait-service.png" alt="dummy"></a></li>
            </ul>
        </section>            
    </div>-->

<?php get_footer(); ?>



<!--<h2>Contact and Social</h2>
                        <table class="contact-table">                        
                            <tr>
                                <td><img src="wp-content/themes/theme/images/email-icon.png"></td>
                                <td>tanyawilliamsphotograpy@gmail.com</td>
                            </tr>
                            <tr>
                                <td><img src="wp-content/themes/theme/images/phone-icon.png"></td>
                                <td>+353 (0) 860312438</td>
                            </tr>
                            <tr>
                                <td><img src="wp-content/themes/theme/images/facebook-icon.png"></td>
                                <td>tanyawilliamsphotography</td>
                            </tr>
                            <tr>
                                <td><img src="wp-content/themes/theme/images/twitter-icon.png"></td>
                                <td>tanyasweb</td>
                            </tr>
                        </table> 