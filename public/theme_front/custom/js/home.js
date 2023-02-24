import toast from "./toast.js";

const BrandSelector = () => {
    $('#brand_selecter').on('change', function() {
        let brand_id = $(this).val();
        $('#phone_model_container').html('');
        $('#model_selecter').html('<option value="">Phone Model</option>');
        if(brand_id != "") {
            $.ajax({
                type: "POST",
                url: 'home/brand/models',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'id': brand_id,
                },
                beforeSend: function () {
                    $('#preloader').show();
                },
                success: function(res) {
                    if(res['success'] == true) {
                        res['models'].map(element => {
                            let tmp = '<option value="' + element.id + '" data-url="' + element.image + '" data-model="' + element.name + '">' + element.name + '</option>';
                            $('#model_selecter').append(tmp);
                        });
                        $('#preloader').hide();
                    } else {
                        $('#preloader').hide();
                        toast('error', 'Unexpected error occurred.');
                    }
                },
                error: function() {
                    $('#preloader').hide();
                    toast('error', 'Unexpected error occurred.');
                }
            })
        }
    });
};

const ModelSelector = () => {
    $('#model_selecter').on('change', function() {
        let model_url = '/devices/brand/model/' + $('option:selected', this).val();
        let url = $('option:selected', this).attr('data-url');
        let model = $('option:selected', this).attr('data-model');
        let brand = $('option:selected', '#brand_selecter').attr('data-brand');
        let tmp = "";
        if($(this).val != "" && url !== undefined) {
            tmp = '<div class="portfolio-carousel-single">' +
                            '<figure>' + 
                                '<div style="width: 340px; height: 340px; margin-left: auto; margin-right: auto;">' + 
                                    '<img id="phone_model_img" class="img-fluid img-responsive" src="' + url + '" alt="">' + 
                                '</div>' +
                                '<figcaption>' +
                                    '<h5>' + model + '</h5>' +
                                    '<span class="color-secondary">' + brand + '</span>' +
                                    '<a href="' + model_url + '" class="link"><i class="la la-link"></i></a>' +
                                '</figcaption>' +
                            '</figure>' +
                        '</div>';
        }
        $('#phone_model_container').html(tmp);
    });
};

export { BrandSelector, ModelSelector };