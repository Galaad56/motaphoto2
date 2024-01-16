

let currentIndex = 0; // Initialisez l'index à zéro
// Créez un tableau pour stockerchaque photo
const photos = [];

 // Créez un tableau pour stocker les informations sur chaque photo
const infos = [];

let icons =  document.querySelectorAll('.icon_full');

 //fobnction affichage dans la lightbox   
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
  
//fontion remplissage des tableaux photos src et infos page initiale
  function lightbox(){      
    
        
        //RaZ tableaux    
        photos.splice(0, photos.length);
        infos.splice(0, infos.length);


        // Sélectionnez tous les images
        const vignettes = document.querySelectorAll('.img-overlay');

        // Remplissez le tableau avec les informations nécessaires
        vignettes.forEach(function (vignette) {
            //console.log (vignette)
            photos.push({
                src: vignette.dataset.src,
            });
        });

        console.log("photos",photos);

     
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

        console.log("infos",infos);


  }

  //fontion remplissage des tableaux photos src et infos pages load more te filtres
  function lightbox2(){      
    
        
        //RaZ tableaux    
        photos.splice(0, photos.length);
        infos.splice(0, infos.length);


        // Sélectionnez tous les images
        const vignettes = document.querySelectorAll('.img-overlay');

        // Remplissez le tableau avec les informations nécessaires
        vignettes.forEach(function (vignette) {
            console.log (vignette)
            photos.push({
                src: vignette.getAttribute('src'),
            });
        });

        console.log("photos",photos);

     
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

        console.log("infos",infos);


  }

  // Gestionnaire d'événement pour fermer la lightbox en appuyant sur la touche Échap
    document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        document.getElementById('custom-lightbox').style.display = 'none';
    }
   }); 

    // Gestionnaire d'événement pour ouvrir la lightbox au clic sur l'icône
    
    console.log('icons',icons);

    icons.forEach(function(icon, index) {
        icon.addEventListener('click', function(event) {
            event.preventDefault();
            currentIndex = index;
            lightbox()
            showImage(0);
            document.getElementById('custom-lightbox').style.display = 'block';
        });
    }
    );

   // Gestionnaire d'événement pour clic sur suivante
   var next_btn =  document.getElementById('next_btn');
        next_btn.addEventListener('click', function(event) {
           showImage(1);
        });

    // Gestionnaire d'événement pour clic sur suivante
    var prev_btn =  document.getElementById('prev_btn');
    prev_btn.addEventListener('click', function(event) {
        showImage(-1);
    });

// fermer la lightbox avec la croix
var modalLightbox = document.getElementById('custom-lightbox');
var span = document.getElementById('close-lightbox');


span.onclick = function() {
    modalLightbox.style.display = "none";
}

// Gestionnaire d'événement pour fermer la lightbox en appuyant sur la touche Échap
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        document.getElementById('custom-lightbox').style.display = 'none';
    }
   }); 