@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <div class="d-flex item-center">
                <h1 class="display-4 mb-0 display-5 mr-3">{{ __('global.resellerTitle') }}</h1>
                {!! Form::open(['method' => 'GET','route' => ['resellers.index']]) !!}
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
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('resellers.create') }}">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            @if(count($resellers) != 0)
            <div class="card card-raised mb-2">
                <div class="card-body p-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('global.no') }}</th>
                                <th scope="col">{{ __('global.name') }}</th>
                                <th scope="col">{{ __('global.email') }}</th>
                                <th scope="col">{{ __('global.tel') }}</th>
                                <th scope="col">{{ __('global.countryName') }}</th>
                                <th scope="col" class="txt-right">{{ __('global.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resellers as $key => $reseller)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $reseller->name }}</td>
                                <td>{{ $reseller->email }}</td>
                                <td>{{ $reseller->tel }}</td>
                                @if($reseller->country != null)
                                <td>{{ $reseller->country->country }}</td>
                                @else
                                <td>NONE</td>
                                @endif
                                <td class="txt-right">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary pt-025" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('resellers.edit',$reseller->id) }}"><span class="material-icons">edit</span>{{ __('global.edit') }}</a>
                                            </li>
                                            <li>
                                                {!! Form::open(['method' => 'DELETE','route' => ['resellers.destroy', $reseller->id],'style'=>'display:inline']) !!}
                                                    {!! Form::button('<span class="material-icons">delete</span>'.__('global.delete'), ['type' =>'submit', 'class' => 'dropdown-item']) !!}
                                                {!! Form::close() !!}
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>                             
                </div>
            </div>
            @include('layouts.admin.pagination.index', ['paginator' => $resellers])
            @else
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <h2 class="card-title text-center">{{ __('global.none') }}</h2>
                </div>
            </div>
            @endif
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