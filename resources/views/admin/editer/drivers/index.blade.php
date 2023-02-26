@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.driverTitle') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('drivers.create') }}">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            @if(count($drivers) != 0)
            <div class="card card-raised mb-2">
                <div class="card-body p-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('global.no') }}</th>
                                <th scope="col">{{ __('global.name') }}</th>
                                <th scope="col">{{ __('global.version') }}</th>
                                <th scope="col">{{ __('global.link') }}</th>
                                <th scope="col">{{ __('global.description') }}</th>
                                <th scope="col" class="txt-right">{{ __('global.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drivers as $key => $driver)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $driver->driver_name }}</td>
                                <td>{{ $driver->driver_version }}</td>
                                <td>{{ \AppHelper::instance()->short_string($driver->driver_link, 20) }}</td>
                                <td>{{ $driver->description }}</td>
                                <td class="txt-right">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary pt-025" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('drivers.edit',$driver->id) }}"><span class="material-icons">edit</span>{{ __('global.edit') }}</a>
                                            </li>
                                            <li>
                                                {!! Form::open(['method' => 'DELETE','route' => ['drivers.destroy', $driver->id],'style'=>'display:inline']) !!}
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
            @include('layouts.admin.pagination.index', ['paginator' => $drivers])
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