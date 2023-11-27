<?php get_header(); ?>

<?php
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 1,

            );
            $photo_query = new WP_Query($args);
            

// Boucle WordPress pour récupérer les données du custom post type
if ($photo_query()) :
    while ($photo_query()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" >
            <div class="column">
                <h1><?php the_title(); ?></h1>
                <p><strong>Référence:</strong> <?php echo get_post_meta(get_the_ID(), 'reference', true); ?></p>
                <p><strong>Catégorie:</strong> <?php echo get_the_term_list(get_the_ID(), 'categorie', '', ', ', ''); ?></p>
                <p><strong>Format:</strong> <?php echo get_post_meta(get_the_ID(), 'format', true); ?></p>
                <p><strong>Type:</strong> <?php echo get_post_meta(get_the_ID(), 'type', true); ?></p>
                <p><strong>Année:</strong> <?php echo get_post_meta(get_the_ID(), 'annee_publication', true); ?></p>
            </div>
            <div class="column">
                <?php
                // Afficher l'image à la une du post
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                }
                ?>
            </div>
        </div>
    <?php endwhile;
endif;?>

<?php get_header(); ?>


