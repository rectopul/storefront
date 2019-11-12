/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
;(function($) {
    /**
     * Format Text Function NL2BR
     */

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

    // Update the site title in real time...
    /* wp.customize('auaha_sobre_content_settings', function(value) {
          value.bind(function(newval) {
              $('.content-sbre').html(newval)
          })
      })
   */
    wp.customize('auaha_solucoes_num0', function(v) {
        v.bind(function(numval) {
            $('.number_0').html(numval)
        })
    })
    wp.customize('auaha_solucoes_num1', function(v) {
        v.bind(function(numval) {
            $('.number_1').html(numval)
        })
    })
    wp.customize('auaha_solucoes_num2', function(v) {
        v.bind(function(numval) {
            $('.number_2').html(numval)
        })
    })

    wp.customize('auaha_solucoes_num_desc0', function(v) {
        v.bind(function(numval) {
            $('.sol_desc_num_0').html(numval)
        })
    })

    wp.customize('auaha_solucoes_num_desc1', function(v) {
        v.bind(function(numval) {
            $('.sol_desc_num_1').html(numval)
        })
    })
    wp.customize('auaha_solucoes_num_desc2', function(v) {
        v.bind(function(numval) {
            $('.sol_desc_num_2').html(numval)
        })
    })
    //auaha_solucoes_desc_numbers_control
    wp.customize('auaha_solucoes_desc_numbers', function(v) {
        v.bind(function(numval) {
            $('.num-clients-text').html(nl2br(numval))
        })
    })

    //auaha_contact_title
    wp.customize('auaha_contact_title', function(v) {
        v.bind(function(numval) {
            $('.title-contact').html(nl2br(numval))
        })
    })

    //auaha_contact_desc
    wp.customize('auaha_contact_desc', function(v) {
        v.bind(function(numval) {
            $('.desc-contact').html(nl2br(numval))
        })
    })

    // CSS function.
    wp.customize('ptina_marketplace_background_image', function(value) {
        value.bind(function(to) {
            console.log(to)
        })
    })

    //desc-contact  auaha_contact_desc
})(jQuery)
