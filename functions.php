<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
        // Chargement du css/theme.css pour nos personnalisations
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/theme.css'));

}


add_action('wp_enqueue_scripts', 'ajouter_script_custom');
 function ajouter_script_custom() {
    //  script.js theme perso
    wp_enqueue_script('mon-scriptjs', get_stylesheet_directory_uri() . '/assets/js/script.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/script.js'),true);
    //script menu burger
    wp_enqueue_script('script-menu', get_stylesheet_directory_uri() . '/assets/js/script_menu.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/script_menu.js'),true);
    // script lightbox
    wp_enqueue_script('script-lightbox', get_stylesheet_directory_uri() . '/assets/js/script_lightbox3.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/script_lightbox3.js'),true);
   //script charger plus
    wp_enqueue_script('script-charger', get_stylesheet_directory_uri() . '/assets/js/load_more.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/load_more.js'),true);
    wp_localize_script('script-charger', 'ajaxurl', admin_url('admin-ajax.php'));
}



// gestion location menus

function mytheme_register_nav_menu(){
    register_nav_menus( array(
        'menu_principal' => __( 'Primary Menu', 'motaphoto' ),
        'menu_footer'  => __( 'Footer Menu', 'motaphoto' ),
        'menu_burger'=> __( 'Off-canvas Menu', 'motaphoto' ),
    ) );
}
add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );

// charger plus
function load_more_photos() {
    $page = $_POST['page'];

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $page,
    );

    $photo_query = new WP_Query($args);

    if ($photo_query->have_posts()) :
        while ($photo_query->have_posts()) : $photo_query->the_post();
            // Utilisez get_template_part pour inclure le contenu du template overlay
            get_template_part('assets/templates_parts/overlay');
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No more photos';
    endif;

    wp_die(); // Terminez correctement la requête Ajax
}

add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');