const Search = () => {
    $('#search_bar').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            var form =  $(this).closest("form");
            form.submit();
        }
    });
};

const ChangePerPage = () => {
    $('#per_page').on('change', function() {
        var form =  $(this).closest("form");
        form.submit();
    });
};

const ChangeBrand = () => {
    $('#brand_id_selector').on('change', function() {
        var form = $(this).closest("form");
        form.submit();
    });
}

export { Search, ChangePerPage, ChangeBrand };