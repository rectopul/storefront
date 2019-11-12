;(function($) {
    function nl2br(str, is_xhtml) {
        if (typeof str === 'undefined' || str === null) {
            return ''
        }
        var breakTag =
            is_xhtml || typeof is_xhtml === 'undefined' ? '<br />' : '<br>'
        return (str + '').replace(
            /([^>\r\n]?)(\r\n|\n\r|\r|\n)/g,
            '$1' + breakTag + '$2'
        )
    }
    /**
     * Connects to the Theme Customizer's color picker, and changes the anchor
     * color whenever the user changes colors in the Theme Customizer.
     */
    wp.customize('imprensa__pagetitle', function(value) {
        value.bind(function(to) {
            $('.imprensa__pagetitle h2').html(nl2br(to))
        })
    })

    wp.customize('imprensa__pagesubtitle', function(value) {
        value.bind(function(to) {
            $('.imprensa__pagetitle h4').html(nl2br(to))
        })
    })

    //imprensa__bannerextra__bloco_
    wp.customize('imprensa__bannerextra__bloco_0', function(value) {
        value.bind(function(to) {
            $('.block__bnex_0 > h3').html(nl2br(to))
        })
    })
})(jQuery)
