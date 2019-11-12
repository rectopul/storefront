jQuery.noConflict() // Reverts '$' variable back to other JS libraries
jQuery(function($) {
    var $ = window.jQuery,
        inputs_with_values = $('.items_fields'),
        valInput = []

    /**
     *
     * Dynamic Images Control
     */
    /* ADD new item */
    $(document).on('click', '.add__item', function(e) {
        e.preventDefault()
        var containeritem = $(this)
                .parents('.image__container')
                .find('> .list'),
            countitem = containeritem.find('.image__item').length
        console.log(countitem)

        containeritem.append(
            '\
        <div class="image__item" id="image__action-' +
                countitem +
                '">\
            <div class="line">\
                <figure><img src="https://via.placeholder.com/115?text=Default" alt=""></figure>\
            </div>\
            <div class="line j-content-center">\
                <button class="image__del" data-del="' +
                countitem +
                '"><span class="dashicons dashicons-trash"></span></button>\
                <button class="image__change" data-change="' +
                countitem +
                '"><span class="dashicons dashicons-edit"></span></button>\
            </div>\
        </div>'
        )
    })

    /**
     *
     * @param {Select image} str
     */
    function isSplit(val) {
        try {
            val.split(',')
        } catch (e) {
            return false
        }
        return true
    }
    // ADD IMAGE LINK
    $(document).on('click', '.image__change', function(event) {
        event.preventDefault()
        var btnClick = $(this),
            indexelm = $(this).data('change'),
            dreplace = btnClick.data('replace'),
            inptvalues = $(this)
                .parents('.image__container')
                .find('.items_fields'),
            values = inptvalues.val(),
            valstring
        console.log('Replace on click:', dreplace)
        // Create a new media frame
        Dynimage = wp.media({
            title: 'Selecione o Logo',
            button: {
                text: 'Usar Imagem',
            },
            multiple: false, // Set to true to allow multiple files to be selected
        })

        if (values) {
            values = values.split(',')
            console.log('split: ', values)
        } else {
            values = []
            console.log('noSplit: ', values)
        }

        // When an image is selected in the media frame...
        Dynimage.on('select', function() {
            // Get media attachment details from the frame state
            var attachment = Dynimage.state()
                .get('selection')
                .first()
                .toJSON()

            // Send the attachment URL to our custom image input field.
            valstring = attachment.id
            //values.push(attachment.id)
            if (dreplace) {
                dreplace = dreplace.toString()
                var arrindex = values.indexOf(dreplace)
                console.log('Replace:', dreplace)
                if (arrindex > -1) {
                    values[arrindex] = attachment.id
                }
            } else {
                values.push(attachment.id)
            }

            if (attachment.sizes.thumbnail) {
                $('#image__action-' + indexelm)
                    .find('figure > img')
                    .attr({
                        src: attachment.sizes.thumbnail.url,
                        alt: attachment.alt,
                    })
            } else {
                $('#image__action-' + indexelm)
                    .find('figure > img')
                    .attr({
                        src: attachment.url,
                        alt: attachment.alt,
                    })
            }
            btnClick.data('replace', attachment.id)

            inptvalues.val(values.join()).trigger('change')

            console.log('Valor:', values)
        })

        // Finally, open the modal on click
        // Finally, open the modal on click
        if (Dynimage) {
            Dynimage.open()
            return
        }
        Dynimage.open()
        Dynimage = false
    })

    /**
     *
     * @param {Dell Image}
     */
    $(document).on('click', '.image__del', function(e) {
        event.preventDefault()
        var valDel = $(this)
                .parent()
                .find('.image__change')
                .data('replace'),
            indexDel = $(this).data('del'),
            inptoDel = $(this)
                .parents('.image__container')
                .find('.items_fields'),
            values = inptoDel.val().split(',')

        if (valDel) {
            valDel = valDel.toString()
            var arrindex = values.indexOf(valDel)
            if (arrindex > -1) {
                values.splice(arrindex, 1)
                inptoDel.val(values)
            }
            $('#image__action-' + indexDel).remove()
            inptoDel.trigger('change')
        }
    })

    function isJson(str) {
        try {
            JSON.parse(str)
        } catch (e) {
            return false
        }
        return true
    }

    function filterel(element) {
        var elfiltred = element.replace(/(\\")|(\\\\\\")|(\"\[)/gm, '"')
        return elfiltred
    }
    WP_Media()

    function WP_Media() {
        var DynFrame,
            multi,
            BtnDel = $('.trash')
        ;(DynAddBtn = $('.select_img_control')),
            (btnMultiImg = $('.select_img_control'))

        // ADD IMAGE LINK
        DynAddBtn.click(function(event) {
            event.preventDefault()

            var btnClick = $(this)

            // Create a new media frame
            DynFrame = wp.media({
                title: 'Selecione o Logo',
                button: {
                    text: 'Usar Logo',
                },
                multiple: false, // Set to true to allow multiple files to be selected
            })

            // When an image is selected in the media frame...
            DynFrame.on('select', function() {
                // Get media attachment details from the frame state
                var attachment = DynFrame.state()
                    .get('selection')
                    .first()
                    .toJSON()

                // Send the attachment URL to our custom image input field.
                if (attachment.sizes.thumbnail) {
                    $(btnClick)
                        .parent()
                        .find('.img_sel')
                        .find('img')
                        .attr({
                            src: attachment.sizes.thumbnail.url,
                            alt: attachment.alt,
                        })
                } else {
                    $(btnClick)
                        .parent()
                        .find('.img_sel')
                        .find('img')
                        .attr({ src: attachment.url, alt: attachment.alt })
                }
                var objects = [],
                    hideval = $(btnClick)
                        .parents('.rmb_custom_control')
                        .find('.items_fields')
                        .val()
                if (isJson(hideval)) {
                    objects = JSON.parse(hideval)
                    console.log(typeof objects)
                    if ($(btnClick).attr('data-element')) {
                        objects[$(btnClick).attr('data-element')] =
                            attachment.sizes
                    } else {
                        objects.push(attachment.sizes)
                    }

                    var arrayUnique = function(arr) {
                        return arr.filter(function(item, index) {
                            return arr.indexOf(item) >= index
                        })
                    }

                    objects = arrayUnique(objects)
                } else {
                    objects = []
                }

                $(btnClick)
                    .parents('.rmb_custom_control')
                    .find('.items_fields')
                    .val(JSON.stringify(objects))
                    .trigger('change')
            })

            // Finally, open the modal on click
            // Finally, open the modal on click
            DynFrame.open()

            if (DynFrame) {
                DynFrame.open()
                return
            }
        })

        function findObjectByKey(array, key, value) {
            for (var k in array) {
                if (array.hasOwnProperty(k)) {
                    var element = array[k]
                    if (element['full'][key] == value) {
                        return k
                    }
                } else {
                    return null
                }
            }
        }

        BtnDel.click(function(e) {
            e.preventDefault()
            //Vars
            var element = $(this).parents('.rmb_custom_control'),
                hidenValue = filterel(element.find('.items_fields').val())

            //Check isset ATTR Data-Element Value
            if ($(this).attr('data-element')) {
                //ATTR Data-Element Value
                var l = $(this).attr('data-element')
                //Set Container element

                var urlSearch = $(this)
                    .parent()
                    .parent()
                    .find('figure > img')
                    .attr('src')
                //Check Array inpiuts
                if (isJson(hidenValue)) {
                    var objValues = JSON.parse(hidenValue),
                        ix = findObjectByKey(objValues, 'url', urlSearch)
                    objValues.splice(l, 1)

                    element
                        .find('.items_fields')
                        .val(JSON.stringify(objValues))
                        .trigger('change')

                    $(this)
                        .parents('.marcs__container')
                        .find('label[data-element="' + l + '"]')
                        .remove()

                    if (isJson(JSON.stringify(hidenValue))) {
                        objValues = JSON.parse(hidenValue)
                    } else {
                        console.log('erro ao converter Valores em json')
                    }
                }
            }
        })
    }

    $('.add_log').on('click', function(event) {
        event.preventDefault()
        var classeinsert = '',
            inputinsert = '',
            dataElementscount = $(this)
                .parent()
                .find('label[data-element]')
        console.log(dataElementscount.length)
        if ($(this).hasClass('block')) {
            classeinsert = 'blockimage'
            inputinsert =
                '<textarea name="txt_block" id="ctrl_text" rows="3" placeholder="Digite seu texto"></textarea>'
        }
        htmlEl =
            '<label class="img_item ' +
            classeinsert +
            '" data-element="' +
            dataElementscount.length +
            '">\
            <figure class="img_sel">\
                <img src="' +
            uncoverwp_script_vars.template_directory +
            '/img/woocommerce-placeholder-300x300.png" alt="default-image">\
            </figure>\
            <button class="select_img_control" data-element="' +
            dataElementscount.length +
            '">\
                <svg id="icon-plus" viewBox="0 0 32 32">\
                    <title>plus</title>\
                    <path d="M31 12h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552 0-1 0.448-1 1v11h-11c-0.552 0-1 0.448-1 1v6c0 0.552 0.448 1 1 1h11v11c0 0.552 0.448 1 1 1h6c0.552 0 1-0.448 1-1v-11h11c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1z"></path>\
                </svg>\
            </button>\
            <button class="remove_img_control"" data-element="' +
            dataElementscount.length +
            '">\
                <svg id="icon-minus" viewBox="0 0 32 32">\
                    <title>minus</title>\
                    <path d="M0 13v6c0 0.552 0.448 1 1 1h30c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1h-30c-0.552 0-1 0.448-1 1z"></path>\
                </svg>\
            </button>\
            <footer><button class="trash" data-element="' +
            dataElementscount.length +
            '">\
                    <svg id="icon-delete-button" viewBox="0 0 32 32">\
                        <title>delete-button</title>\
                        <path d="M25.283 3.834h-4.981c-0.248-2.155-2.082-3.834-4.302-3.834s-4.053 1.679-4.302 3.834h-4.981c-2.016 0-3.656 1.64-3.656 3.656v0.188c0 1.54 0.959 2.859 2.31 3.396v17.271c0 2.016 1.64 3.656 3.656 3.656h13.945c2.016 0 3.656-1.64 3.656-3.656v-17.27c1.351-0.537 2.31-1.856 2.31-3.396v-0.188c0-2.016-1.64-3.656-3.656-3.656zM16 1.734c1.263 0 2.317 0.905 2.55 2.1h-5.099c0.233-1.195 1.287-2.1 2.55-2.1zM24.894 28.344c0 1.060-0.862 1.922-1.922 1.922h-13.945c-1.059 0-1.922-0.862-1.922-1.922v-17.011h17.789v17.011zM27.205 7.677c0 1.060-0.862 1.922-1.922 1.922h-18.566c-1.059 0-1.922-0.862-1.922-1.922v-0.188c0-1.060 0.862-1.922 1.922-1.922h18.566c1.059 0 1.922 0.862 1.922 1.922v0.188z"></path>\
                        <path d="M11.352 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>\
                        <path d="M16 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c0 0.479 0.388 0.867 0.867 0.867z"></path>\
                        <path d="M20.648 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>\
                    </svg>\
                </button>\
            </footer>' +
            inputinsert +
            '\
        </label>'

        $(this)
            .parent()
            .find('.marcs__container')
            .append(htmlEl)

        WP_Media()
    })

    /**
     * Textarea change
     */

    $(document).on('keyup', '#ctrl_text', function(event) {
        var valuesjson = $(this)
            .parents('.marcs__container')
            .parent()
            .find('.items_fields')
            .val()
        hidenValue = filterel(valuesjson)
        if (isJson(hidenValue)) {
            var valuesparser = JSON.parse(hidenValue),
                index = $(this)
                    .parent()
                    .data('element')
            valuesparser[index]['content'] = encodeURIComponent($(this).val())
            $(this)
                .parents('.marcs__container')
                .parent()
                .find('.items_fields')
                .val(JSON.stringify(valuesparser))
                .trigger('change')
        }
    })
})
