import toast from "./toast.js";

const Drivers = () => {
    $('#cpu_selector').on('change', function() {
        var cpu_id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/download/drivers',
            data: {
                '_token': $('input[name="_token"]').val(),
                'key': cpu_id
            },
            beforeSend() {
                $('#preloader').show();
            },
            success: function(res) {
                $('#preloader').hide();

                if(res['success'] == true) {
                    $('#drivers_container').html('');
                    if(res['drivers'].length == 0) {
                        toast('error', 'There is no drivers for this CPU.');
                    } else {
                        res['drivers'].map(element => {
                            var tmp = '<div class="col-lg-12 col-md-12">' + 
                                            '<div class="icon-box-four d-flex">' + 
                                                '<div class="box-icon">' + 
                                                    '<a href="' + element.driver_link + '" target="_blank"><span class="icon-rounded-sm"><i class="la la-download"></i></span></a>' + 
                                                '</div>' + 
                                                '<div class="box-content">' + 
                                                    '<h6>' + element.driver_name + ' <span class="badge bg-success">' + element.driver_version + '</span></h6>' + 
                                                    '<p>' + element.description + '</p>' + 
                                                '</div>' + 
                                            '</div>' + 
                                        '</div>';
                            $('#drivers_container').append(tmp);
                        });
                    }
                } else {
                    toast('error', 'Unexpected error occurred.');
                }
            },
            error: function() {
                $('#preloader').hide();

                toast('error', 'Unexpected error occurred.');
            }
        });
    });
};

export default Drivers;