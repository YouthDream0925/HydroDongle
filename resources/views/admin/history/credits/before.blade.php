@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom" style="align-items: center;">
            <h1 class="display-4 mb-0 display-5">
                {!! __('global.transferTitle', ['credit' => $sender->credits]) !!}
            </h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('credits.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::open(array('route' => 'credits.transfer','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-lg-4 col-md-4 mb-4">
                            <mwc-textfield class="w-100" label="Transfer Amount" outlined id="amount" name="amount" type="number" maxlength="3" value=""></mwc-textfield>
                        </div>
                        <div class="col-lg-4 col-md-4 mb-4">
                            <mwc-select class="w-100" id="recipient_type" name="recipient_type" outlined label="Recipient Type">
                                <mwc-list-item value=""></mwc-list-item>
                                @foreach($recipient_group as $key => $item)
                                    <mwc-list-item value="{{ $key }}">{{ $item }}</mwc-list-item>
                                @endforeach
                            </mwc-select>
                        </div>
                        <div class="col-lg-4 col-md-4 mb-4">
                            <mwc-select class="w-100" id="recipient" name="recipient" outlined label="Recipient">
                                <mwc-list-item value=""></mwc-list-item>
                            </mwc-select>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-outline-success">{{ __('global.transfer') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('#recipient_type').on('change', function() {
        let type = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/admin/general/credits/users',
            data: {
                '_token': $('input[name="_token"]').val(),
                'type': type
            },
            beforeSend() {
                if($('#page_loader').hasClass('d-none'))
                    $('#page_loader').removeClass('d-none');
            },
            success: function(res) {
                $('#page_loader').addClass('d-none');
                $('#recipient').html('<mwc-list-item value=""></mwc-list-item>');

                if(res['success'] == true) {
                    res['users'].map(element => {
                        var tmp = '<mwc-list-item value="' + element.id + '">' + element.email + '</mwc-list-item>';
                        $('#recipient').append(tmp);
                    });
                } else {
                    new bs5.Toast({
                        body: 'Error',
                        className: 'border-0 bg-danger text-white',
                        btnCloseWhite: true,
                    }).show();
                }
            },
            error: function() {
                $('#page_loader').addClass('d-none');

                new bs5.Toast({
                    body: 'Error',
                    className: 'border-0 bg-danger text-white',
                    btnCloseWhite: true,
                }).show();
            }
        })
    });
</script>
@endpush