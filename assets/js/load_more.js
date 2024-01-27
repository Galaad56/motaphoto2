// custom-scripts.js
jQuery(document).ready(function($) {
    var page = 2; // Initialisez la page à 2 (la première page a déjà été chargée)

    // Fonction pour charger plus de photos
    function loadMorePhotos() {


        var data = {
            action: 'load_more_photos',
            page: page,
        };

        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: data,
            success: function(response) {
                // Insérez les nouvelles photos dans le conteneur
                $('.photo-liste').append(response);
                page++; // Incrémentez le numéro de page pour la prochaine requête


                 // Recharger la liste des icon_full complete
                icons =  document.querySelectorAll('.icon_full');
                open_lightbox();

                // Vérifiez s'il y a encore de photos à charger
            if ($(response).filter('.photo-item').length === 0) {
                // Aucune nouvelle photo à charger, masquer le bouton "Load More"
             $('#load-more').hide();
            }
        },
    });
}
    // Gérer le clic sur le bouton "Load More"
    $('#load-more').on('click', function() {
        loadMorePhotos();
    });   

});

    