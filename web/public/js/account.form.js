var socialButtons = $('.social-buttons'),
    brand = $('.brand'),
    registerForm = $('.register-form'),
    loginForm = $('.login-form'),
    registerFooter = $('.register-footer'),
    loginFooter = $('.login-footer');

var c = 'hidden-xs hidden-sm';

function showInit() {
    $('.')
}

$('.back').click(function (e) {
    e.preventDefault();
    socialButtons.show();
    brand.show();
    registerForm.hide();
    loginForm.hide();
    registerFooter.hide();
    loginFooter.show();
});

function addClass(selector, class_to_add) {
    if (!selector.hasClass(class_to_add))
        selector.addClass(class_to_add);
}

function removeClass(selector, class_to_remove) {
    if (selector.hasClass(class_to_remove))
        selector.removeClass(class_to_remove);
}

//$('a[href=#rlogin-modal]').click(function (e) {
//    e.preventDefault();
//    socialButtons.show();
//    brand.show();
//    registerForm.hide();
//    loginForm.hide();
//    registerFooter.hide();
//    loginFooter.show();
//});

$('.register-show').click(function (e) {
    e.preventDefault();
    brand.hide();
    socialButtons.hide();
    registerForm.show();
    loginForm.hide();
    registerFooter.hide();
    loginFooter.show();
});
$('.login-show').click(function (e) {
    e.preventDefault();
    brand.hide();
    socialButtons.hide();
    registerForm.hide();
    loginForm.removeClass(c);
    loginFooter.hide();
    registerFooter.show();
});
$('#init-show').click(function (e) {
    e.preventDefault();
    brand.show();
    socialButtons.show();
    loginForm.hide();
    registerForm.hide();
});

$('#init-show-login').click(function (e) {
    e.preventDefault();
    brand.show();
    socialButtons.show();
    loginForm.hide();
    registerForm.hide();
});

$('.register').click(function (e) {
    e.preventDefault();
    brand.hide();
    socialButtons.hide();
    loginForm.hide();
    registerForm.show();
});

$('#login').click(function (e) {
    e.preventDefault();
    brand.hide();
    socialButtons.hide();
    loginForm.show();
    registerForm.hide();
});
