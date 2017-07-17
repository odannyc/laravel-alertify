@if (Session::has('odannyc.alertify.logs'))
    <script>
        @foreach(Session::pull('odannyc.alertify.logs') as $log)
            alertify.parent({{ $log->parent }});
            alertify.delay({{ $log->delay }});
            alertify.logPosition('{{ $log->position }}');
            alertify.closeLogOnClick({{ $log->clickToClose }});

            alertify.{{ $log->type }}('{{ $log->message }}');
        @endforeach
    </script>
@endif
