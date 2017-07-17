<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package laravel-alertify
 */

@if (Session::has('odannyc.alertify.logs'))
    <script>
        @foreach(Session::pull('odannyc.alertify.logs') as $log)
            alertify.delay({{ $log->delay }});
            alertify.logPosition({{ $log->position }});
            alertify.closeLogOnClick({{ $log->clickToClose }});

            alertify.{{ $alert->type }}({{ $log->message }});
        @endforeach
    </script>
@endif
