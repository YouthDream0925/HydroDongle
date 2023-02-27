const CountrySelector = () => {
    $('#country_id').on('change', function() {
        let code = $(this).find(":selected").attr('data-countryCode') + "";
        code = code.toLowerCase();
        if(code.length == 2 && code != "ww") {
            code = 'country-' + code + '.svg';
            var url = "/vendor/blade-flags/" + "/" + code;
            UrlExists(url);
        } else {
            var url = "";
            if(code == "ww")
                url = "/vendor/blade-flags/country-united_nations.svg";
            else
                url = "/storage/sample/brand";
            $('#flag_image').attr('src', url);
        }
    });
};

const UrlExists = (url) => {
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    if (http.status != 404) {
        $('#flag_image').attr('src', url);
    } else {
        new bs5.Toast({
            body: "Can't find this country.",
            className: 'border-0 bg-danger text-white',
            btnCloseWhite: true,
        }).show();
    }
};

export default CountrySelector;