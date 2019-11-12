jQuery.noConflict() // Reverts '$' variable back to other JS libraries
jQuery(document).ready(function($) {
    /**
     * Button Comment
     */
    $(document).on('click', '.process__coment-button', function() {
        $(this)
            .parents('.process__item')
            .find('.process__form')
            .toggleClass('comentr')
    })
    var nameclient, mailclient, idclient
    $(document).on('click', '.remove_client', function() {
        var userId = $(this).data('clientDel'),
            inputClients = $('#cliente_do_processo__cliente'),
            clientsID = inputClients.val().split(',')
        for (var i = 0; i < clientsID.length; i++) {
            var clientid = clientsID[i]
            if (clientid === userId.toString()) {
                clientsID.splice(i, 1)
            }
        }
        inputClients.val(clientsID.join(','))
        $(this)
            .parent()
            .parent()
            .remove()
    })

    $(document).on('keyup', '#search__cliente', function(e) {
        var data_Csearch = {
            action: 'search-client',
            client__nonce: js_global.filter__nonce,
            client__cpf: $(e.target).val(),
        }

        if ($(e.target).val().length > 6) {
            $.post(
                js_global.xhr_url,
                data_Csearch,
                function(data, textStatus, jqXHR) {
                    nameclient = data.cliente.data.display_name
                    mailclient = data.cliente.data.user_email
                    idclient = data.cliente.data.ID
                    if (data.status == 'pendente') {
                        $('.Cmetabox__resultsearch').html(
                            '<h2>Nenhum cliente encontrado pelo cpf: ' +
                                $(e.target).val() +
                                '</h2> '
                        )
                    } else if (data.status == 'encontrado') {
                        $('.Cmetabox__resultsearch').html(
                            '<div class="metabox__clientenc">\
                            <div class="text">\
                        <h2>' +
                                data.cliente.data.display_name +
                                '</h2>\
                        <small>' +
                                data.cliente.data.user_email +
                                '</small>\
                                </div>\
                                <button class="select_client" data-client-id="' +
                                data.cliente.data.ID +
                                '"><span class="dashicons dashicons-yes"></span></button>\
                        </div>'
                        )
                        $(document).on('click', '.select_client', function(e) {
                            var inputClients = $(
                                    '#cliente_do_processo__cliente'
                                ),
                                idClient = $(this).data('clientId'),
                                clientsID = inputClients.val().split(',')
                            console.log(data)

                            if (clientsID.indexOf(idClient.toString()) != -1) {
                                clientsID = clientsID
                            } else {
                                clientsID.push(idClient)
                                $('.custommetabox_clients').append(
                                    '\
                                <div class="custommetabox_client">\
                                <h2>' +
                                        nameclient +
                                        '</h2>\
                                <small>' +
                                        mailclient +
                                        '</small>\
                                <div class="actions__client">\
                                    <button class="remove_client" data-client-del="' +
                                        idclient +
                                        '"><span class="dashicons dashicons-no-alt"></span></button>\
                                </div>\
                                </div>'
                                )
                            }
                            inputClients.val(clientsID.join(','))
                            $('#search__cliente').val()
                            $('.metabox__clientenc').html('')
                        })
                    }
                },
                'json'
            )
        }
    })
})
