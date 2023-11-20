<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CookInFamily</title>

    <?php wp_head(); ?>
  </head>
  <body>

  <header>
    
    <div class="menu-box">
        <img class="menu-box__logo"src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo.png';?>" alt='logo'>
        <?php

          // Afficher le menu
              wp_nav_menu(array(
                  'theme_location' => 'menu_principal',
                  //'menu_id' => 'main-menu-id',
                  'container' => 'nav', // Balise HTML qui enveloppe le menu (par défaut : div)
                  'container_class' => 'menu-box__nav', // Classe CSS facultative pour le conteneur
              ));
        ?>

        <nav id="burger" class="menu-burger">   
                <ul>
                    <li class="li_burger"> 
                        <div id="test-burger" class="burger-menu">
                          <div class="bar bar1"></div>
                          <div class="bar bar2"></div>
                          <div class="bar bar3"></div>
                        </div>  
                    </li>
                </ul>  
            </nav>  
    </div>
  </header>
  <section class="menu-items">
    <div class="menu-items__box">
      <?php

      // Afficher le menu
        wp_nav_menu(array(
            'theme_location' => 'menu_principal',
            //'menu_id' => 'main-menu-id',
            'container' => 'nav', // Balise HTML qui enveloppe le menu (par défaut : div)
            'container_class' => 'menu-items__nav', // Classe CSS facultative pour le conteneur
        ));
      ?>
    </div>

  </section>