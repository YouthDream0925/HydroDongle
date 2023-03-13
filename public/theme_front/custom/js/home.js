import toast from "./toast.js";

const BrandSelector = () => {
    $('#brand_selecter').on('change', function() {
        let brand_id = $(this).val();

        $('#brand_container').html('');
        $('#phone_model_container').html('');
        $('#cpu_container').html('');

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
                            let tmp = '<option value="' + element.id + '" data-url="' + element.image + '" data-model="' + element.name + '" data-cpuName="' + element.cpu_name + '" data-cpuImage="' + element.cpu_image + '">' + element.name + '</option>';
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

        let brand_link = '/devices/brand/' + $('option:selected', '#brand_selecter').val();
        let brand = $('option:selected', '#brand_selecter').attr('data-brand');
        let brand_url = $('option:selected', '#brand_selecter').attr('data-brandUrl');

        let cpu = $('option:selected', this).attr('data-cpuName');
        let cpu_image = $('option:selected', this).attr('data-cpuImage');

        let tmp_model = "";
        let tmp_brand = "";
        let tmp_cpu = "";

        if($(this).val != "" && url !== undefined) {
            tmp_brand = '<div class="portfolio-carousel-single">' +
                            '<a href="' + brand_link + '">' + 
                                '<figure>' + 
                                    '<div style="width: 340px; height: 340px; margin-left: auto; margin-right: auto;">' + 
                                        '<img id="phone_model_img" class="img-fluid img-responsive" src="' + brand_url + '" alt="">' + 
                                    '</div>' +
                                    '<figcaption>' +
                                        '<h5>' + brand + '</h5>' +
                                        '<span class="color-secondary">BRAND</span>' +
                                    '</figcaption>' +
                                '</figure>' +
                            '</a>' + 
                        '</div>';

            tmp_model = '<div class="portfolio-carousel-single">' +
                            '<a href="' + model_url + '">' + 
                                '<figure>' + 
                                    '<div style="width: 340px; height: 340px; margin-left: auto; margin-right: auto;">' + 
                                        '<img id="phone_model_img" class="img-fluid img-responsive" src="' + url + '" alt="">' + 
                                    '</div>' +
                                    '<figcaption>' +
                                        '<h5>' + model + '</h5>' +
                                        '<span class="color-secondary">MODEL</span>' +
                                    '</figcaption>' +
                                '</figure>' +
                            '</a>' +
                        '</div>';

            tmp_cpu = '<div class="portfolio-carousel-single">' +
                        '<figure>' + 
                            '<div style="width: 340px; height: 340px; margin-left: auto; margin-right: auto;">' + 
                                '<img id="phone_model_img" class="img-fluid img-responsive" src="' + cpu_image + '" alt="">' + 
                            '</div>' +
                            '<figcaption>' +
                                '<h5>' + cpu + '</h5>' +
                                '<span class="color-secondary">CPU</span>' +
                            '</figcaption>' +
                        '</figure>' +
                    '</div>';
        }
        $('#brand_container').html('');
        $('#phone_model_container').html('');
        $('#cpu_container').html('');

        $('#brand_container').append(tmp_brand);
        $('#phone_model_container').append(tmp_model);
        $('#cpu_container').html(tmp_cpu);
    });
};

export { BrandSelector, ModelSelector };