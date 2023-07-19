document.addEventListener("DOMContentLoaded", function () {
    var currentUrl = window.location.href;
    var sidebarLinks = document.querySelectorAll(".sidebar-link");

    sidebarLinks.forEach((sidebarLink) => {
        let sidebarLinkUrl = sidebarLink.getAttribute("href");
        let openMenu = sidebarLink.nextElementSibling;
        let pathname = sidebarLink.pathname;

        if (
            currentUrl.startsWith(sidebarLinkUrl) &&
            currentUrl.length === sidebarLinkUrl.length
        ) {
            sidebarLink.classList.add("active");

            if (openMenu !== null && openMenu.classList.contains("open-menu")) {
                openMenu.classList.add("show");
            }
        }

        if (openMenu !== null && openMenu.classList.contains("open-menu")) {
            let childLinks = openMenu.querySelectorAll(".menu-child-link");

            childLinks.forEach((childLink) => {
                let childLinkUrl = childLink.getAttribute("href");

                if (childLinkUrl === currentUrl) {
                    sidebarLink.classList.add("active");
                    childLink.classList.add("active");
                    openMenu.classList.add("show");
                }

                if (currentUrl.includes(pathname)) {
                    sidebarLink.classList.add("active");
                    openMenu.classList.add("show");
                }
            });
        }
    });
});
