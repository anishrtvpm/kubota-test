<?php

if (! function_exists('getAppLocale')) {
    function getAppLocale()
    {
        //modify this based on user's language selection
        return config('app.locale');
    }
}