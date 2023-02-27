@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <div class="d-flex item-center">
                <h1 class="display-4 mb-0 display-5 mr-3">{{ __('global.adminUserTitle') }}</h1>
                {!! Form::open(['method' => 'GET','route' => ['admins.index']]) !!}
                <div class="d-flex item-center">
                    <div class="datatable-search mr-1">
                        <input id="search_bar" name="name" value="{{ request()->get('name') }}" class="datatable-input" style="line-height: initial;" placeholder="Search..." type="search" title="Search within table" aria-controls="datatablesSimple">
                    </div>
                    @if(request()->input('per_page') != null)
                        @include('layouts.admin.pagination.select', ['pages' => $pages, 'per_page' => request()->input('per_page')])
                    @else
                        @include('layouts.admin.pagination.select', ['pages' => $pages, 'per_page' => $per_page])
                    @endif
                </div>
                {!! Form::close() !!}
            </div>
            @can('user-create')
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('admins.create') }}">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </a>
            @endcan
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-2">
                <div class="card-body p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('global.no') }}</th>
                                <th scope="col">{{ __('global.firstName') }}</th>
                                <th scope="col">{{ __('global.lastName') }}</th>
                                <th scope="col">{{ __('global.emailAddress') }}</th>
                                <th scope="col">{{ __('global.role') }}</th>
                                <th scope="col" class="txt-right">{{ __('global.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $key => $admin)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $admin->first_name }}</td>
                                <td>{{ $admin->last_name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    @if(!empty($admin->getRoleNames()))
                                        @foreach($admin->getRoleNames() as $v)
                                        <label class="">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="txt-right">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary pt-025" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @can('user-edit')
                                                    <a class="dropdown-item" href="{{ route('admins.edit',$admin->id) }}"><span class="material-icons">edit</span>{{ __('global.edit') }}</a>
                                                @endcan
                                            </li>
                                            @if(!empty($admin->getRoleNames()) && !$admin->hasExactRoles('SuperAdmin'))
                                            <li>
                                                @can('user-delete')
                                                    {!! Form::open(['method' => 'DELETE','route' => ['admins.destroy', $admin->id],'style'=>'display:inline']) !!}
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
                        </tbody>
                    </table>
                </div>
            </div>
            @include('layouts.admin.pagination.index', ['paginator' => $admins])
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="module">
    import { Search, ChangePerPage } from '{{ asset("theme/js/search.js") }}';
    Search();
    ChangePerPage();
</script>
@endpush