<?php 

if (! function_exists('parseDateTime')) {
    function parseDateTime($date, $time)
    {
        return DateTime::createFromFormat('d/m/y H:i', $date . ' ' . $time);
    }
}

if (! function_exists('parseTimeString')) {
    function parseTimeString($timeFromNow)
    {
        $dateTimeFromNow = DateTime::createFromFormat('d/m/y H:i', date('d/m/y H:i', strtotime('+' . substr($timeFromNow,0, strlen($timeFromNow) - 1) . ' hours'))); // Kind of janky but need to convert '36h' for example into a PHP/strtotime readable format ('+36 hours')
        
        return $dateTimeFromNow;
    }
}
if (! function_exists('parseLocation')) {
    function parseLocation($postcode) {
        switch (strlen($postcode)) {
            case 5:
                return substr($postcode, 0, 1);
            default:
                return substr($postcode, 0, 2);
        }
    }
}