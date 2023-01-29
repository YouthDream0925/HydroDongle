<script>
    @if ($message = Session::get('success'))
        var message = "<?php echo $message; ?>";
        new bs5.Toast({
            body: message,
            className: 'border-0 bg-success text-white',
            btnCloseWhite: true,
        }).show();
        // @php Session::forget('success'); @endphp
    @endif

    @if ($message = Session::get('error'))
        var message = "<?php echo $message; ?>";
        new bs5.Toast({
            body: message,
            className: 'border-0 bg-danger text-white',
            btnCloseWhite: true,
        }).show();
        // @php Session::forget('error'); @endphp
    @endif

    @if ($message = Session::get('warning'))
        var message = "<?php echo $message; ?>";
        new bs5.Toast({
            body: message,
            className: 'border-0 bg-warning text-white',
            btnCloseWhite: true,
        }).show();
        // @php Session::forget('warning'); @endphp
    @endif

    @if ($message = Session::get('info'))
        var message = "<?php echo $message; ?>";
        new bs5.Toast({
            body: message,
            className: 'border-0 bg-info text-white',
            btnCloseWhite: true,
        }).show();
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            var message = "<?php echo $error; ?>";
            new bs5.Toast({
                body: message,
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
            }).show();
        @endforeach
    @endif
</script>