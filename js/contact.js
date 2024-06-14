document.addEventListener("DOMContentLoaded", function () {

  document.querySelector(".toggle").addEventListener("click", function () {
    var menu = document.querySelector(".menu");
    var navbar = document.getElementById("navbar");
    menu.classList.toggle("active");

    var icon = menu.classList.contains("active") ? "close-outline" : "menu-outline";
    this.querySelector("ion-icon").setAttribute("name", icon);

    navbar.classList.toggle("active");
  });

  document.querySelector(".profile").addEventListener("click", function () {
    var profileMenu = document.querySelector(".profileLogout");
    profileMenu.classList.toggle("active");

    var profileContainer = document.querySelector(".profileContainer");
    profileContainer.classList.toggle("blackBackground");
  });
});

function toggleNotifications() {
  var notifications = document.querySelector('.notif');
  if (notifications.style.display === 'none') {
    notifications.style.display = 'block'; 
  } else {
    notifications.style.display = 'none'; 
  }
}