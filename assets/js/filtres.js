jQuery(document).ready(function ($) {
    // Gestionnaire d'événements pour les changements dans les filtres
    $('#category-filter, #format-filter,#date-filter').change(function () {
        // Récupérer les valeurs des filtres
        var category = $('#category-filter').val();
        var format = $('#format-filter').val();
        var dateOrder = $('#date-filter').val();

        console.log(dateOrder)

        // Envoyer une requête AJAX au serveur
        $.ajax({
            url: ajaxurl, // Utilisez la variable globale WordPress ajaxurl
            type: 'post',
            data: {
                action: 'filter_photos', // Nom de l'action WordPress
                category: category,
                format: format,
                date_order: dateOrder
            },
            success: function (response) {
                // Mettez à jour la section des photos avec les nouvelles données
                $('.photo-liste').html(response);

                //mettre a jours la selection des icon_full
                icons =  document.querySelectorAll('.icon_full');
                console.log('icons',icons);

                icons.forEach(function(icon, index) {
                  icon.addEventListener('click', function(event) { 
                      event.preventDefault();
                      currentIndex = index;
                      lightbox2()
                      showImage(0);
                      document.getElementById('custom-lightbox').style.display = 'block';
                  });
              }
              );
   
            }
        });
    });
});