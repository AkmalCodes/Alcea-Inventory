document.addEventListener('DOMContentLoaded', function () {
    initializeDropdownMenus();
    initializeSubmenuItems();
    initializeBackButtons();
    initializeDocumentClickListener();
    showLoginForm();
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

function initializeDocumentClickListener() {
    document.addEventListener('click', function (event) {
        const isClickInsideDropdown = event.target.closest('.desktop-dropdown-menu');
        const isClickInsideLoginForm = event.target.closest('.login-form');
        const isClickLoginButton = event.target.closest('.login-show');
        
        if (!isClickInsideDropdown) {
            // Close all open dropdown menus
            const openDropdowns = document.querySelectorAll('.desktop-dropdown-menu .show');
            openDropdowns.forEach(function (dropdown) {
                dropdown.classList.remove('show');
            });
        }
        if (!isClickInsideLoginForm && !isClickLoginButton) {
            // Close the login form
            const loginForm = document.querySelector('.login-form');
            const body = document.body;
            if (loginForm.classList.contains('show')) {
                loginForm.classList.remove('show');
                body.classList.remove('blurred');
            }
        }
    });
}


function showLoginForm() {
    const LoginShowButtons = document.querySelectorAll('.login-show');
    const loginForm = document.querySelector('.login-form');
    const body = document.body;

    LoginShowButtons.forEach(function (showLogin) {
        showLogin.addEventListener('click', function (event) {
            event.preventDefault();
            loginForm.classList.toggle('show');
            body.classList.toggle('blurred');
        });
    });
}
