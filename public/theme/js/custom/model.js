var Model = function() {
    var selected_brand = null;
    var selected_cpu = null;
    var selected_features = [];

    var Brand = function() {
        $('#brand_selecter').on('click', function() {
            selected_brand = null;
            $('#modal_title').html('Brands');
            $('#search_bar').attr('data-type', 'brand');
            GetData('brand', '');
            $('#modal_show').trigger('click');
        });
    }

    var CPU = function() {
        $('#cpu_selecter').on('click', function() {
            selected_cpu = null;
            $('#modal_title').html('CPUs');
            $('#search_bar').attr('data-type', 'cpu');
            GetData('cpu', '');
            $('#modal_show').trigger('click');
        });
    }

    var Features = function() {
        $('#features_selecter').on('click', function() {
            $('#modal_title').html('Features');
            $('#search_bar').attr('data-type', 'feature');
            GetData('feature', '');
            $('#modal_show').trigger('click');
        });
    }

    var Search = function() {
        $('#search_bar').keypress(function (e) {
            let type = $(this).attr('data-type');
            let value = $(this).val();
            let key = e.which;
            if(key == 13)  // the enter key code
            {
                GetData(type, value);
            }
        });
    }

    var BrandSelecter = function() {
        $('#modal_body').on('click', '.brand-container', function() {
            selected_brand = {
                'id': $(this).attr('data-brandKey'),
                'name': $(this).attr('data-name'),
                'link': $(this).attr('data-link'),
                'url': $(this).attr('data-url'),
            };
            let temp = '<div class="card-body">' +
                            '<div class="d-flex align-items-center">' +
                                '<div class="custom-brand-container-small">' +
                                    '<img class="img-fluid img-responsive mb-1" src="' + selected_brand.url + '" alt="..."/>' +
                                '</div>' +
                                '<div class="ms-3">' +
                                    '<div class="fs-6 mb-1 fw-500">' + selected_brand.name + '</div>' +
                                    '<a class="small stretched-link text-reset text-decoration-none" >' + selected_brand.link + '</a>' +
                                '</div>' +
                            '</div>' +
                        '</div>';
            $('#brand_selecter').html(temp);
            $("input[name=brand_id]").val(selected_brand.id);
        });
    }

    var CpuSelecter = function() {
        $('#modal_body').on('click', '.cpu-container', function() {
            selected_cpu = {
                'id': $(this).attr('data-cpuKey'),
                'name': $(this).attr('data-name'),
                'explanation': $(this).attr('data-explanation'),
                'url': $(this).attr('data-url'),
            };
            let temp = '<div class="card-body">' +
                            '<div class="d-flex align-items-center">' +
                                '<div class="custom-brand-container-small">' +
                                    '<img class="img-fluid img-responsive mb-1" src="' + selected_cpu.url + '" alt="..."/>' +
                                '</div>' +
                                '<div class="ms-3">' +
                                    '<div class="fs-6 mb-1 fw-500">' + selected_cpu.name + '</div>' +
                                    '<a class="small stretched-link text-reset text-decoration-none" >' + selected_cpu.explanation + '</a>' +
                                '</div>' +
                            '</div>' +
                        '</div>';
            $('#cpu_selecter').html(temp);
            $("input[name=cpu_id]").val(selected_cpu.id);
        });
    }

    var FeaturesSelecter = function() {
        $('#modal_body').on("change", '.feature-container', function() {
            if($(this).prop('checked')) {
                let key = $(this).attr('data-featureKey');
                if(!selected_features.includes(parseInt(key)))
                    selected_features.push(parseInt(key));
            } else {
                let key = $(this).attr('data-featureKey');
                let index = selected_features.indexOf(parseInt(key));
                if (index !== -1) {
                    selected_features.splice(index, 1);
                }
            }

            if(selected_features.length == 0) {
                $('#features_selecter_check').html('No selected');
            } else {
                $('#features_selecter_check').html('Selected features: ' + selected_features.length);
            }

            $("input[name=feature_id]").val(selected_features);
        });
    }

    var GetData = function(type, key) {
        $.ajax({
            type: 'POST',
            url: '/admin/editer/models/data',
            data: {
                '_token': $('input[name="_token"]').val(),
                'type': type,
                'name': key
            },
            beforeSend() {

            },
            success: function(res) {
                if(res['data'].length == 0) {
                    $('#modal_body').html('');
                } else {
                    $('#modal_body').html('');
                    if(res['type'] == 'brand') {
                        res['data'].map(element => {
                            let brand = '<div class="brand-container col-xl-12 col-md-12" data-brandKey="' + element.brand_id + '" data-name="' + element.brand_name + '" data-link="' + element.brand_link + '" data-url="' + element.image_url + '">' + 
                                            '<div id="features_selecter" class="card card-raised ripple-primary mb-4">' + 
                                                '<div class="card-body">' +
                                                    '<div class="d-flex align-items-center">' + 
                                                        '<div class="custom-brand-container-small">' + 
                                                            '<img class="img-fluid img-responsive mb-1" src="' + element.image_url + ' " alt="..."/>' + 
                                                        '</div>' + 
                                                        '<div class="ms-3">' + 
                                                            '<div class="fs-6 mb-1 fw-500">' + element.brand_name + '</div>' + 
                                                            '<a class="small stretched-link text-reset text-decoration-none" >' + element.brand_link + '</a>' + 
                                                        '</div>' + 
                                                    '</div>' + 
                                                '</div>' + 
                                            '</div>' + 
                                        '</div>';
                            $('#modal_body').append(brand);
                        });
                    } else if(res['type'] == 'cpu') {
                        res['data'].map(element => {
                            let cpu = '<div class="cpu-container col-xl-12 col-md-12" data-cpuKey="' + element.id + '" data-name="' + element.name + '" data-explanation="' + element.explanation + '" data-url="' + element.image_url + '">' + 
                                            '<div id="features_selecter" class="card card-raised ripple-primary mb-4">' + 
                                                '<div class="card-body">' +
                                                    '<div class="d-flex align-items-center">' + 
                                                        '<div class="custom-brand-container-small">' + 
                                                            '<img class="img-fluid img-responsive mb-1" src="' + element.image_url + ' " alt="..."/>' + 
                                                        '</div>' + 
                                                        '<div class="ms-3">' + 
                                                            '<div class="fs-6 mb-1 fw-500">' + element.name + '</div>' + 
                                                            '<a class="small stretched-link text-reset text-decoration-none" >' + element.explanation + '</a>' + 
                                                        '</div>' + 
                                                    '</div>' + 
                                                '</div>' + 
                                            '</div>' + 
                                        '</div>';
                            $('#modal_body').append(cpu);
                        });
                    } else if(res['type'] == 'feature') {
                        res['data'].map(element => {
                            let feature = null;
                            if (selected_features.includes(element.id)) {
                                feature = '<div class="d-flex align-items-center">' +
                                                '<mwc-formfield label="' + element.name + '">' +
                                                    '<mwc-checkbox class="feature-container" value="true" data-featureKey="' + element.id + '" checked></mwc-checkbox>' + 
                                                '</mwc-formfield>' +
                                            '</div>';
                            } else {
                                feature = '<div class="d-flex align-items-center">' +
                                                '<mwc-formfield label="' + element.name + '">' +
                                                    '<mwc-checkbox class="feature-container" value="true" data-featureKey="' + element.id + '"></mwc-checkbox>' + 
                                                '</mwc-formfield>' +
                                            '</div>';
                            }

                            $('#modal_body').append(feature);
                        });
                    }                                 
                }
            },
            error: function() {
                new bs5.Toast({
                    body: 'no',
                    className: 'border-0 bg-danger text-white',
                    btnCloseWhite: true,
                }).show();
            }
        })
    }

    return {
        init: function() {
            Brand();
            CPU();
            Features();
            Search();
            BrandSelecter();
            CpuSelecter();
            FeaturesSelecter();
        }
    }
}();