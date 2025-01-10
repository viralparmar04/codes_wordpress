<?php
get_headers();
?>
<h3><?php the_title(); ?></h3>

<div class="container">
    <div class="row">
      <?php

      if(have_posts()):
        while(have_posts());
          the_post();
          the_content();
       ?>

       <div class="related-post">
          <h4>News Post Type</h4>
          <?php
              
              $news_query = new WP_Query(array(
                'category_name' ='news',
                'post_per_page'='5',
                'post_not_in'=array(get_the_ID())
              ));

              if($news_query->have_posts();):
                echo '<ul>';
                while($news_query->have_posts()):
                    $news_query->the_post();
          ?>
           <li>
               <a href=" <?php the_permalink(); ?> <?php the_title(); ?>"></a>     
           </li>

           <?php
                endwhile;
                echo '</ul>';
                else : "<p>NO News post is found </p>";
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

<?php
get_footer();
?>