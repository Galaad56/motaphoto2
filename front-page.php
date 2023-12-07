<?php get_header(); ?>

<h1> Bienvenue sur MotaPhoto</h1>

<?php
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => -1,

            );
            $photo_query = new WP_Query($args);
            

// Boucle WordPress pour récupérer les données du custom post type
if ($photo_query->have_posts()) :
    while ($photo_query->have_posts()) : $photo_query->the_post(); ?>

<a href=" <?php the_permalink(); ?>" >
        <div id="post-<?php the_ID(); ?>" >
            <div class="column">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="column">
                <?php
                // Afficher l'image à la une du post
                if (has_post_thumbnail()) {
                    the_post_thumbnail('thumbnail');
                }
                ?>
            </div>
        </div>
</a>
    <?php endwhile;
endif;?>



<?php get_footer(); ?>