document.addEventListener('DOMContentLoaded', function() {
  //Selectors
  const menuIcon = document.querySelector('.menuIcon');
  const navLinks = document.querySelector('.navLinks');

  // Event listener for the "menu" button
  menuIcon.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    menuIcon.classList.toggle('active');

  });
});

/*
// Obtenir la liste des tags
const tagList = document.querySelector('.tagList');

// Dupliquer les tags pour créer un effet de défilement en cercle
const clonedTags = tagList.innerHTML;
tagList.innerHTML += clonedTags;*/


// Selectors

/*document.addEventListener('DOMContentLoaded', function () {
  // Selectors
  const toggleLinks = document.querySelectorAll('.toggle-page');
  const pageContainer = document.querySelector('.pageContainer');
  // Loop through all toggle links
  toggleLinks.forEach(link => {
    // Add a "click" event listener to each link
    link.addEventListener('click', function (event) {
      event.preventDefault(); // Prevent the default link behavior
      
      // Toggle the "show-register" class on the "page-container" div
      pageContainer.classList.toggle('show-register');
    });
  });
});*/

