// Sélections d’éléments dans le DOM
const hamburger = document.getElementById('hamburger');
const headerNav = document.getElementById('header-nav');
const headerBtn = document.getElementById('header-btn');

// Événement sur l’icône hamburger (ouvre/ferme le menu)
hamburger.addEventListener('click', (event) => {
  // Empêche le clic de se propager au <body> si on gère la fermeture en cliquant ailleurs
  event.stopPropagation();

  // Bascule la classe "active" sur la nav 
  headerNav.classList.toggle('active');
});

// Fermer le menu quand on clique ailleurs que sur le nav ou le hamburger
document.addEventListener('click', (event) => {
  // Si le menu est ouvert et qu’on clique ailleurs, on le ferme
  if (
    headerNav.classList.contains('active') &&
    !headerNav.contains(event.target) &&
    !hamburger.contains(event.target)
  ) {
    headerNav.classList.remove('active');
    headerBtn.classList.remove('active');
  }
});

// Fonction pour afficher/masquer le mot de passe
function togglePassword() {
  let passwordField = document.getElementById('password');
  if (passwordField.type === 'password') {
    passwordField.type = 'text';
  } else {
    passwordField.type = 'password';
  }
}