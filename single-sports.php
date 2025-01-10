<?php get_header(); ?>



<div class="container">
      <h3 class="post-title"><?php the_title(); ?></h3>
    <div class="row">
        
        <?php
        if (have_posts()): // Check if there are posts
            while (have_posts()): // Start the loop
                the_post();
                the_content();
        ?>
        <div class="related-post">
            <h4>sports post type</h4>
        
            <?php 
              $sports_query = new WP_Query(array(
                'category_name' => 'sports',
                'posts_per_page' =>'5',
                'post__not_in' =>array(get_the_ID())
              ));

              if( $sports_query->have_posts()):
                echo '<ul>';
                while( $sports_query->have_posts()):
                    $sports_query->the_post();
             ?>
               <li>
                    <?php if(has_post_thumbnail()): ?>
                      <div class="post-thumbnail">
                       <a href="<?php the_permalink();  ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                       </a>
                      </div>
                      <?php endif; ?>

                      <a href="<?php the_permalink(); ?>"><?php the_title();  ?></a>
               </li>

              <?php  
                  endwhile;
                  echo '</ul>';
                  else :
                    echo "<p>NO SPORTS Are Found in this page </p>";
                endif;

                WP_reset_Postdata(); 
              ?> 
        </div>
        <?php  
          endwhile;
          endif;
        ?>
         
    </div>
</div>

<?php get_footer(); ?>