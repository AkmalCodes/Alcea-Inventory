document.addEventListener('DOMContentLoaded', function () {
    initializeDropdownMenus();
    initializeSubmenuItems();
    initializeBackButtons();
    initializeLoginForm();
    closeLoginForm();
    closeMobileMenu();
    closeDesktopDropdown();
});

function initializeDropdownMenus() {
    const dropDownMenu = document.querySelectorAll('.desktop-dropdown-menu > a');
    dropDownMenu.forEach(function (menu) {
        menu.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default link behavior
            const submenu = menu.nextElementSibling; // Get the next sibling ul
            submenu.classList.toggle('show'); // Toggle the 'show' class    
        });
    });
}

function initializeSubmenuItems() {
    const subMenuItems = document.querySelectorAll('.mobile-has-submenu > a');
    subMenuItems.forEach(function (submenu) {
        submenu.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default link behavior
            const subSubmenu = submenu.nextElementSibling; // Get the next sibling ul
            subSubmenu.classList.toggle('show'); // Toggle the 'show' class    
        });
    });
}

function initializeBackButtons() {
    const backButtons = document.querySelectorAll('.back-btn');
    backButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            const parentSubmenu = button.parentElement.parentElement;
            parentSubmenu.classList.remove('show'); // Remove the 'show' class from parent submenu
        });
    });
}

function closeMobileMenu() {
    document.addEventListener('click', function(event) {
        const mobileMenu = document.querySelector('.mobile-menu');
        const loginForm = document.querySelector('.login-form');
        const isClickNavbarToggler = event.target.closest('.navbar-toggler');
        const isClickMobileMenu = event.target.closest('.mobile-menu');
        const isClickInsideLoginForm = event.target.closest('.login-form');

        if (loginForm.classList.contains('show')) {
                return;
        }else if (mobileMenu.classList.contains('show') && !loginForm.classList.contains('show') && !isClickNavbarToggler && !isClickMobileMenu && !isClickInsideLoginForm) {
            const navbarToggler = document.querySelector('.navbar-toggler');
            console.log('Login form is not visible, close the mobile menu');
            if (navbarToggler) {
                setTimeout(() => {
                    navbarToggler.click();
                }, 0);
            }
        }
    });
}


function closeDesktopDropdown(){
    document.addEventListener('click', function (event) {
        const isClickInsideDropdown = event.target.closest('.desktop-dropdown-menu');

        if (!isClickInsideDropdown) {
            // Close all open dropdown menus
            const openDropdowns = document.querySelectorAll('.desktop-dropdown-menu .show');
            openDropdowns.forEach(function (dropdown) {
                dropdown.classList.remove('show');
            });
        }
    });
}


function closeLoginForm() {
    document.addEventListener('click', function (event) {
        const isClickInsideLoginForm = event.target.closest('.login-form');
        const isClickLoginButton = event.target.closest('.login-show');

        if (!isClickInsideLoginForm && !isClickLoginButton) {
            // Close the login form
            const loginForm = document.querySelector('.login-form');
            const body = document.body;
            if (loginForm.classList.contains('show')) {
                setTimeout(() => {
                    loginForm.classList.remove('show'); // added timeout to allow mobile menu to decide whether to clsoe or not
                }, 50);
                setTimeout(function() {
                loginForm.classList.remove('showing');
                }, 400); // Match this duration with the transition time in CSS
                body.classList.remove('blurred');
            }
        }
    });
}

function initializeLoginForm() {
    const loginShowButtons = document.querySelectorAll('.login-show');
    const loginForm = document.querySelector('.login-form');
    const body = document.body;
    // const mobileMenu = document.querySelector('.mobile-menu');

    loginShowButtons.forEach(function (showLogin) {
        showLogin.addEventListener('click', function (event) {
            event.preventDefault();

            // Close mobile menu if it is currently open
            // if (mobileMenu.classList.contains('show')) {
            //     const navbarToggler = document.querySelector('.navbar-toggler');
            //     if (navbarToggler) {
            //         // setTimeout(function() {
            //             navbarToggler.click();
            //         // }, 200);
            //     }
            // }
            // Add the 'showing' class first to make it visible
            loginForm.classList.add('showing');
            body.classList.add('blurred');

            // Use setTimeout to add 'show' class after a short delay
            setTimeout(function() {
                loginForm.classList.add('show');
            }, 100); // Adjust the delay if needed for smoother transition
        });
    });

        
}

