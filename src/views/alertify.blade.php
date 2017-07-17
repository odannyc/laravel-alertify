<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package laravel-alertify
 */

@if (Session::has('odannyc.alertify.alert'))
    <script>
        @foreach(Session::pull('odannyc.alertify.alert') as $alert)
            alertify.delay({{ $alert->delay }});
            alertify.logPosition({{ $alert->position }});
            alertify.closeLogOnClick({{ $alert->clickToClose }});

            alertify.{{ $alert->type }}({{ $alert->message }});
        @endforeach
    </script>
@endif
