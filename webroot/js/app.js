var flash = document.getElementById('flash');
var fermer = document.getElementById('fermer');

fermer.addEventListener("click", fermer);

function fermer(evt) {
    flash.style.display="none";
}