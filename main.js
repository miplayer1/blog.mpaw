// fonction modification opacité .socials au scroll
function dimm()
{
  setInterval(function()
  {
    document.getElementsByClassName('socials')[0].style.opacity = '1';  
  },1000);
  
  document.getElementsByClassName('socials')[0].style.opacity = '0.3';
}

// fonction d'affichage de la barre de progression du scroll
function progressBar(){

  // détection scroll dans la page
	var yScroll = window.pageYOffset;
  // debug
	//console.log(yScroll);
  
  // détection hauteur document
  var hauteurBody = document.body.clientHeight;
  // debug
  //console.log(hauteurBody);

  // détection hauteur intérieure browser
  var fenetre = window.innerHeight;
  // debug
  //console.log(fenetre);

  // calcul du pourcentage de scroll
  var scrollPercent = (yScroll / (hauteurBody-fenetre)) * 100;
  // debug
  //console.log(scrollPercent);

  document.getElementById("bar").style.width = scrollPercent + "%";
}

// ajout listeners sur évènement scroll
window.addEventListener('scroll',dimm);
window.addEventListener("scroll", progressBar);




