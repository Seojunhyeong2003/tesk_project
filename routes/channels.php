<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('holzzak', function ($user, $id) {
    return true;
//    return (int) $user->id === (int) $id;
});
