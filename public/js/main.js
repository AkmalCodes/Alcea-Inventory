document.addEventListener('DOMContentLoaded', function () {
    initializeDropdownMenus();
    initializeSubmenuItems();
    initializeBackButtons();
    initializeLoginForm();
    initializeRegisterForm();
    initializeInventoryForm();
    closeInventoryForm();
    closeRegisterForm();
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
        const registerForm = document.querySelector('.register-form');
        const logoutForm = document.querySelector('.logout-form'); // Assuming you have a logout form
        const isClickNavbarToggler = event.target.closest('.navbar-toggler');
        const isClickMobileMenu = event.target.closest('.mobile-menu');
        const isClickInsideLoginForm = event.target.closest('.login-form');
        const isClickInsideRegisterForm = event.target.closest('.register-form');
        const isClickInsideLogoutForm = event.target.closest('.logout-form'); // Handling logout form clicks
    
        // If either login or register form is open, do nothing
        if (loginForm.classList.contains('show') || registerForm.classList.contains('show') ){
            return;
        } 
    
        // If mobile menu is open and neither login nor register forms are open
        if (mobileMenu.classList.contains('show') && 
            !loginForm.classList.contains('show') && 
            !registerForm.classList.contains('show') && 
            !isClickNavbarToggler && 
            !isClickMobileMenu && 
            !isClickInsideLoginForm && 
            !isClickInsideRegisterForm && 
            !isClickInsideLogoutForm) {
    
            const navbarToggler = document.querySelector('.navbar-toggler');
            console.log('No form is visible, close the mobile menu');
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

function closeFormWithTransition(form) {
    const body = document.body;

    // Check if the form is a jQuery object
    if (form instanceof jQuery) {
        // jQuery method
        setTimeout(() => {
            form.removeClass('show');
        }, 50);
        setTimeout(function() {
            form.removeClass('showing');
        }, 100);
    } else {
        // Vanilla JS method
        setTimeout(() => {
            form.classList.remove('show');
        }, 50);
        setTimeout(function() {
            form.classList.remove('showing');
        }, 100);
    }

    // Remove inventory blur after transition
    setTimeout(function() {
        body.classList.remove('inventory-blurred');
    }, 200);
}

function closeLoginForm() {
    document.addEventListener('click', function (event) {
        const isClickInsideLoginForm = event.target.closest('.login-form');
        const isClickLoginButton = event.target.closest('.login-show');
        const isInputFocused = document.activeElement.closest('.login-form');

        if (!isClickInsideLoginForm && !isClickLoginButton && !isInputFocused) {
            // Close the login form
            const loginForm = document.querySelector('.login-form');
            if (loginForm.classList.contains('show')) {
                closeFormWithTransition(loginForm);
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
            // Add the 'showing' class first to make it visible
            loginForm.classList.add('showing');
            body.classList.add('login-blurred');

            // Use setTimeout to add 'show' class after a short delay
            setTimeout(function() {
                loginForm.classList.add('show');
            }, 100); // Adjust the delay if needed for smoother transition
        });
    });     
}

function closeRegisterForm() {
    document.addEventListener('click', function (event) {
        const isClickInsideRegisterForm = event.target.closest('.register-form');
        const isClickRegisterButton = event.target.closest('.register-show');
        const isInputFocused = document.activeElement.closest('.register-form');

        if (!isClickInsideRegisterForm && !isClickRegisterButton && !isInputFocused) {
            // Close the login form
            const registerForm = document.querySelector('.register-form');
            if (registerForm.classList.contains('show')) {
                closeFormWithTransition(registerForm);
            }
        }
    });
}

function initializeRegisterForm() {
    const registerShowButton = document.querySelectorAll('.register-show');
    const registerForm = document.querySelector('.register-form');
    const body = document.body;
    // const mobileMenu = document.querySelector('.mobile-menu');

    registerShowButton.forEach(function (showRegister) {
        showRegister.addEventListener('click', function (event) {
            event.preventDefault();

            // Add the 'showing' class first to make it visible
            registerForm.classList.add('showing');
            body.classList.add('register-blurred');

            // Use setTimeout to add 'show' class after a short delay
            setTimeout(function() {
                registerForm.classList.add('show');
            }, 100); // Adjust the delay if needed for smoother transition
        });
    });     
}

function closeInventoryForm() {
    document.addEventListener('click', function (event) {
        const isClickInsideInventoryForm = event.target.closest('.inventory-add-form, .inventory-update-form'); // Include both forms
        const isClickInventoryButton = event.target.closest('.additem-show, .updateitem-show'); // Include update button
        const isInputFocused = document.activeElement.closest('.inventory-add-form, .inventory-update-form'); // Check if focused element is in any form

        if (!isClickInsideInventoryForm && !isClickInventoryButton && !isInputFocused) {
            const inventoryAddForm = document.querySelector('.inventory-add-form');
            const inventoryUpdateForm = document.querySelector('.inventory-update-form'); // Add update form selector

            // Hide add form if visible
            if (inventoryAddForm && inventoryAddForm.classList.contains('show')) {
                closeFormWithTransition(inventoryAddForm);
            }

            // Hide update form if visible
            if (inventoryUpdateForm && inventoryUpdateForm.classList.contains('show')) {
                closeFormWithTransition(inventoryUpdateForm);
            }
        }
    });
}

function initializeInventoryForm() {
    const inventoryShowButton = document.querySelectorAll('.additem-show');
    const inventoryUpdateButton = document.querySelectorAll('.updateitem-show'); // Update button
    const inventoryAddForm = document.querySelector('.inventory-add-form');
    const inventoryUpdateForm = document.querySelector('.inventory-update-form'); // Update form
    const body = document.body;

    // Show Add Item Form
    inventoryShowButton.forEach(function (showRegister) {
        showRegister.addEventListener('click', function (event) {
            event.preventDefault();

            inventoryAddForm.classList.add('showing');
            body.classList.add('inventory-blurred');

            setTimeout(function() {
                inventoryAddForm.classList.add('show');
            }, 100);
        });
    });

    // Show Update Item Form
    inventoryUpdateButton.forEach(function (showUpdate) {
        showUpdate.addEventListener('click', function (event) {
            event.preventDefault();

            inventoryUpdateForm.classList.add('showing');
            body.classList.add('inventory-blurred');

            setTimeout(function() {
                inventoryUpdateForm.classList.add('show');
            }, 100);
        });
    });
}




