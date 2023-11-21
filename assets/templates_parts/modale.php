<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">x</span>
    <img id="img_modale" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Contact header.png';?>" alt="modale deco">
    <?php
		// On insère le formulaire de demandes de renseignements
		echo do_shortcode('[contact-form-7 id="deb9a02" title="Formulaire de contact 1"]');
		?>

  </div>

</div>