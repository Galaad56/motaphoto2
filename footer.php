
       
       <footer>
        
       <?php
       get_template_part('assets/templates_parts/modale');

      // Afficher le menu
          wp_nav_menu(array(
              'theme_location' => 'menu_footer',
              //'menu_id' => 'footer-menu-id', 
              'container' => 'nav', // Balise HTML qui enveloppe le menu (par défaut : div)
              'container_class' => 'menu-bas', // Classe CSS facultative pour le conteneur
          ));

          //wp_nav_menu(['theme_location'=>'menu_footer']);
    ?>
       </footer>
       <?php wp_head(); ?>
       <script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/script.js';?>"></script>
       <script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/script_menu.js';?>"></script>
    
    </body>
</html>