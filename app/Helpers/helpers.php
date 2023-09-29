<?php

/* To get the language selection of logged user */
if (! function_exists('getAppLocale')) {
    function getAppLocale()
    {
        //modify this based on user's language selection
        return config('app.locale');
    }
}