@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.dongleUserTitle') }}</h1>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-2">
                <div class="card-body p-4">
                    {!! Form::open(['method' => 'GET','route' => ['dongles.index']]) !!}
                    <mwc-textfield id="search_bar" name="name" value="{{ request()->get('name') }}" class="w-100" label="Search" outlined icontrailing="search" placeholder="What can we help you find?"></mwc-textfield>
                    {!! Form::close() !!}
                </div>
                <hr>
                <div class="card-body p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('global.no') }}</th>
                                <th scope="col">{{ __('global.name') }}</th>
                                <th scope="col">{{ __('global.emailAddress') }}</th>
                                <th scope="col">{{ __('global.activate') }}</th>
                                <th scope="col" class="txt-right">{{ __('global.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($dongle_users) != 0)
                                @foreach ($dongle_users as $key => $dongle_user)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>{{ $dongle_user->name }}</td>
                                    <td>{{ $dongle_user->email }}</td>
                                    <td>
                                        @if($dongle_user->ProPack == '1')
                                            <span id="activate_status{{$dongle_user->id}}" class="badge bg-success">{{ __('global.yes') }}</span>
                                        @else
                                        <span id="activate_status{{$dongle_user->id}}" class="badge bg-danger">{{ __('global.no') }}</span>
                                        @endif
                                    </td>
                                    <td class="txt-right">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary pt-025" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    @can('user-edit')
                                                        <a class="dropdown-item" href="{{ route('dongles.edit',$dongle_user->id) }}"><span class="material-icons">edit</span>{{ __('global.edit') }}</a>
                                                    @endcan
                                                </li>
                                                @if($dongle_user->ProPack == '0')
                                                <li>
                                                    @can('transfer-credit-to-user')
                                                        <a class="btn-activate dropdown-item" href="#" data-userKey="{{ $dongle_user->id }}"><span class="material-icons">check_circle</span>{{ __('global.active') }}</a>
                                                    @elsecan('transfer-credit-to-reseller')
                                                        <a class="btn-activate dropdown-item" href="#" data-userKey="{{ $dongle_user->id }}"><span class="material-icons">check_circle</span>{{ __('global.active') }}</a>
                                                    @elsecan('transfer-credit-to-reseller')
                                                        <a class="btn-activate dropdown-item" href="#" data-userKey="{{ $dongle_user->id }}"><span class="material-icons">check_circle</span>{{ __('global.active') }}</a>
                                                    @endcan
                                                </li>
                                                @endif
                                                <li>
                                                    @can('user-delete')
                                                        {!! Form::open(['method' => 'DELETE','route' => ['dongles.destroy', $dongle_user->id],'style'=>'display:inline']) !!}
                                                            {!! Form::button('<span class="material-icons">delete</span>'.__('global.delete'), ['type' =>'submit', 'class' => 'dropdown-item']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan                                      
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">{{ __('global.noneUserToActive') }}</td>
                                </tr>
                            @endif                
                        </tbody>
                    </table>
                </div>
            </div>
            @include('layouts.admin.pagination.index', ['paginator' => $dongle_users])
        </div>
    </div>
</div>

<!-- Modal-->
<button id="show_modal" style="display: none;" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Launch demo modal<i class="trailing-icon material-icons">launch</i></button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Do you want to active this User?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex item-space mt-4">
                    <mwc-formfield label="Activate">
                        <mwc-checkbox id="is_activate" name="ProPack" value="true" checked></mwc-checkbox>
                    </mwc-formfield>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-text-primary me-2" type="button" data-bs-dismiss="modal">{{ __('global.close') }}</button>
                <button id="confirm_btn" class="btn btn-text-primary" type="button">{{ __('global.ok') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    let selected_id = null;
    $('.btn-activate').on('click', function() {
        $('#show_modal').click();
        selected_id = $(this).attr('data-userKey');
    });

    $('#confirm_btn').on('click', function() {
        if(selected_id == null) {
            new bs5.Toast({
                body: 'Not selected user.',
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
            }).show();
        } else {
            let active = $('#is_activate').prop('checked');
            if(active == false) {
                new bs5.Toast({
                    body: 'Please select all options.',
                    className: 'border-0 bg-danger text-white',
                    btnCloseWhite: true,
                }).show();
            } else {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('dongles.active') }}",
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': selected_id,
                        'active': active,
                    },
                    success: function(result) {
                        if(result['success'] == true) {
                            new bs5.Toast({
                                body: result['msg'],
                                className: 'border-0 bg-success text-white',
                                btnCloseWhite: true,
                            }).show();
                            
                            $('#activate_status' + selected_id).removeClass('bg-danger');
                            $('#activate_status' + selected_id).addClass('bg-success');
                            $('#activate_status' + selected_id).html('Yes');

                            $('#show_modal').click();
                        } else {
                            new bs5.Toast({
                                body: result['msg'],
                                className: 'border-0 bg-danger text-white',
                                btnCloseWhite: true,
                            }).show();
                        }
                    },
                    error: function() {
                        new bs5.Toast({
                            body: lang.unexpectedErrorOccured,
                            className: 'border-0 bg-danger text-white',
                            btnCloseWhite: true,
                        }).show();
                    }
                });
            }
        }
    });

    $('#search_bar').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            var form =  $(this).closest("form");
            form.submit();
        }
    });
</script>
@endpush