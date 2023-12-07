<?php get_header(); ?>

<section class="single-section">
    <?php while (have_posts()) : the_post(); ?>
        <div class="single-container">
            <div id="column1" class="column">  
                <h2 class="titre_photo"><?php the_title(); ?></h2>
                <p id="reference">Référence: <span id="reference_span"> <?php echo get_post_meta(get_the_ID(), 'reference', true); ?></span></p>
                <?php
                // Récupérez les termes de la taxonomie "categorie" associés à l'article
                $cats = get_the_terms(get_the_ID(), 'category');

                // Vérifiez si des termes existent
                if ($cats && !is_wp_error($cats)) {
                    echo '<p>categorie : ';

                    // Parcourez les termes et affichez-les
                    foreach ($cats as $cat) {
                        echo esc_html($cat->name); // Utilisez esc_html pour échapper le contenu
                }
                echo '</p>';
                }?>
                <?php
                // Récupérez les termes de la taxonomie "format" associés à l'article
                $formats = get_the_terms(get_the_ID(), 'format');

                // Vérifiez si des termes existent
                if ($formats && !is_wp_error($formats)) {
                    echo '<p>Format : ';

                    // Parcourez les termes et affichez-les
                    foreach ($formats as $format) {
                        echo esc_html($format->name); // Utilisez esc_html pour échapper le contenu
                }
                echo '</p>';
                }?>

                <p>Type: <?php echo get_post_meta(get_the_ID(), 'type', true); ?></p>
                <!-- <p>Catégorie: <?php echo the_category(); ?></p> -->
                <p>Année: <?php the_time("Y"); ?></p>
            
            </div>
            <div id="column2"class="column">
                <?php
                // Afficher l'image à la une du post
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                }
                ?>
            </div>
        </div>
        <div class=container>
            <div class="container__contact">
                <p>Cette photo vous interesse?</p>
                <button class="btn" id="myBtn">Contact</button>

            </div>
            <div class="container__fleche">
                <!--  Miniature de la photo précédente   -->
                <div id="img-precedent">
                    <?php  
                    
                    $prev_post = get_previous_post();
                    if ($prev_post) :
                        echo get_the_post_thumbnail($prev_post->ID, 'thumbnail');
                        echo '</a>';
                    endif; ?>
                </div>
                <!--  Miniature de la photo suivante -->
                <div id="img-suivant">
                    <?php
                    
                    $next_post = get_next_post();
                    if ($next_post) :
                        echo get_the_post_thumbnail($next_post->ID, 'thumbnail');
                        echo '</a>';
                    endif;?>
            </div> 
        
            <?php
                    if ($prev_post) :
                        echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . esc_attr($prev_post->post_title) . '">';?>
                        <img class="container__fleche__precedent"src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Line 6.png';?>" alt='logo' onmouseover="showDiv1()" onmouseout="hideDiv1()">
                        <?php 
                        echo '</a>';
                    endif; ?>
                <?php
                    if ($next_post) :
                        echo '<a href="' . get_permalink($next_post->ID) . '" title="' . esc_attr($next_post->post_title) . '">';?>
                        <img class="container__fleche__suivant"src="<?php echo get_stylesheet_directory_uri() . '/assets/images/line 7.png';?>" alt='logo'onmouseover="showDiv2()" onmouseout="hideDiv2()">
                        <?php 
                        echo '</a>';
                    endif; ?>   
            </div>
        </div>
        <?php get_template_part('assets/templates_parts/photo-block');?>
        
        
    <?php endwhile;?>
</section>
<section>

</section>
<?php get_footer(); ?>