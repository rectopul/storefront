function changeh6(element) {
    var classes = jQuery(element).attr('class'),
        text = jQuery(element).html()
    jQuery(this)
        .parent()
        .append('<span class="' + classes + '">' + text + '</span>')
    jQuery(this).remove()
}

jQuery.noConflict() // Reverts '$' variable back to other JS libraries
jQuery(document).ready(function($) {
    var $ = window.jQuery

    $(window).scroll(function() {
        if ($(this).scrollTop() > 65) {
            $('.container__nav-menu').css({
                'background-color': '#000000',
                position: 'fixed',
                left: 0,
                top: 0,
            })
        } else if ($(this).scrollTop() > 20) {
            $('.container__nav-menu').css({
                'background-color': 'transparent',
                position: 'relative',
                left: 'initial',
                top: '-45px',
            })
        } else {
            $('.container__nav-menu').css({
                'background-color': 'transparent',
                position: 'relative',
                left: 'initial',
                top: 'initial',
            })
        }
    })

    $('.spphone').mask('(00) 0000-00009')
    /**
     * Carrossel parceiros
     */
    var companies = new Swiper('.companies__carrossel-slide', {
        slidesPerView: 4,
        spaceBetween: false,
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 1,
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 4,
            },
        },
    })
    /**
     * Carrossel Page Trabalhe Conosco
     * clas: page__content-galery
     */
    var trabcom = new Swiper('.page__content-galery', {
        slidesPerView: 1,
        pagination: {
            el: '.page__content-galery-pagination',
            type: 'bullets',
            clickable: true,
        },
    })
    /**
     * Archive Ajuda
     */
    var archiveajuda = new Swiper('.archive__help-posts-container', {
        slidesPerView: 2,
        spaceBetween: 15,
        navigation: {
            nextEl: '.helppost-next',
            prevEl: '.helppost-prev',
        },
    })

    /**
     * Depoimentos Categoria
     * class: cat__depoiments-container
     */
    var comentscat = new Swiper('.cat__depoiments-container', {
        slidesPerView: 1,
        navigation: {
            nextEl: '.dep-next',
            prevEl: '.dep-prev',
        },
    })

    /**
     * Swiper de membros
     * container: equipehome__carroussel-container
     */
    var members = new Swiper('.equipehome__carroussel-container', {
        slidesPerView: 3,
        spaceBetween: 20,
        initialSlide: 1,
        grabCursor: true,
        navigation: {
            nextEl: '.members_next',
            prevEl: '.members_prev',
        },
    })

    /**
     * Swiper Depoimentos
     */
    var depoimentshome = new Swiper('.depoiments__items', {
        slidesPerView: 2,
        spaceBetween: 30,
        navigation: {
            nextEl: '.dpm_next',
            prevEl: '.dpm_prev',
        },
    })

    /**
     * Showcase Vitrine 1
     */

    var vitrine1 = new Swiper('.vitrine-1', {
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
            nextEl: '.vitrine_1_next',
            prevEl: '.vitrine_1_prev',
        },
        pagination: {
            el: '.pagination-vitr-1',
            clickable: true,
        },
    })

    if ($('.nav_logo .nav_logo__menu-wraper > ul > li > ul').length > 0) {
        $('.nav_logo .nav_logo__menu-wraper > ul').each(function(
            index,
            element
        ) {
            $(this).addClass('sub-menu-lvl')
        })
    }
    /**
     * Select Filter
     */

    $(document).on('click', '.search-form article div.active > ul', function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active')
        } else {
            $(this).addClass('active')
        }
    })

    var actClient, datatype, datawhy

    $(document).on(
        'click',
        '.search-form article div.active > ul > li',
        function() {
            /**
             * Click in action filter
             */
            if ($(this).data('actionClient')) {
                actClient = $(this).data('actionClient')
            } else if ($(this).data('type')) {
                datatype = $(this).data('type')
            } else if ($(this).data('why')) {
                datawhy = $(this).data('why')
            }

            var hasclass = $(this)
                    .parent()
                    .hasClass('active'),
                data_send = {
                    action: 'filter-home',
                    filter__nonce: js_global.filter__nonce,
                    'action-client': actClient,
                    type: datatype,
                    why: datawhy,
                }

            if (hasclass && (actClient || datatype || datawhy)) {
                $.post(
                    js_global.xhr_url,
                    data_send,
                    function(data, textStatus, jqXHR) {
                        console.log(data)
                        if (datawhy) {
                            if (data[0].link) {
                                $('.search-form__filter').html('Acessar')
                                $('.search-form__filter').click(function() {
                                    window.location.href = data[0].link
                                })
                            } else {
                            }
                        } else if (datatype) {
                            // Two
                            $('.categories__list').html(
                                '<li style="order: 0;">Quem você quer revindicar</li>'
                            )
                            if (data.length > 0) {
                                for (var t in data) {
                                    if (data.hasOwnProperty(t)) {
                                        var { slug, name } = data[t]

                                        $('.categories__list')
                                            .append(
                                                '<li data-why="' +
                                                    slug +
                                                    '">' +
                                                    name +
                                                    '</li>'
                                            )
                                            .parent()
                                            .addClass('active')
                                    }
                                }
                            } else {
                                $('.categories__list')
                                    .html(
                                        '<li style="order: 0;">Quem você quer revindicar</li>'
                                    )
                                    .parent()
                                    .removeClass('active')
                            }
                        } else if (actClient) {
                            $('.list-ptypes').html(
                                '<li style="order: 0;">De que tipo</li>'
                            )
                            for (var t in data) {
                                if (data.hasOwnProperty(t)) {
                                    var _data$t = data[t],
                                        term_id = _data$t.term_id,
                                        taxonomy = _data$t.taxonomy,
                                        slug = _data$t.slug,
                                        name = _data$t.name,
                                        description = _data$t.description

                                    $('.list-ptypes')
                                        .append(
                                            '<li data-type="' +
                                                term_id +
                                                '">' +
                                                name +
                                                '</li>'
                                        )
                                        .parent()
                                        .addClass('active')
                                }
                            }
                        }
                    },
                    'json'
                )
            }
            $(this)
                .parent()
                .find('li')
                .css('order', 10)
            $(this).css('order', 0)
        }
    )
})
