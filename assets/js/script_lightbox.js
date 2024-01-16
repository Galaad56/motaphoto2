/*  // Sélectionnez toutes les images avec la classe "img-overlay"
const overlayImages = document.querySelectorAll('.img-overlay');
 console.log(overlayImages);
 // Créez un tableau pour stocker les sources des images
const imageSources = [];

 // Parcourez toutes les images et ajoutez leur source au tableau
overlayImages.forEach(function (image) {
     imageSources.push("http://mota-eric.local/wp-content/uploads/2023/11/nathalie-3-scaled.webp");
     
 });
 */
 // Affichez le tableau dans la console (à des fins de débogage)
/*  console.log('tableau', imageSources); */

 
 lightbox()
 
  
function lightbox(){   
    
    // Créez un tableau pour stocker les informations sur chaque photo
    const photos = [];

    // Sélectionnez tous les conteneurs de miniature
    const thumbnailContainers = document.querySelectorAll('.img-overlay');

    // Remplissez le tableau avec les informations nécessaires
    thumbnailContainers.forEach(function (container, index) {
        /* var thumbnailImage = container.querySelector('img'); */
        /* var category = container.querySelector('.infos-photo p:last-child').textContent.trim();
        var reference = container.querySelector('.infos-photo #reference_span').textContent.trim();
    */
        photos.push({
            src: container.dataset.src,
            // category: category,
            //reference: reference
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

        // Mettez à jour le contenu de la lightbox
        lightboxImg.src = currentPhoto.src;
        lightboxCategory.textContent = currentPhoto.category;
        lightboxReference.textContent = currentPhoto.reference;
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

    /*  thumbnailContainers.forEach(function (container, index) {
        var fullIcon = container.querySelector('.icon_full');
        fullIcon.addEventListener('click', function (event) {
            event.preventDefault();
            currentIndex = index;
            showImage(0);
            document.getElementById('custom-lightbox').style.display = 'block';
        });
    }); */

    // Gestionnaire d'événement pour fermer la lightbox en appuyant sur la touche Échap
    /*  document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.getElementById('custom-lightbox').style.display = 'none';
        }
        }); */
 }