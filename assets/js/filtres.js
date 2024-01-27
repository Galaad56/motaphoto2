
jQuery(document).ready(function ($) {
    // Gestionnaire d'événements pour les changements dans les filtres
    $('#category-filter, #format-filter,#date-filter,#filter-switch,#format-switch,#date-switch').change(function () {
        
        // Condition pour afficher ou cacher le bouton "load-more"
         if ($('#categorie-selected').attr('data-value')=== 'all'&& $('#format-selected').attr('data-value')=== 'all') {
            $('#load-more').show(); // Afficher le bouton
        } else {
            $('#load-more').hide(); // Cacher le bouton
        }
     
        // Récupérer les valeurs des filtres
  
        var category = $('#categorie-selected').attr('data-value');
        var format = $('#format-selected').attr('data-value');
        var dateOrder = $('#date-selected').attr('data-value');

        console.log("test date" + dateOrder)
        //console.log(test)

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
                open_lightbox();
   
            }
        });

    
    });
});

// gestion filtres custom

// Change option categorie
const label = document.querySelector('#categorie-selected')
const options = Array.from(document.querySelectorAll('.select-categorie'))

console.log(" liste des options " + options)

options.forEach((option) => {
	option.addEventListener('click', () => {
		label.textContent = option.textContent


    // Récupérer la valeur de data-value de l'option sélectionnée
    const selectedValue = option.getAttribute('data-value');
    label.setAttribute('data-value', selectedValue);

    // Affichez la valeur dans la console pour vérifier
    console.log("Selected categorie: " + selectedValue);

	})
})


// Change option format
const label2 = document.querySelector('#format-selected')
const options2 = Array.from(document.querySelectorAll('.select-format'))

console.log(" liste des options " + options)

options2.forEach((option) => {
	option.addEventListener('click', () => {
		label2.textContent = option.textContent


    // Récupérer la valeur de data-value de l'option sélectionnée
    const selectedValue = option.getAttribute('data-value');
    label2.setAttribute('data-value', selectedValue);

    // Affichez la valeur dans la console pour vérifier
    console.log("Selected format: " + selectedValue);

	})
})


// Change date format
const label3 = document.querySelector('#date-selected')
const options3 = Array.from(document.querySelectorAll('.select-date'))

console.log(" liste des options " + options)

options3.forEach((option) => {
	option.addEventListener('click', () => {
		label3.textContent = option.textContent


    // Récupérer la valeur de data-value de l'option sélectionnée
    const selectedValue = option.getAttribute('data-value');
    label3.setAttribute('data-value', selectedValue);

    // Affichez la valeur dans la console pour vérifier
    console.log("Selected date: " + selectedValue);

	})
})


// Close dropdown onclick outside
document.addEventListener('click', (e) => {
	const toggle = document.querySelector('.dropdown__switch')
	const element = e.target

	if (element == toggle) return;

	const isDropdownChild = element.closest('.dropdown__filter')		
	
	if (!isDropdownChild) {
		toggle.checked = false
	}
})