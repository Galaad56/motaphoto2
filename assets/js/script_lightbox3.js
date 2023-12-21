  lightbox()
  
  function lightbox(){      
        
        
        // Créez un tableau pour stockerchaque photo
        const photos = [];

        // Sélectionnez tous les images
        const vignettes = document.querySelectorAll('.img-overlay');

        // Remplissez le tableau avec les informations nécessaires
        vignettes.forEach(function (vignette) {

            photos.push({
                src: vignette.dataset.src,

            });
        });

        // Créez un tableau pour stocker les informations sur chaque photo
        const infos = [];

        // Sélectionnez tous les conteneurs de miniature
        const ThumbContainer = document.querySelectorAll('.photo-container');

        // Remplissez le tableau avec les informations nécessaires
        ThumbContainer.forEach(function (container, index) {
            category = container.querySelector('.infos-photo p:last-child').textContent.trim();
            reference = container.querySelector('.infos-photo #reference_span').textContent.trim();

            infos.push({
            category: category,
            reference: reference
            });
        });


        console.log("photos",photos);

        let currentIndex = 0; // Initialisez l'index à zéro

        function showImage(offset) {
            currentIndex = (currentIndex + offset + photos.length) % photos.length;

            // Récupérez les éléments HTML de la lightbox
            const lightboxImg = document.getElementById('lightbox-img');
            const lightboxCategory = document.getElementById('lightbox-category');
            const lightboxReference = document.getElementById('lightbox-reference');

            // Récupérez les informations de la photo actuelle
            let currentPhoto = photos[currentIndex];
            let currentInfo = infos[currentIndex];


            // Mettez à jour le contenu de la lightbox
            lightboxImg.src = currentPhoto.src;
            lightboxCategory.textContent = currentInfo.category;
            lightboxReference.textContent = currentInfo.reference;
        }

        // Gestionnaire d'événement pour ouvrir la lightbox au clic sur l'icône
        const icons =  document.querySelectorAll('.icon_full');
        console.log('icons',icons);

        icons.forEach(function(icon, index) {
            icon.addEventListener('click', function(event) {
                event.preventDefault();
                currentIndex = index;
                showImage(0);
                document.getElementById('custom-lightbox').style.display = 'block';
            });
        }
        );

  }

  // Gestionnaire d'événement pour fermer la lightbox en appuyant sur la touche Échap
 document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        document.getElementById('custom-lightbox').style.display = 'none';
    }
   }); 