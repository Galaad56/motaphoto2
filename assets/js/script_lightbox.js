document.addEventListener("DOMContentLoaded", function () {
    // Sélectionnez tous les conteneurs de miniature
    var thumbnailContainers = document.querySelectorAll('.photo-container');
    var currentIndex; // Déclarez la variable index ici

    thumbnailContainers.forEach(function (container, index) {
        var thumbnailImage = container.querySelector('img');
        var fullIcon = container.querySelector('.icon_full');

        fullIcon.addEventListener('click', function (event) {
            event.preventDefault();

            // Mettez à jour l'index avant de montrer la lightbox
            currentIndex = index;

            // Créez une div pour la lightbox
            var lightbox = document.createElement('div');
            lightbox.className = 'custom-lightbox';

            // Ajoutez un conteneur pour la photo et les boutons Suivante/Précédente
            lightbox.innerHTML = '<div class="lightbox-content">' +
                '<span class="lightbox-prev">Précédente</span>' +
                '<img src="' + thumbnailImage.src + '" alt="" id="lightbox-img">' +
                '<span class="lightbox-next">Suivante</span>' +
                '</div>';

            // Ajoutez la lightbox à la page
            document.body.appendChild(lightbox);

            // Gestionnaire d'événement pour fermer la lightbox en cliquant dessus
            lightbox.addEventListener('click', function (e) {
                if (e.target === this) {
                    document.body.removeChild(lightbox);
                }
            });

            // Gestionnaires d'événements pour la navigation
            var lightboxContent = lightbox.querySelector('.lightbox-content');
            var lightboxPrev = lightbox.querySelector('.lightbox-prev');
            var lightboxNext = lightbox.querySelector('.lightbox-next');
            var lightboxImg = lightbox.querySelector('#lightbox-img');

            lightboxPrev.addEventListener('click', function () {
                showImage(currentIndex - 1);
            });

            lightboxNext.addEventListener('click', function () {
                showImage(currentIndex + 1);
            });

            function showImage(newIndex) {
                // Assurez-vous que l'index est dans la plage des miniatures
                newIndex = (newIndex + thumbnailContainers.length) % thumbnailContainers.length;

                // Mettez à jour l'index et changez la source de l'image
                currentIndex = newIndex;

                // Préchargez l'image suivante
                var nextIndex = (currentIndex + 1) % thumbnailContainers.length;
                var nextThumbnail = thumbnailContainers[nextIndex].querySelector('img');
                var preloadImage = new Image();
                preloadImage.src = nextThumbnail.src;

                // Changez la source de l'image
                lightboxImg.src = thumbnailContainers[newIndex].querySelector('img').src;
            }

            // Assurez-vous que l'image est complètement chargée avant de l'afficher
            lightboxImg.onload = function () {
                lightboxContent.appendChild(lightboxImg);
            };

            // Gestionnaire d'erreur au cas où l'image ne se charge pas correctement
            lightboxImg.onerror = function () {
                console.error('Erreur de chargement de l\'image:', thumbnailImage.src);
            };
        });
    });
});