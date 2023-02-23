import toast from './toast.js';

const GetData = (destination, name) => {
    var page = 1;
    $('.auto-load').show();
    
    infinteLoadMore(page);
    $('#get-more').on('click', function() {
        page++;
        infinteLoadMore(page);
    });
    
    function infinteLoadMore(page) {
        $.ajax({
            url: destination,
            datatype: "html",
            type: "get",
            data: {
                'page' : page,
                'name' : name
            },
            beforeSend: function () {
                $('#preloader').show();
            }
        })
        .done(function (response) {
            if (response.length == 0) {
                toast('There is no brands any more.');
                $('#preloader').hide();
                return;
            }
            $('#preloader').hide();
            $("#data-wrapper").append(response);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
    }
}

export default GetData;