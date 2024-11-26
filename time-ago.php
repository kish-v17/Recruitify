<?php
function get_timeago($ptime)
{
    $estimate_time = time() - $ptime; // Calculate time difference

    if ($estimate_time < 1) {
        return 'less than 1 second ago'; // If the time difference is less than 1 second
    }

    $conditions = array(
        12 * 30 * 24 * 60 * 60 => 'year',   // 1 year = 12 months = 30 days = 24 hours = 60 minutes = 60 seconds
        30 * 24 * 60 * 60      => 'month',  // 1 month = 30 days
        24 * 60 * 60           => 'day',    // 1 day = 24 hours
        60 * 60                => 'hour',   // 1 hour = 60 minutes
        60                     => 'min',    // 1 minute = 60 seconds
        1                      => 'second'  // 1 second
    );

    // Loop through each time condition
    foreach ($conditions as $secs => $str) {
        $d = $estimate_time / $secs;

        // If the time difference is greater than or equal to 1
        if ($d >= 1) {
            $r = floor($d);  // Round down the result for the time difference
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago'; // Add plural 's' if necessary
        }
    }
}
?>
