// Selectors
const menuIcon = document.querySelector('.menuIcon');
const navLinks = document.querySelector('.navLinks');

/************ Menu Responsive ************/
// Event listener for the "menu" button
menuIcon.addEventListener('click', () => {
  document.querySelector('.navbar').classList.toggle('active');
});

