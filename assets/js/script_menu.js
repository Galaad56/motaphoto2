//gestion ouverture menu

console.log ("test menu");

//const burgerMenu = document.querySelector('.burger-menu');
const burgerMenu = document.getElementById('test-burger');

const menuItems = document.querySelector('.menu-items');
const bar1=document.querySelector('.bar1');
const bar2=document.querySelector('.bar2');
const bar3=document.querySelector('.bar3');

let compteur=true;

console.log(burgerMenu);
burgerMenu.addEventListener('click', () => {
    if (compteur) {
        menuItems.classList.add('show-menu');
        bar1.classList.add('bar1--move');
        bar2.classList.add('bar--hide');
        bar3.classList.add('bar3--move');
        compteur=false;

    }else{

        resetMenu()
    }
});
//gestion lien menu burger

/* const link1=document.querySelector('.link1');
const link2=document.querySelector('.link2');
const link3=document.querySelector('.link3');
const link4=document.querySelector('.link4');

link1.addEventListener('click', resetMenu);
link2.addEventListener('click', resetMenu);
link3.addEventListener('click', resetMenu);
link4.addEventListener('click', resetMenu); */


function resetMenu() {
    menuItems.classList.remove('show-menu');
    bar1.classList.remove('bar1--move');
    bar2.classList.remove('bar--hide');
    bar3.classList.remove('bar3--move');
    bar1.classList.add('bar1--remove');
    bar3.classList.add('bar3--remove');
    compteur = true;
  }