var HomePage = (function () {

    var $window = $(window),

        hasParentClass = function (e, classname) {
            if (e === document) return false;
            if ($(e).hasClass(classname)) return true;
            return e.parentNode && hasParentClass(e.parentNode, classname);
        },

        initSwiper = function () {
            var swiper = new Swiper('.swiper-container', {
                pagination: '.swiper-pagination',
                autoplay: 3500,
                paginationClickable: '.swiper-pagination',
                spaceBetween: 30,
                effect: 'fade',
                loop: true
            });
        },

        initSearch = function () {
            $window.scroll(function () {

                var searchOffset =
                    $('#searchMain')[0].getBoundingClientRect().top;

                if (searchOffset < 40) $('#searchTop').addClass('toggle');
                else $('#searchTop').removeClass('toggle');
            });
            var eventType = Events.isMobile ? 'touchstart' : 'click';

            $('#searchTop').on(eventType, function (ev) {
                ev.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 1000, function () {
                    $('#searchMain').focus();
                });
            });
        },

        initDatepicker = function () {
            $('.date-picker').datepicker({
                orientation: "right",
                autoclose: true
            });
        },

        initNavigation = function () {

            $.extend($.expr[':'], {
                isBlock: function (obj) {
                    if (!obj) return false;
                    return $(obj).css('display') === 'block';
                }
            });

            function toggleNavMobile(ev) {
                if (hasParentClass(ev.target, 'navg')) return;
                var active = $('nav').find('div:not(.first):isBlock');
                if (active.length === 0) return;
                $(active[0]).fadeOut(100);
                $('.first').fadeIn(100);
                $(document).off(ev.type, toggleNavMobile);
            }

            function toggleNav(ev) {
                ev.preventDefault();
                var $this = $(this);
                var $target = ['.', $this.attr('id').substr(3)].join('');
                $('.first').fadeOut(100);
                $($target).fadeIn(100);
                if (ev.type === 'touchstart') {
                    $(document).on(ev.type, toggleNavMobile);
                }
            }

            $('[id^=go]')
                .hover(toggleNav)
                .on('touchstart', toggleNav);

            $('.second, .third').parent().mouseleave(function () {
                $(this).children().fadeOut(100);
                $('.first').fadeIn(100);
            });

            $('.event').hover(function () {
                $(this).addClass('active');
            }, function () {
                tooltips.reset();
                $(this).removeClass('active');
            });
        },

        tooltips = (function () {
            var active = null,
                $that = undefined,
                show = function (obj) {
                    var $target = $that.parent().siblings(obj),
                        hideTarget = function () {
                            hide($target);
                            reset();
                        };
                    $target.addClass('working');
                    Events.isMobile ? $('.event *:not(.working)').on('touchstart', hideTarget) : $target.mouseleave(hideTarget);
                    active = obj;
                },
                hide = function (obj) {
                    $(obj).removeClass('working');
                },
                reset = function () {
                    if (active) {
                        hide(active);
                        active = null;
                    }
                };

            $('.lgroup').mouseenter(function () {
                $that = $(this);
                var targetClass = ['.', $that.data('toggle')].join('');
                if (active) {
                    if (active !== targetClass) {
                        hide(active);
                        show(targetClass);
                    }
                } else {
                    show(targetClass);
                }
            });

            return {
                reset: reset
            };
        })(),

        initCounters = function () {
            $('.stats > ul').appear(function () {
                $("[data-to]").each(function () {
                    var count = $(this).attr('data-to');
                    $(this).delay(6000).countTo({
                        from: 50,
                        to: count,
                        speed: 3000,
                        refreshInterval: 50
                    });
                });
            });
        };

    return {
        init: function () {
            initSwiper();
            initSearch();
            initDatepicker();
            initNavigation();
            initCounters();
        }
    }
})();
