console.log("test modale");

// Gestion modale the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the button that opens the modal
var link = document.getElementById("menu-item-38");

//recupération text du paragraphe référence
var referenceParagraph = document.getElementById("reference_span").textContent;
console.log("Contenu du span : " + referenceParagraph);
//recupération du champ reférence du formulaire
var refPhotoField = document.getElementById("RefPhoto");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {

   refPhotoField.value = referenceParagraph;
   modal.style.display = "block";
}

link.addEventListener("click",(e)=>{
    e.preventDefault()
    modal.style.display = "block";
})


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//gestion image suivante-précédente

// function showDiv1() {
//     var hiddenDiv = document.getElementById('img-precedent');
//     hiddenDiv.style.transition = 'opacity 0.3s ease-in-out';
//     hiddenDiv.style.opacity = '1';
// }

// function hideDiv1() {
//     var hiddenDiv = document.getElementById('img-precedent');
//     hiddenDiv.style.transition = 'opacity 0.3s ease-in-out';
//     hiddenDiv.style.opacity = '0';
// }

function showDiv2() {
    var hiddenDiv = document.getElementById('img-suivant');
    hiddenDiv.style.transition = 'opacity 0.3s ease-in-out';
    hiddenDiv.style.opacity = '1';
}

function hideDiv2() {
    var hiddenDiv = document.getElementById('img-suivant');
    hiddenDiv.style.transition = 'opacity 0.3s ease-in-out';
    hiddenDiv.style.opacity = '0';
}