var UserPage = (function () {

    var initPanels = function () {

        $('a[data-toggle="collapse"]').click(function () {

            var $this = $(this),
                href = $this.attr('href'),
                $who = $(href),
                $parent = $this.parents('.panel');

            $parent.toggleClass('open');

            if ($who.hasClass('in'))
                $parent.siblings('.panel').delay(500).fadeIn('fast');
            else
                $parent.siblings('.panel').delay(500).fadeOut('fast');
        });
    };

    var setLayout = function () {

        var aside = $('aside').height();

        $('#desktop .tab-content')
            .height(aside + 32);

        $('#desktop .tab-container')
            .height(aside - 50)
            .perfectScrollbar({
                maxScrollbarLength: 40,
                wheelSpeed: 0.2
            });
    };

    return {
        init: function () {
            initPanels();
            setLayout();
        }
    }
})();