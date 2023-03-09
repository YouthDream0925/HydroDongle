@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <div class="d-flex item-center">
                <h1 class="display-4 mb-0 display-5 mr-3">{{ __('global.creditTitle') }}</h1>
                {!! Form::open(['method' => 'GET','route' => ['credits.index']]) !!}
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
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-2">                
                <div class="card-body p-4">
                    <!-- Simple DataTables example-->
                    <!-- <table id="datatablesSimple"> -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th data-type="date" data-format="YYYY/MM/DD">{{ __('global.date') }}</th>
                                <th>{{ __('global.sender') }}</th>
                                <th>{{ __('global.recipient') }}</th>
                                <th>{{ __('global.amount') }}</th>
                                <th class="txt-right">{{ __('global.status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($histories as $history)
                            <tr>
                                <td>{{ $history->created_at }}</td>
                                <td>{{ $history->sender }}</td>
                                <td>{{ $history->recipient }}</td>
                                <td>{{ $history->amount }}</td>
                                @if($history->status == '1')
                                <td class="txt-right"><span class="badge bg-success">{{ $status[$history->status] }}</span></td>
                                @else
                                <td class="txt-right"><span class="badge bg-danger">{{ $status[$history->status] }}</span></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('layouts.admin.pagination.index', ['paginator' => $histories])
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