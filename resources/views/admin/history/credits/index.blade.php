@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.creditTitle') }}</h1>
            @can('transfer-credit-to-user')
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('credits.before') }}">
                <span class="material-icons">add</span>{{ __('global.transfer') }}
            </a>
            @elsecan('transfer-credit-to-reseller')
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('credits.before') }}">
                <span class="material-icons">add</span>{{ __('global.transfer') }}
            </a>
            @elsecan('transfer-credit-to-distributor')
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('credits.before') }}">
                <span class="material-icons">add</span>{{ __('global.transfer') }}
            </a>
            @endcan
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
@endpush