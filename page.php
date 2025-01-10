<?php   get_header(); ?>


<div class="container">  
     <div class="row"> 
             <?php
                if(have_posts()): //we have check posts or not checking 
                    while(have_posts()): //loop section
                        the_post();
             ?>
                <div class="col-md-12">
                    <h3><?php the_title(); ?></h3>
                    <p><?php  the_content(); ?></p>
                </div>    
                <?php
                   endwhile;
                    endif;
                ?>
     </div>
</div>

<?php get_footer(); ?>