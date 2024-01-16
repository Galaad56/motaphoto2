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
    //script filtres
    wp_enqueue_script('script-filtres', get_stylesheet_directory_uri() . '/assets/js/filtres.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/filtres.js'),true);
    wp_localize_script('script-filtres', 'frontendajax', array('ajaxurl' => admin_url('admin-ajax.php')));
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
        'posts_per_page' => 12,
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

//fonction filtres

    // Enregistrez l'action WordPress pour la requête AJAX
add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos'); // Pour les utilisateurs non connectés

function filter_photos()
{
    $category = $_POST['category'];
    $format = $_POST['format'];
    $date_order = $_POST['date_order'];


    // Construisez vos arguments de requête personnalisée ici en fonction des filtres

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 12,
        // Ajoutez d'autres arguments selon les filtres sélectionnés
    );

    if ($category !== 'all') {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $category,
        );
    }

    if ($format !== 'all') {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format,
        );
    }

    if ($date_order === 'De la plus récente à la plus ancienne') {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    } elseif ($date_order === 'De la plus ancienne à la plus récente') {
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';
    }




    $photo_query = new WP_Query($args);


    // Boucle WordPress pour récupérer les données du custom post type
    if ($photo_query->have_posts()) :
        while ($photo_query->have_posts()) : $photo_query->the_post();
            // Incluez le template pour chaque photo
            get_template_part('assets/templates_parts/overlay');
        endwhile;

    endif;

    wp_reset_postdata();

   
    die(); // Arrêtez l'exécution après l'envoi des données
}
