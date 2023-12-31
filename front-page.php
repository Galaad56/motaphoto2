<?php get_header(); ?>
<section class="photo-hero">
      <?php
    // Récupérer une image aléatoire du Custom Post Type "photo"
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 1,
            'orderby' => 'rand', // Récupérer un post de manière aléatoire
        );

        $photo_query = new WP_Query($args);

        if ($photo_query->have_posts()) :
            while ($photo_query->have_posts()) : $photo_query->the_post();
                // Afficher l'image
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full'); 
                }
            endwhile;
            wp_reset_postdata();
        else :

            echo 'Aucune image trouvée.';
        endif;
    ?>
    <h2>Photographe Event</h2>
  </section>
<section class="photo-liste">

        <?php
                    $args = array(
                        'post_type' => 'photo',
                        'posts_per_page' => 8,

                    );
                    $photo_query = new WP_Query($args);
                    

        // Boucle WordPress pour récupérer les données du custom post type
        if ($photo_query->have_posts()) :
            while ($photo_query->have_posts()) : $photo_query->the_post(); ?>


        <?php get_template_part('assets/templates_parts/overlay');    ?>
        
            <?php endwhile;
        endif;?>

</section>
<button class="btn" id="myBtn">Contact</button>
<button class="btn" id="load-more">Charger plus</button>
<button class="btn" id="load-lightbox">lightbox</button>

<?php get_footer(); ?>