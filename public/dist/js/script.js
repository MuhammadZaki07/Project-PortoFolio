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
    const userphoto = document.getElementById("user-photo");
    const hamburgerButton = document.getElementById("hamburger");
    if (hamburgerButton) {
        document.addEventListener("click", function () {
            const navMenu = document.getElementById("nav-menu");
            if (navMenu) {
                navMenu.classList.toggle("hidden");
            }
        });
    }


    if (userphoto) {
        userphoto.addEventListener("click", function (event) {
            event.stopPropagation();
            const dropdown = document.getElementById("dropdown");
            if (dropdown) {
                dropdown.classList.toggle("hidden");
            }
        });
    }

    document.addEventListener("click", function (event) {
        const dropdown = document.getElementById("dropdown");
        if (dropdown && !dropdown.classList.contains("hidden")) {
            if (!userphoto.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add("hidden");
            }
        }
    });

});
