@if (Session::has('panchania83.alertify.logs'))
    <script>
        @foreach(Session::pull('panchania83.alertify.logs') as $log)
            alertify.parent({{ $log->parent }});
            alertify.delay({{ $log->delay }});
            alertify.logPosition('{{ $log->position }}');
            alertify.closeLogOnClick({{ $log->clickToClose }});

            alertify.{{ $log->type }}('{{ $log->message }}');
        @endforeach
    </script>
@endif
