<script>
    @if ($message = Session::get('success'))
    var message = "<?php echo $message; ?>";
    new bs5.Toast({
        body: message,
        className: 'border-0 bg-success text-white',
        btnCloseWhite: true,
    }).show();
    @endif

    @if ($message = Session::get('error'))
    var message = "<?php echo $message; ?>";
    new bs5.Toast({
        body: message,
        className: 'border-0 bg-danger text-white',
        btnCloseWhite: true,
    }).show();
    @endif

    @if ($message = Session::get('warning'))
    var message = "<?php echo $message; ?>";
    new bs5.Toast({
        body: message,
        className: 'border-0 bg-warning text-white',
        btnCloseWhite: true,
    }).show();
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
    var message = "<?php echo $message; ?>";
    new bs5.Toast({
        body: lang.unexpectedError,
        className: 'border-0 bg-danger text-white',
        btnCloseWhite: true,
    }).show();
    @endif
</script>