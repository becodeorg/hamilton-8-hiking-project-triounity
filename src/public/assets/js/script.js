// Selectors
const menuIcon = document.querySelector('.menuIcon');
const navLinks = document.querySelector('.navLinks');

/************ Menu Responsive ************/
// Event listener for the "menu" button
menuIcon.addEventListener('click', () => {
  document.querySelector('.navbar').classList.toggle('active');
});


document.addEventListener('DOMContentLoaded', function () {
  // Selectors
  const toggleLinks = document.querySelectorAll('.toggle-page');
  const pageContainer = document.querySelector('.page-container');
  // Loop through all toggle links
  toggleLinks.forEach(link => {
    // Add a "click" event listener to each link
    link.addEventListener('click', function (event) {
      event.preventDefault(); // Prevent the default link behavior
      
      // Toggle the "show-register" class on the "page-container" div
      pageContainer.classList.toggle('show-register');
    });
  });
});

