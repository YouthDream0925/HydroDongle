@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.roleTitle') }}</h1>
            @can('role-create')
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('roles.create') }}">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </a>
            @endcan
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('global.no') }}</th>
                                <th scope="col">{{ __('global.roleName') }}</th>
                                <th scope="col" class="txt-right">{{ __('global.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $role->name }}</td>
                                @if($role->name != "SuperAdmin")
                                <td class="txt-right">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary pt-025" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @can('role-edit')
                                                    <a class="dropdown-item" href="{{ route('roles.edit',$role->id) }}"><span class="material-icons">edit</span>{{ __('global.edit') }}</a>
                                                @endcan 
                                            </li>
                                            <li>
                                                @can('role-delete')
                                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                        {!! Form::button('<span class="material-icons">delete</span>'.__('global.delete'), ['type' =>'submit', 'class' => 'dropdown-item']) !!}
                                                    {!! Form::close() !!}
                                                @endcan                                      
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
            @include('layouts.admin.pagination.index', ['paginator' => $roles])
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush