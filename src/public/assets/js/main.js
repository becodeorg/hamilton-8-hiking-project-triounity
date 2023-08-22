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

function openConfirmDialog() {
  document.getElementById("deleteConfirmDialog").style.display = "flex";
}

function confirmDelete() {
  document.getElementById("delete-hike-form").submit();
}

function cancelDelete() {
  document.getElementById("deleteConfirmDialog").style.display = "none";
}

