const Navlinks = document.querySelectorAll(".nav-link");

Navlinks.forEach((link) => {
    link.addEventListener("click", (e) => {
        e.preventDefault();

        //     remove all the active class
        Navlinks.forEach((nav) => nav.classList.remove("active"));
        //     now add the active class to specific ones
        link.classList.add("active");
    });
});
