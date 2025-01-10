
 <?php 

get_header();   

if (have_posts()):   //chcek if post y or n 
    
    echo '<div class="container"><div class="row">';
    
    while (have_posts()): the_post();  // start  the loop 

        ?>
        <div class="col-md-4">
            <h2><a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
            </h2>
            <p><?php the_excerpt(); ?></p>  
        </div>

        <?php

    endwhile;

    echo '</div></div>';  

else :
    echo '<p>No sports found.</p>';
endif;

get_footer();  



