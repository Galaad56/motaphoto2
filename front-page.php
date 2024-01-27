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
        <div class="filters-gauche">
            <div class="dropdown">
                <input type="checkbox" class="dropdown__switch" id="filter-switch" hidden />
                <label id="label-switch" for="filter-switch" class="dropdown__options-filter">
                    <ul class="dropdown__filter" role="listbox" tabindex="-1">
                        <li id="categorie-selected" class="dropdown__filter-selected" aria-selected="true" data-value="all">
                            Catégories
                        </li>
                        <li>
                            <ul class="dropdown__select">
                                <li class="dropdown__select-option select-categorie" role="option" data-value="all">
                                Toutes les catégories
                                </li>
                                
                                <?php
                                    $categories = get_categories(array('taxonomy' => 'category', 'hide_empty' => false));
                                    foreach ($categories as $category) {
                                        echo '<li class="dropdown__select-option select-categorie" role="option" data-value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</li>';
                                    }
                                ?>
                                
                            </ul>
                        </li>
                    </ul>			
                </label>
            </div>
            <div class="dropdown">
                <input type="checkbox" class="dropdown__switch" id="format-switch" hidden />
                <label id="label-switch" for="format-switch" class="dropdown__options-filter">
                    <ul class="dropdown__filter" role="listbox" tabindex="-1">
                        <li id="format-selected" class="dropdown__filter-selected" aria-selected="true" data-value="all">
                            Formats
                        </li>
                        <li>
                            <ul class="dropdown__select">
                                <li class="dropdown__select-option select-format" role="option" data-value="all">
                                    Tous formats
                                </li>
                                
                                <?php
                                    $formats = get_terms(array('taxonomy' => 'format', 'hide_empty' => false));
                                    foreach ($formats as $format) {
                                        echo '<option class="dropdown__select-option select-format" role="option" data-value="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</option>';
                                    }
                                ?>
                            </ul>
                        </li>
                    </ul>			
                </label>
            </div>
        </div>
        <div class="dropdown">
                <input type="checkbox" class="dropdown__switch" id="date-switch" hidden />
                <label id="label-switch" for="date-switch" class="dropdown__options-filter">
                    <ul class="dropdown__filter" role="listbox" tabindex="-1">
                        <li id="date-selected" class="dropdown__filter-selected" aria-selected="true" data-value="all">
                            Trier par
                        </li>
                        <li>
                            <ul class="dropdown__select">
                                <li class="dropdown__select-option select-date" role="option" data-value="De la plus récente à la plus ancienne" >
                                    De la plus récente à la plus ancienne
                                </li>
                                <li class="dropdown__select-option select-date" role="option" data-value="De la plus ancienne à la plus récente" >
                                    De la plus ancienne à la plus récente
                                </li>
                            </ul>
                        </li>
                    </ul>			
                </label>
            </div>
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
    
</section>
<section class=load-more-container>
    <button class="btn" id="load-more">Charger plus</button>
</section>




<?php get_footer(); ?>