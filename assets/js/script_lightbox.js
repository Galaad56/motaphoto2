// Gestion modale the modal
// Sélectionnez tous les conteneurs de miniature
    var thumbnailContainers = document.querySelectorAll('.photo-container');
    var currentIndex = 0; // Initialisez l'index à zéro

    function showImage(offset) {
        // Mettez à jour l'index en fonction de l'offset
        currentIndex = (currentIndex + offset+thumbnailContainers.length) % thumbnailContainers.length;

        // Récupérez les éléments HTML de la lightbox
        var lightboxImg = document.getElementById('lightbox-img');
        var lightboxCategory = document.getElementById('lightbox-category');

        // Récupérez les informations de la photo actuelle
        var currentThumbnail = thumbnailContainers[currentIndex].querySelector('img');
        var currentCategory = thumbnailContainers[currentIndex].dataset.category;

        // Mettez à jour le contenu de la lightbox
        lightboxImg.src = currentThumbnail.src;
        lightboxCategory.textContent = currentCategory;
    }

    // Gestionnaire d'événement pour ouvrir la lightbox au clic sur l'icône
    thumbnailContainers.forEach(function(container, index) {
        var fullIcon = container.querySelector('.icon_full');
        fullIcon.addEventListener('click', function(event) {
            event.preventDefault();
            currentIndex = index; // Initialisez l'index à celui de la miniature cliquée
            showImage(0); // Affichez l'image actuelle
            document.getElementById('custom-lightbox').style.display = 'block'; // Affichez la lightbox
        });
    });

 

    // Gestionnaire d'événement pour fermer la lightbox en appuyant sur la touche Échap
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox(); // Masquez la lightbox
        }
    });