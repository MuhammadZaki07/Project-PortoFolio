window.onscroll = function () {
    const header = document.querySelector("header");
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
    } else {
        header.classList.remove("navbar-fixed");
    }
};

document.addEventListener("DOMContentLoaded", function () {
    const hamburgerButton = document.getElementById("hamburger");
    const userphoto = document.getElementById("user-photo");
    if (hamburgerButton) {
        hamburgerButton.addEventListener("click", function () {
            const navMenu = document.getElementById("nav-menu");
            if (navMenu) {
                navMenu.classList.toggle("hidden");
            }
        });
    }

    if (userphoto) {
        userphoto.addEventListener("click", function () {
            const dropdown = document.getElementById("dropdown");

            if (dropdown) {
                dropdown.classList.toggle("hidden");
            }
        });
    }
});
