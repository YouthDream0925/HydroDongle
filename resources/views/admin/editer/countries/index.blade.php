@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.countryTitle') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('countries.create') }}">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            @if(count($countries) != 0)
            <div class="card card-raised mb-2">
                <div class="card-body p-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('global.no') }}</th>
                                <th scope="col">{{ __('global.countryName') }}</th>
                                <th scope="col">{{ __('global.code') }}</th>
                                <th scope="col">{{ __('global.code3') }}</th>
                                <th scope="col">{{ __('global.numCode') }}</th>
                                <th scope="col">{{ __('global.phoneCode') }}</th>
                                <th scope="col" class="txt-right">{{ __('global.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $key => $country)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $country->name }}</td>
                                <td>{{ $country->code }}</td>
                                <td>{{ $country->code3 }}</td>
                                <td>{{ $country->num_code }}</td>
                                <td>{{ $country->phone_code }}</td>
                                <td class="txt-right">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary pt-025" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('countries.edit',$country->id) }}"><span class="material-icons">edit</span>{{ __('global.edit') }}</a>
                                            </li>
                                            <li>
                                                {!! Form::open(['method' => 'DELETE','route' => ['countries.destroy', $country->id],'style'=>'display:inline']) !!}
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
            @include('layouts.admin.pagination.index', ['paginator' => $countries])
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
@endpush