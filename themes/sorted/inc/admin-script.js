document.addEventListener('DOMContentLoaded', function () {
    const currentUrl = window.location.href; // Get the current URL

    // Highlight the current submenu item based on the URL
    const menuLinks = document.querySelectorAll('#adminmenu .wp-submenu a');

    menuLinks.forEach(function (link) {
        if (currentUrl.includes(link.getAttribute('href'))) {
            link.classList.add('current'); // Highlight the current link
        }
    });

    // Ensure that custom menus are always expanded
    const alwaysExpandedMenus = [
        'toplevel_page_content-settings',
        'toplevel_page_admin-settings'
    ];

    alwaysExpandedMenus.forEach(function (menuClass) {
        const menu = document.querySelector(`#adminmenu .menu-top.${menuClass}`);
        if (menu) {
            const submenu = menu.querySelector('.wp-submenu');
            if (submenu) {
                submenu.style.display = 'block'; // Always show the submenu
            }
        }
    });
});
