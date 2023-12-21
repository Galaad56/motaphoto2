<div class="photo-container">
                        <div class="photo-content">
                            <?php the_post_thumbnail('full',['class' => 'img-overlay']); ?>
                        </div>
                        <div class="overlay">
                           <div class="container_icon">
                           <img class="icon_full" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icon_fullscreen.png';?>" alt='full sreen' data-reference="<?php echo get_post_meta(get_the_ID(), 'reference', true); ?>" >
                            </div>
                            <a class="lien-photo" href=" <?php the_permalink(); ?>" >
                                <img class="icon_eye"src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icon_eye.png';?>" alt='zoom'>
                            </a>
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