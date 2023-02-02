@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.userTitle') }}</h1>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-2">
                <div class="card-body p-4">
                    {!! Form::open(['method' => 'GET','route' => ['users.index']]) !!}
                    <mwc-textfield id="search_bar" name="name" value="{{ request()->get('name') }}" class="w-100" label="Search" outlined icontrailing="search" placeholder="What can we help you find?"></mwc-textfield>
                    {!! Form::close() !!}
                </div>
                <hr>
                <div class="card-body p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('global.no') }}</th>
                                <th scope="col">{{ __('global.firstName') }}</th>
                                <th scope="col">{{ __('global.lastName') }}</th>
                                <th scope="col">{{ __('global.emailAddress') }}</th>
                                <th scope="col">{{ __('global.activate') }}</th>
                                <th scope="col">{{ __('global.expirationDate') }}</th>
                                <th scope="col" class="txt-right">{{ __('global.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users) != 0)
                                @foreach ($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->isactivated == '1')
                                            @if($user->isExpired())
                                            <span id="activate_status{{$user->id}}" class="badge bg-warning">{{ __('global.expired') }}</span>
                                            @else
                                            <span id="activate_status{{$user->id}}" class="badge bg-success">{{ __('global.yes') }}</span>
                                            @endif
                                        @else
                                        <span id="activate_status{{$user->id}}" class="badge bg-danger">{{ __('global.no') }}</span>
                                        @endif
                                    </td>
                                    <td id="expired_time{{$user->id}}">{{ $user->getDateTimeExpiredAtAttribute() }}</td>
                                    <td class="txt-right">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary pt-025" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    @can('user-edit')
                                                        <a class="dropdown-item" href="{{ route('users.edit',$user->id) }}"><span class="material-icons">edit</span>{{ __('global.edit') }}</a>
                                                    @endcan
                                                </li>
                                                @if($user->isactivated == '0')
                                                <li>
                                                    @can('transfer-credit-to-user')
                                                        <a class="btn-activate dropdown-item" href="#" data-userKey="{{ $user->id }}"><span class="material-icons">check_circle</span>{{ __('global.active') }}</a>
                                                    @elsecan('transfer-credit-to-reseller')
                                                        <a class="btn-activate dropdown-item" href="#" data-userKey="{{ $user->id }}"><span class="material-icons">check_circle</span>{{ __('global.active') }}</a>
                                                    @elsecan('transfer-credit-to-reseller')
                                                        <a class="btn-activate dropdown-item" href="#" data-userKey="{{ $user->id }}"><span class="material-icons">check_circle</span>{{ __('global.active') }}</a>
                                                    @endcan
                                                </li>
                                                @endif
                                                @if(!empty($user->getRoleNames()) && !$user->hasExactRoles('SuperAdmin'))
                                                <li>
                                                    @can('user-delete')
                                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                            {!! Form::button('<span class="material-icons">delete</span>'.__('global.delete'), ['type' =>'submit', 'class' => 'dropdown-item']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan                                      
                                                </li>
                                                @endif
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
            @include('layouts.admin.pagination.index', ['paginator' => $users])
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
                        <mwc-checkbox id="is_activate" name="isactivated" value="true" checked></mwc-checkbox>
                    </mwc-formfield>
                    <mwc-select id="period" name="period" outlined label="Period">
                        <mwc-list-item value=""></mwc-list-item>
                        <mwc-list-item value="6">6 months</mwc-list-item>
                        <mwc-list-item value="12">1 year</mwc-list-item>
                    </mwc-select>
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
            let period = $('#period').val();
            if(active == false || period == "") {
                new bs5.Toast({
                    body: 'Please select all options.',
                    className: 'border-0 bg-danger text-white',
                    btnCloseWhite: true,
                }).show();
            } else {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('users.active') }}",
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': selected_id,
                        'active': active,
                        'period': period
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

                            $('#expired_time' + selected_id).html(result['expired_time']);
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