<?php

get_header(); ?>

<div class="about-page-content">
   <h1><?php the_title(); ?></h1>
   <div class="about-content">
      <?php the_content(); ?>
   </div>

   <div class="posts-section">
      <h2>Recent Posts</h2>
      <?php
      
      $args = array(
         'post_type' => 'post',   
         'posts_per_page' => 5,   
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) :
         
         while ($query->have_posts()) :
            $query->the_post();

            
      ?>
            <div class="post-item">
               <h3><a href="<?php the_permalink(); ?>">
                     <?php the_title(); ?>
                  </a>
               </h3>
              <?php if (has_post_thumbnail()) : ?>
                  <div class="post-thumbnail">
                     <?php the_post_thumbnail('thumbnail'); ?>
                  </div>
               <?php endif; ?>
               <p><?php the_excerpt(); ?></p>
            </div>
            <?php

         endwhile;
      else :
         echo '<p>No posts found.</p>';
      endif;

      wp_reset_postdata();
      ?>
   </div>
</div>



<?php get_footer(); ?>
