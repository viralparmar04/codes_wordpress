<?php
/* Template Name: Sports Landing Page*/
?>
<?php   get_header(); ?>

    <div class="sports-landing-page">
        <section class="hero">
            <div class="hero-content">
                <h1>Welcome to the sport landing page </h1>
                <p>you can show all sports item </p>
            </div>
        </section>

        <section class="latest-news">
            <h2>Latest sports News</h2>
            <?php  
              $args= array( 
                             'category-name' => 'sports',
                            'posts_per_page' =>'3',
                          );
               $sports_query = new WP_Query($args);
                if($sports_query->have_posts()):
                while($sports_query->have_posts()): $sports_query->the_post();
            ?>
            
        
                    <a href="<?php  the_permalink(); ?>">
                             <?php the_title(); ?>
                    </a>
            
                    <p><?php  the_excerpt(); ?></p>
    
            <?php  
            endwhile; 
                else: 
                    echo '<p>NO Sports news available.</p>' ;
            endif;
            wp_reset_postdata();
            ?>
        </section>

    </div>



<?php get_footer(); ?>