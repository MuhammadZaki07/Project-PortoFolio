window.onscroll = function () {
    const header = document.querySelector("header");
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
    } else {
        header.classList.remove("navbar-fixed");
    }
};

const darkModeToggle = document.getElementById("dark");
const lightModeToggle = document.getElementById("light");
const htmlElement = document.getElementById("html");

document.addEventListener("DOMContentLoaded", () => {
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        htmlElement.classList.add("dark");
    } else {
        htmlElement.classList.remove("dark");
    }
});

darkModeToggle.addEventListener("click", function (event) {
    event.preventDefault();
    htmlElement.classList.add("dark");
    localStorage.setItem("theme", "dark");
});

lightModeToggle.addEventListener("click", function (event) {
    event.preventDefault();
    htmlElement.classList.remove("dark");
    localStorage.setItem("theme", "light");
});


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
            if (
                !userphoto.contains(event.target) &&
                !dropdown.contains(event.target)
            ) {
                dropdown.classList.add("hidden");
            }
        }
    });
});
