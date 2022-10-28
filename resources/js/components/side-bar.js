const nav_menu = document.querySelector("#sidebar");
const href = window.location.href;
if (nav_menu) {
    nav_menu.querySelectorAll("a").forEach((link) => {
        if (link.href === href) {
            // add class active
            link.parentElement.classList.add("active");
            const parent =
                link.parentElement.parentElement.parentElement.parentElement;
            parent.classList.add("show");
            parent.parentElement.classList.add("active");
        }
    });
}
