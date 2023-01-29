@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.problemTitle') }}</h1>
        </div>
    </div>    
    <div class="row gx-5">
        @if(count($problems) != 0)
            @foreach($problems as $problem)
            <div class="col-lg-12">
                <div class="card card-raised card-collapsible mb-2 long-clicker" id="usersCollapse{{$problem->id}}" data-problemKey="{{$problem->id}}">
                    <div class="card-header bg-transparent collapsed" data-bs-toggle="collapse" data-bs-target="#usersCollapseContent{{$problem->id}}" aria-expanded="false" aria-controls="usersCollapseContent{{$problem->id}}">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text-primary">person</i>
                            <div class="ms-3">
                                <div class="fs-6 mb-1 fw-500">Poster</div>
                                <div class="small">{{$problem->poster}}</div>
                            </div>
                        </div>
                        <i class="material-icons card-header-icon">expand_less</i>
                    </div>
                    <div class="card-body px-0 collapse" id="usersCollapseContent{{$problem->id}}" data-bs-parent="#usersCollapse{{$problem->id}}">
                        <div class="nav flex-column">
                            <p class="p-3 m-0">{{$problem->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <h2 class="card-title text-center">{{ __('global.none') }}</h2>
                </div>
            </div>
        </div>
        @endif        
    </div>
</div>
@csrf
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="https://rawgit.com/pisi/Longclick/master/jquery.longclick-min.js"></script>
<script>
    $(".long-clicker").longclick(500, function(){
        const id = $(this).attr('data-problemKey');
        swal({
            title: 'Are you sure you want to delete this problem?',
            text: lang.deleteConfirmText,
            icon: lang.deleteConfirmIcon,
            type: lang.deleteConfirmType,
            buttons: lang.deleteConfirmButton,
            confirmButtonColor: lang.deleteConfirmButtonColor,
            cancelButtonColor: lang.cancelButtonColor,
            confirmButtonText: lang.confirmButtonText
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: '/admin/other/problems/delete',
                    data: {
                        '_token': $("input[name='_token']").val(),
                        'problem_key': id
                    },
                    success: function(result) {
                        if(result['success'] == true) {
                            new bs5.Toast({
                                body: result['msg'],
                                className: 'border-0 bg-success text-white',
                                btnCloseWhite: true,
                            }).show();
                            $('#usersCollapse' + id).remove();
                        } else {
                            new bs5.Toast({
                                body: result['msg'],
                                className: 'border-0 bg-danger text-white',
                                btnCloseWhite: true,
                            }).show();
                        }
                    },
                    error: function() {
                        new bs5.Toast({
                            body: lang.unexpectedErrorOccured,
                            className: 'border-0 bg-danger text-white',
                            btnCloseWhite: true,
                        }).show();
                    }
                });
            }
        });
    });
</script>
@endpush