<?php

function myfirstapp_scripts(){

   // Stylesheets
   wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
   wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css');
   wp_enqueue_style('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css');
   wp_enqueue_style('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css');
   wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css');
   wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');

   // JavaScript
   wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), null, true);
   wp_enqueue_script('aos-js', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), null, true);
   wp_enqueue_script('glightbox-js', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), null, true);
   wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), null, true);
   wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);

}
//attache with action hook 

add_action('wp_enqueue_scripts', 'myfirstapp_scripts');

//MENU CODE 

function register_myfirst_website() {
   // appearance register menu code
   register_nav_menus( 
       array(
           'primary-menu' => __('Primary Menu'),
           'footer-menu' => __('Footer Menu')
       )
   );
}

// attach with action hook
add_action('init', 'register_myfirst_website');

add_theme_support('custom-logo');

function myfirstapp_custom_logo() {
   add_theme_support( 'custom-logo', array(
       'height'      => 100, 
       'width'       => 100, 
       'flex-height' => true,
       'flex-width'  => true,
       'header-text' =>array('site-title','site-description'),
   ) );
}
add_action( 'after_setup_theme', 'myfirstapp_custom_logo' );


// // Register Sidebar
function register_myfirstapp_sidebar() {
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'theme_name'), 
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">', 
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        
    ));
 }
 add_action('widgets_init', 'register_myfirstapp_sidebar');

 


// Display the logo
function myfirstapp_display_logo() {
   if ( function_exists( 'the_custom_logo' ) ) {
       the_custom_logo(); 
   }
}

function register_myfirstapp() {
   register_post_type('custom_projects', array(
       'labels' => array(
           'name' => __('Over Projects'),
           'singular_name' => __('Custom Project'),
           'add_new' => __('Add New'),
           'add_new_item' => __('Add New Project'),
           'edit_item' => __('Edit Project'),
           'new_item' => __('New Project'),
           'view_item' => __('View Project'),
           'search_items' => __('Search Projects'),
           'not_found' => __('No projects found'),
           'not_found_in_trash' => __('No projects found in Trash'),
           'all_items' => __('All Projects'),
       ),
       'public' => true,
       'show_in_nav_menus' => true,
       'has_archive' => false,
       'supports' => array('title', 'editor', 'author', 'comments', 'excerpt','thumbnail'), 
       'rewrite' => array('slug' => 'projects'), 
   ));
}
add_action('init', 'register_myfirstapp');


// read more for post link
function my_custom_read_more_text($more) {
    return '... <a href="' . get_permalink() . '">Continue Reading</a>';
}
add_filter('excerpt_more', 'my_custom_read_more_text');


// show feacture image in post 

// Enable featured images (post thumbnails)
function my_theme_supports() {
    add_theme_support('post-thumbnails');
    //add image size 
    add_image_size("small-thumbnails",120,90,true);
    add_image_size("banner-thumbnails",700,350,true);
    //post formate 
    add_theme_support("post-formats",array("aside","gallery","link"));
}
add_action('after_setup_theme', 'my_theme_supports');







//Register Custom Taxonomy for custom_projects
function register_myfirst_website_type_taxonomy() {
    $args = array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Project Types',
            'singular_name' => 'Project Type',
            'search_items' => 'Search Project Types',
            'all_items' => 'All Project Types',
            'parent_item' => 'Parent Project Type',
            'parent_item_colon' => 'Parent Project Type:',
            'edit_item' => 'Edit Project Type',
            'update_item' => 'Update Project Type',
            'add_new_item' => 'Add New Project Type',
            'new_item_name' => 'New Project Type Name',
            'menu_name' => 'Project Types',
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-type'),
    );
    register_taxonomy('project_type', array('custom_projects'), $args);
}
add_action('init', 'register_myfirst_website_type_taxonomy');


function owt_custom_init(){
    $args = array(
                    'public'=>true,
                    'label'=>"sports"
                );
    register_post_type('sports',$args);   
}
add_action('init','owt_custom_init'); 

register_post_type('nm-publication', array(
    'labels'        => array(
        'name'               => __('Our Publication'),
        'singular_name'      => __('Publication'),
        'add_new'            => __('Add New'),
        'add_new_item'       => __('Add New Publication'),
        'edit_item'          => __('Edit Publication'),
        'new_item'           => __('New Publication'),
        'all_items'          => __('All Publication'),
        'view_item'          => __('View Publication'),
        'search_items'       => __('Search Publication'),
        'not_found'          => __('No Publication found'),
        'not_found_in_trash' => __('No Publication found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Publication'
    ),
    'public'        => true,
    'supports'      => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt'),
    'taxonomies'    => array('post_tag'),
    'has_archive'   => 'publication-blogs',
    'menu_icon'     => 'dashicons-book',
    'rewrite'       => array('slug' => 'publication-blogs', 'with_front' => true),
));
register_post_type('nm-sports', array(
    'labels'        => array(
        'name'               => __('Our Sports'),
        'singular_name'      => __('Sport'),
        'add_new'            => __('Add New'),
        'add_new_item'       => __('Add New Sport'),
        'edit_item'          => __('Edit Sport'),
        'new_item'           => __('New Sport'),
        'all_items'          => __('All Sport'),
        'view_item'          => __('View Sport'),
        'search_items'       => __('Search Sport'),
        'not_found'          => __('No Sport found'),
        'not_found_in_trash' => __('No Sport found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Sport'
    ),
    'public'        => true,
    'supports'      => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt'),
    'taxonomies'    => array('post_tag'),
    'has_archive'   => 'sport-blogs',
    'menu_icon'     => 'dashicons-book',
    'rewrite'       => array('slug' => 'sport-blogs', 'with_front' => true),
));

register_taxonomy('sports_category', 'nm-sports', array(
    'labels' => array(
        'name' => 'Sport Categories',
        'singular_name' => 'Sport Category',
        'search_items' => 'Search Sport Categories',
        'all_items' => 'All Sport Categories',
        'parent_item' => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Categories',
    ),
    'hierarchical' => true, // Set to false if you want it to act like tags
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'sports-category'),
));
// Register Custom Taxonomy 'sports_type' for 'sports' post type
function register_myfirst_website_sports_taxonomy() {
    $args = array(
        'hierarchical' => true,
        'labels' => array(
            'name'              => 'Sports Type',
            'singular_name'     => 'Sports Type',
            'search_items'      => 'Search Sports Type',
            'all_items'         => 'All Sports Type',
            'parent_item'       => 'Parent Sports Type',
            'parent_item_colon' => 'Parent Sports Type:',
            'edit_item'         => 'Edit Sports Type',
            'update_item'       => 'Update Sports Type',
            'add_new_item'      => 'Add New Sports Type',
            'new_item_name'     => 'New Sports Type Name',
            'menu_name'         => 'Sports Type',
        ),
    'show_in_rest'        => true, );

        $sports= array(

        'label'               => 'post-type',
        'public'              => true,
        'show_ui'             => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest'        => true, 
        'supports'      => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt'),
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'sports-type' ),
    );
    register_taxonomy( 'sports_type', array( 'post' ), $sports );
}
//add_action( 'init', 'register_myfirst_website_sports_taxonomy' ); 




function register_myfirst_website_news_taxonomy(){
    $args = array(
             'hierarchical' =>true,
             'labels'=>array(

                'name'             =>  'News Type',
                'singular_name'    =>  'News Type',
                'search_items'     =>  'Search News Type',
                'all_items'        =>  'All News Type',
                'parent_item'      =>  'Parent Type',
                'parent_item_colon'=>  'Parent Type',
                'edid_item'         => 'Edit News Type',
                'update_item'       => 'Update News Type',
                'add_new_item'      => 'Add New News Type',
                'add_item_name'     => 'New News Type Name',
                'menu_name'         => 'News Type',
             ));
            
         register_taxonomy('news_type',array('post'));
}
add_action('init','register_myfirst_website_news_taxonomy');






    
    


?>