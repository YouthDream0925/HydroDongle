@extends('errors.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <!-- Error message content-->
            <div class="text-center my-5 mt-sm-10">
                <img class="img-fluid mb-4" src="{{ asset('theme/assets/img/illustrations/error-400.svg') }}" alt="400 Error Image by Freepik Storyset" style="max-width: 30rem" />
                <p class="lead">Your request resulted in an error.</p>
                <a class="btn btn-primary" href="index.html">
                    <i class="material-icons leading-icon">arrow_back</i>
                    Return to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
