@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <div class="d-flex item-center">
                <h1 class="display-4 mb-0 display-5 mr-3">{{ __('global.paymentTitle') }}</h1>
                {!! Form::open(['method' => 'GET','route' => ['payments.index']]) !!}
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
            @if(count($payments) != 0)
            <div class="card card-raised mb-2">
                <div class="card-body p-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('global.no') }}</th>
                                <th scope="col">{{ __('global.surname') }}</th>
                                <th scope="col">{{ __('global.phone') }}</th>
                                <th scope="col">{{ __('global.email') }}</th>
                                <th scope="col">{{ __('global.country') }}</th>
                                <th scope="col">{{ __('global.city') }}</th>
                                <th scope="col">{{ __('global.status') }}</th>
                                <th scope="col" class="txt-right">{{ __('global.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $key => $payment)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $payment->customer_surname }}</td>
                                <td>{{ $payment->customer_phone }}</td>
                                <td>{{ $payment->customer_email }}</td>
                                <td>{{ $payment->customer_country }}</td>
                                <td>{{ $payment->customer_city }}</td>
                                <td>
                                @if($payment->status == '0')
                                    <span class="badge bg-danger">{{ __('global.failure') }}</span>
                                @else
                                    <span class="badge bg-success">{{ __('global.success') }}</span>
                                @endif
                                </td>
                                <td class="txt-right">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary pt-025" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('payments.show',$payment->id) }}"><span class="material-icons icon-mr">visibility</span>{{ __('global.showMore') }}</a>
                                            </li>
                                            <li>
                                                {!! Form::open(['method' => 'DELETE','route' => ['payments.destroy', $payment->id],'style'=>'display:inline']) !!}
                                                    {!! Form::button('<span class="material-icons icon-mr">delete</span>'.__('global.delete'), ['type' =>'submit', 'class' => 'dropdown-item']) !!}
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
            @include('layouts.admin.pagination.index', ['paginator' => $payments])
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