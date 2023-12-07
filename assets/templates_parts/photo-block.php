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
                ?>
                <!-- <div class="single-photo"> -->
                    <div class="photo-container">
                        <div class="photo-content">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="overlay">
                            
                            <div class="icon-full">
                                <i class="fa-solid fa-expand"></i>
                            </div>
                           
                            <div class="icon-eye">
                                <a href="<?php the_permalink(); ?>">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                            </div>

                            <div class="infos-photo">
                                <p id="reference">Référence: <span id="reference_span"> <?php echo get_post_meta(get_the_ID(), 'reference', true); ?></span></p>
                                <?php
                                    // Récupérez les termes de la taxonomie "categorie" associés à l'article
                                    $cats = get_the_terms(get_the_ID(), 'category');

                                    // Vérifiez si des termes existent
                                    if ($cats && !is_wp_error($cats)) {
                                        echo '<p>';
                                        // Parcourez les termes et affichez-les
                                        foreach ($cats as $cat) {
                                            echo esc_html($cat->name); // Utilisez esc_html pour échapper le contenu
                                    }
                                        echo '</p>';
                                    }?>
                           </div>
                        </div>
                    </div>
                <!-- </div> -->
        <?php
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