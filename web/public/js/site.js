$(function() {
    function all() {
        var args = Array.prototype.slice.call(arguments);
        args.forEach(function(item) {
            console.log(item);
        });
    };
    var fixedHandler = (function() {
        var topbar = 51,
            //aspect ratio for 1920x1080 images
            ratio = 1.777777777777778,
            compute = function() {
                return topbar + ($(window).width() + 30) / ratio;
            },
            indicators = function() {
                // todo: use the .wrapper top property
                // if ($('.carousel').height() > $(window).height()) {
                //     $('.carousel-indicators').css('top', $(window).height() - 100);
                // }
            },
            locate = function() {
                $('.wrapper').css({
                    'top': ($('.carousel').height() || compute()) + 'px'
                });
                indicators();
            },
            resize = function() {
                $('.wrapper').css({
                    'top': $('.carousel').height() + topbar + 'px'
                });
                indicators();
            }
        return {
            locate: locate,
            resize: resize
        }
    })();
    $('#carousel').carousel({
        interval: 3500
    });
    $.stellar({
        horizontalScrolling: false,
        responsive: true,
        hideDistantElements: false
    });
    fixedHandler.locate();
    $(window).resize(fixedHandler.resize);
});