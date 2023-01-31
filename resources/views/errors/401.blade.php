@extends('errors.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <!-- Error message content-->
            <div class="text-center my-5 mt-sm-10">
                <img class="img-fluid mb-4" src="{{ asset('theme/assets/img/illustrations/error-401.svg') }}" alt="401 Error SVG Image" style="max-width: 30rem" />
                <p class="lead">Access to this resource is denied.</p>
                <a class="btn btn-primary" href="index.html">
                    <i class="material-icons leading-icon">arrow_back</i>
                    Return to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection