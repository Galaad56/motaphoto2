<div class="container-categorie">

    <h3>Vous aimerez aussi</h3>


    <div class="photo-like"> 
        <?php
        // Récupérer la catégorie de la photo actuelle
        $categories = get_the_category();
        $category_id = $categories[0]->term_id;

        // Construire la requête pour récupérer deux photos de la même catégorie
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 2,
            'cat'            => $category_id,
            'post__not_in'   => array( get_the_ID() ), // Exclure la photo actuelle
        );

        $query = new WP_Query( $args );

        // Afficher les photos
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
            
              get_template_part('assets/templates_parts/overlay');     
        
            }
        }

        // Réinitialiser la requête
        wp_reset_postdata();?>
    </div>
    <div class="container-btn">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <button type=button class="btn" id="btn-plus">Toutes les photos</button>
        </a>
    </div>
</div>