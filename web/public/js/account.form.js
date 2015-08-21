$(document).ready(function () {
    $('#options').show();
    $('#register-form').hide();
    $('#login-form').hide();
});
$('#register-show').click(function (e) {
    e.preventDefault();
    $('#options').hide();
    $('#register-form').show();
    $('#login-form').hide();
});
$('#login-show').click(function (e) {
    e.preventDefault();
    $('#options').hide();
    $('#login-form').show();
    $('#register-form').hide();
});
$('#init-show').click(function (e) {
    e.preventDefault();
    $('#options').show();
    $('#login-form').hide();
    $('#register-form').hide();
});

$('#init-show-login').click(function (e) {
    e.preventDefault();
    $('#options').show();
    $('#login-form').hide();
    $('#register-form').hide();
});

$('.register').click(function (e) {
    e.preventDefault();
    $('#options').hide();
    $('#login-form').hide();
    $('#register-form').show();
});

$('#login').click(function (e) {
    e.preventDefault();
    $('#options').hide();
    $('#login-form').show();
    $('#register-form').hide();
});
