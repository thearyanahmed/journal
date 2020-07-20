<?php

if(! function_exists('notify')) {
    function notify(string $message) {
        request()->session()->flash('status', $message);
    }
}
