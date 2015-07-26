$(function () {

        var $window = $(window),
            $menu = $('.st-menu');

        var fixedHandler = (function () {
            var topbar = 49,
                ratio = 1.777777777777778, //aspect ratio for 1920x1080 images
                compute = function () {
                    return topbar + ($window.width() + 30) / ratio;
                },
                locate = function () {
                    var ch = $('.carousel').height() + topbar;
                    $('.wrapper').css({'top': (ch || compute()) + 'px'});
                },
                resize = function () {
                    $('.wrapper').css({'top': $('.carousel').height() + topbar + 'px'});
                    // TODO: update carousel indicators
                };
            return {
                locate: locate,
                resize: resize
            }
        })();

        // morph search input
        var morphComponent = (function () {
            var $morphSearch = $('#morphsearch'),
                $input = $('input.morphsearch-input'),
                $ctrlClose = $('span.morphsearch-close'),
                isOpen = isAnimating = false,

                toggleSearch = function (evt) {

                    if (evt && evt.type.toLowerCase() === 'focus' && isOpen) return false;

                    if (isOpen) {
                        $morphSearch.removeClass('open');
                        if ($input.val() !== '') {
                            setTimeout(function () {
                                $morphSearch.addClass('hideInput');
                                setTimeout(function () {
                                    $morphSearch.removeClass('hideInput');
                                    $input.val(' ');
                                }, 300);
                            }, 500);
                        }
                        setTimeout(function () {
                            $morphSearch.removeClass('over');
                        }, 300);
                        $input.blur();
                    } else {
                        $morphSearch.addClass('over open');
                    }
                    isOpen = !isOpen;
                };

            $input.focus(toggleSearch);
            $ctrlClose.click(toggleSearch);

            $(document).keydown(function (ev) {
                var keyCode = ev.keyCode || ev.which;
                if (keyCode === 27 && isOpen) {
                    toggleSearch(ev);
                }
            });

            return {toggle: toggleSearch};
        })();

        function all() {
            var args = Array.prototype.slice.call(arguments);
            args.forEach(function (item) {
                console.log(item);
            });
        }

        function hasParentClass(e, classname) {
            if (e === document) return false;
            if ($(e).hasClass(classname))
                return true;
            return e.parentNode && hasParentClass(e.parentNode, classname);
        }

        function resetMenu(ev) {
            if (!ev || !hasParentClass(ev.toElement, 'st-menu')) {
                $menu.removeClass('st-open');
                $(document).off('click', resetMenu);
            }
        }

        $('#carousel').carousel({
            interval: 3500
        });

        $.stellar({
            horizontalScrolling: false,
            responsive: true,
            hideDistantElements: false
        });

        fixedHandler.locate();
        $window.resize(fixedHandler.resize);

        $('#profile').click(function (ev) {
            ev.preventDefault();
            ev.stopPropagation();

            if (!$menu.hasClass('st-open')) {
                $menu.addClass('st-open');
                $(document).on('click', resetMenu);
            }
            else resetMenu();
        });

        $window.scroll(function () {

            if ($menu.hasClass('st-open'))
                $menu.removeClass('st-open');
            else
                $menu.css({'top': $window.scrollTop() + 51});

            if ($('.morphsearch').hasClass('open'))
                morphComponent.toggle();
        });
    }
);