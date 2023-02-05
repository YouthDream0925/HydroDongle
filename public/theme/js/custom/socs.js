var SOCS = function() {
    let cpu_key = null;

    var AddSOC = function(socs_counter) {
        $('#add_new_soc').on('click', function() {
            ++socs_counter;
            let temp = '<div id="soc_container_' + socs_counter + '" class="row mb-4 item-center">' +
                            '<div class="col-xl-12">' +
                                '<div class="mb-4">' +
                                    '<mwc-textfield class="w-100" label="SOC Name" outlined id="soc_name_' + socs_counter + '" name="name" value=""></mwc-textfield>' +
                                '</div>' +
                                '<div class="mb-4">' +
                                    '<mwc-textarea class="w-100" label="Explanation" outlined id="soc_explanation_' + socs_counter + '" name="explanation" value="" maxlength="200" charcounter></mwc-textarea>' +
                                '</div>' +
                            '</div>' +
                            '<div class="text-center">' +
                                '<button class="btn btn-outline-danger btn-soc-delete mdc-ripple-upgraded" style="margin-right: 0.2rem;" type="button" data-socOrder="' + socs_counter + '">DELETE</button>' +
                                '<button class="btn btn-outline-success btn-soc-save mdc-ripple-upgraded" type="button" data-socOrder="' + socs_counter + '">SAVE</button>' +
                            '</div>' +
                        '</div>';
            $('#socs_container').append(temp);
        });
    }

    var SaveSOC = function() {
        $('#socs_container').on('click', '.btn-soc-save', function() {
            let soc_order = $(this).attr('data-socOrder');
            let old_soc_key = $(this).attr('data-socKey');
            let soc_name = $('#soc_name_' + soc_order).val();
            let soc_explanation = $('#soc_explanation_' + soc_order).val();
            if(soc_name == "") {
                new bs5.Toast({
                    body: 'Please inpute SOC name.',
                    className: 'border-0 bg-danger text-white',
                    btnCloseWhite: true,
                }).show();
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/admin/editer/socs/save',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'name': soc_name,
                        'explanation': soc_explanation,
                        'old_key': old_soc_key,
                        'cpu_key': cpu_key
                    },
                    success: function(res) {
                        if(res['success'] == true) {
                            if(res['new_key'] != null) {
                                $('.btn-soc-save[data-socOrder="' + soc_order + '"]').attr('data-socKey', res['new_key']);
                                $('.btn-soc-delete[data-socOrder="' + soc_order + '"]').attr('data-socKey', res['new_key']);
                            }
    
                            new bs5.Toast({
                                body: res['msg'],
                                className: 'border-0 bg-success text-white',
                                btnCloseWhite: true,
                            }).show();
                        } else {
                            new bs5.Toast({
                                body: res['msg'],
                                className: 'border-0 bg-danger text-white',
                                btnCloseWhite: true,
                            }).show();
                        }
                    },
                    error: function() {
                        new bs5.Toast({
                            body: 'Unexpected error occured.',
                            className: 'border-0 bg-danger text-white',
                            btnCloseWhite: true,
                        }).show();
                    }
                });
            }
        });
    }

    var DeleteSOC = function() {
        $('#socs_container').on('click', '.btn-soc-delete', function() {
            let soc_order = $(this).attr('data-socOrder');
            let old_soc_key = $(this).attr('data-socKey');
            if(old_soc_key != undefined) {
                $.ajax({
                    type: 'POST',
                    url: '/admin/editer/socs/delete',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'old_key': old_soc_key
                    },
                    success: function(res) {
                        if(res['success'] == true) {
                            new bs5.Toast({
                                body: res['msg'],
                                className: 'border-0 bg-success text-white',
                                btnCloseWhite: true,
                            }).show();
                            $('.btn-soc-delete[data-socOrder="' + soc_order + '"]').parent().parent().remove();
                        } else {
                            new bs5.Toast({
                                body: res['msg'],
                                className: 'border-0 bg-success text-white',
                                btnCloseWhite: true,
                            }).show();
                        }
                    },
                    error: function() {
                        new bs5.Toast({
                            body: 'Unexpected error occured.',
                            className: 'border-0 bg-success text-white',
                            btnCloseWhite: true,
                        }).show();
                    }
                })
            } else {
                $(this).parent().parent().remove();
                new bs5.Toast({
                    body: 'SOC deleted successfully.',
                    className: 'border-0 bg-success text-white',
                    btnCloseWhite: true,
                }).show();
            }
        });
    }

    return {
        init: function(socs_counter, key) {
            cpu_key = key;
            AddSOC(socs_counter);
            SaveSOC();
            DeleteSOC();
        }
    }
}();