$(document).ready(function () {
    var currentUrl = window.location.href;

    $(".sidebar-link").each(function () {
        var link = $(this);
        var linkUrl = link.attr("href");

        if (currentUrl === linkUrl) {
            link.addClass("active");
            var openMenu = link.next(".open-menu");
            if (openMenu.length > 0) {
                openMenu.addClass("show");
            }
        }

        var menuChild = link.next(".open-menu");
        if (menuChild.length > 0) {
            var childLink = menuChild.find(".menu-child-link");
            childLink.each(function () {
                var childLinkUrl = $(this).attr("href");
                if (currentUrl === childLinkUrl) {
                    $(this).addClass("active");
                    link.addClass("active");
                    var openMenu = link.next(".open-menu");
                    if (openMenu.length > 0) {
                        openMenu.addClass("show");
                    }
                }
            });
        }
    });
});
