$(function() {
    //handle company delete request here
    var handleDeleteRequest = function(e) {
        e.preventDefault();
        var el = jQuery(this);
        bootbox.confirm({
            message: "Are you sure you want to delete this item?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function(result) {
                if (result == true) {
                    $.post(el.attr('href'), {}, function(response) {
                        if (response.status == true) {
                            bootbox.alert({
                                message: "Item deleted",
                                className: 'modal-success',
                                backdrop: true
                            });
                            pjax_container = jQuery('div[data-pjax-container]').attr('id');
                            if (pjax_container != undefined)
                                jQuery.pjax.reload({ container: '#' + pjax_container });
                            else
                                window.location.href = jQuery('a.back-button').attr('href');
                        }
                    }).fail(function(response) {
                        bootbox.alert({
                            message: "You are not allowed to perform this action.",
                            className: 'modal-danger',
                            backdrop: true
                        });
                    });
                }
            }
        });
    };

    //handler for delete action button
    jQuery('a.delete-request').on('click', handleDeleteRequest);

    //on grid view load complete bind elements
    $(document).on('pjax:complete', function() {
        jQuery('table').on('click', 'a.delete-request', handleDeleteRequest);
    });

    //on ajax request start show loader 
    $(document).ajaxStart(function() {
        jQuery('div.loader').show();
    });

    //on ajax request complete or on error hide loader 
    $(document).ajaxComplete(function() {
        jQuery('div.loader').hide();
    });

    $(document).ajaxError(function() {
        jQuery('div.loader').hide();
    });

});