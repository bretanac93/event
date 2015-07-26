$(function () {

        var $window = $(window),
            $menu = $('.st-menu');

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

        //todo: sort plugins scripts

        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            autoplay: 3500,
            paginationClickable: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 30,
            effect: 'fade',
            loop: true
        });

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

        // todo: use modernizr

        function locateWrapper() {
            $('.wrapper').css({'top': $window.height()});
        }

        $window.resize(function () {
            if ($('.wrapper').scrollTop() > $window.height())
                locateWrapper();
        });

        $.stellar({
            horizontalScrolling: false,
            responsive: true,
            hideDistantElements: false
        });

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