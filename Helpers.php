<?php 

if (! function_exists('parseDateTime')) {
    /**
     * @param string $date
     * @param string $time
     * @return DateTime
     */
    function parseDateTime(string $date, string$time): DateTime
    {
        return DateTime::createFromFormat('d/m/y H:i', $date . ' ' . $time);
    }
}

if (! function_exists('parseTimeString')) {
    /**
     * @param string $timeFromNow
     * @return DateTime
     */
    function parseTimeString(string $timeFromNow): DateTime
    {
        $dateTimeFromNow = DateTime::createFromFormat('d/m/y H:i', date('d/m/y H:i', strtotime('+' . substr($timeFromNow,0, strlen($timeFromNow) - 1) . ' hours'))); // Kind of janky but need to convert '36h' for example into a PHP/strtotime readable format ('+36 hours')
        
        return $dateTimeFromNow;
    }
}
if (! function_exists('parseLocation')) {
    /**
     * @param string $postcode
     * @return string
     */
    function parseLocation(string $postcode): string {
        switch (strlen($postcode)) {
            case 5:
                return substr($postcode, 0, 1);
            default:
                return substr($postcode, 0, 2);
        }
    }
}