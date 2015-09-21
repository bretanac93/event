var socialButtons = $('.social-buttons'),
    brand = $('.brand'),
    registerForm = $('.register-form'),
    loginForm = $('.login-form'),
    registerFooter = $('.register-footer'),
    loginFooter = $('.login-footer');

var c = 'hidden-xs hidden-sm';

function showInit() {
    removeClass(socialButtons, c);
    removeClass(brand, c);
    removeClass(loginFooter, c);
    addClass(registerForm, c);
    addClass(loginForm, c);
    addClass(registerFooter, c);
}

function showRegister() {
    removeClass(registerForm, c);
    removeClass(loginFooter, c);
    addClass(loginForm, c);
    addClass(brand, c);
    addClass(socialButtons, c);
    addClass(registerFooter, c);
}

function showLogin() {
    addClass(registerForm, c);
    addClass(loginFooter, c);
    removeClass(loginForm, c);
    addClass(brand, c);
    addClass(socialButtons, c);
    removeClass(registerFooter, c);
}

function addClass(selector, class_to_add) {
    if (!selector.hasClass(class_to_add))
        selector.addClass(class_to_add);
}

function removeClass(selector, class_to_remove) {
    if (selector.hasClass(class_to_remove))
        selector.removeClass(class_to_remove);
}

$('a[href="#rlogin-modal"]').click(function (e) {
    showInit();
});

$('.back').click(function (e) {
    e.preventDefault();
    showInit();
});

$('.register-show').click(function (e) {
    e.preventDefault();
    showRegister();
});
$('.login-show').click(function (e) {
    e.preventDefault();
    showLogin();
});
$('#init-show').click(function (e) {
    e.preventDefault();
    showInit();
});

$('#init-show-login').click(function (e) {
    e.preventDefault();
    showLogin()
});

$('.register').click(function (e) {
    e.preventDefault();
    showRegister();
});

$('#login').click(function (e) {
    e.preventDefault();
    showLogin();
});
