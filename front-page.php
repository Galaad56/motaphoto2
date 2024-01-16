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
  <section class="filters">
    <div>    
        <select id="category-filter">
            <option value="all">Catégories</option>
            <?php
            $categories = get_categories(array('taxonomy' => 'category', 'hide_empty' => false));
            foreach ($categories as $category) {
                echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
            }
            ?>
        </select>

        <select id="format-filter">
            <option value="all">Formats</option>
            <?php
            $formats = get_terms(array('taxonomy' => 'format', 'hide_empty' => false));
            foreach ($formats as $format) {
                echo '<option value="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</option>';
            }
            ?>
        </select>
    </div>
    <select id="date-filter">
        <option>Trier par</option>
        <option>De la plus récente à la plus ancienne</option>
        <option>De la plus ancienne à la plus récente</option>    
    </select>    


</section>


<section class="photo-liste">

        <?php
                    $args = array(
                        'post_type' => 'photo',
                        'posts_per_page' => 12,

                    );
                    $photo_query = new WP_Query($args);
                    

        // Boucle WordPress pour récupérer les données du custom post type
        if ($photo_query->have_posts()) :
            while ($photo_query->have_posts()) : $photo_query->the_post(); ?>


        <?php get_template_part('assets/templates_parts/overlay');    ?>
        
            <?php endwhile;
        endif;?>
    <button class="btn" id="load-more">Charger plus</button>
</section>



<?php get_footer(); ?>