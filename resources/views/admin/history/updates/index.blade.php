@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.updateTitle') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('updates.create') }}">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            @if(count($updates) != 0)
                @foreach($updates as $update)
                <a style="text-decoration: none;" href="{{ route('updates.edit', $update->id) }}">
                    <div class="col-lg-12 mb-2">
                        <div class="card card-raised ripple-gray mdc-ripple-upgraded">
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <i class="material-icons text-primary">history</i>
                                    <div class="ms-3">
                                        <div class="fs-6 mb-1 fw-500">{{$update->title}}</div>
                                        <div class="small">
                                            <span>{{$update->version}}</span> - <span>{{$update->getDateAtAttribute()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
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