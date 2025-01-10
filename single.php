<?php get_header(); ?>

<div class="container">
     <h3 class="post-title"><?php the_title(); ?></h3>
    <div class="row">
        
        <?php
        if (have_posts()): // Check if there are posts
            while (have_posts()): // Start the loop
                the_post();

                 // show feacture image
                 if ( has_post_thumbnail() ) {
                    echo '<divdiv class="col-12 col-md-4 post-thumbnail">';
                    the_post_thumbnail('medium'); 
                    echo '</div>';
                }
                
                // show  the post content
                echo '<div class="col-12 col-md-8 post-content">';
                the_content();
                echo '</div>';
            endwhile;
        endif;
        ?>


        <div class="col-12 col-md-4">
            <?php get_sidebar(); ?> 
        </div>

    </div>
</div>

<?php get_footer(); ?>

