jQuery.noConflict() // Reverts '$' variable back to other JS libraries
jQuery(document).ready(function($) {
    /**
     * Check Nivel Submenus
     */
    if (
        $('.nav_logo .nav_logo__menu-wraper > ul > li > ul > li > ul').length >
        0
    ) {
        $('.nav_logo .nav_logo__menu-wraper > ul > li > ul > li > ul').each(
            function(index, element) {
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .addClass('sub-menu-lvl')
            }
        )
        $(
            '.nav_logo .nav_logo__menu-wraper > ul > li:not(.sub-menu-lvl) > ul'
        ).each(function(index, element) {
            $(this).css(
                'margin-left',
                '-' + ($(this).innerWidth() / 2 - 13.5) + 'px'
            )
        })
    }
})
