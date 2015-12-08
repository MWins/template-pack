<?php 
// Returns The Current Time In GMT In MySQL Compatible Format
function get_date_time($timestamp = 0) {

if ($timestamp) {
    return date("Y-m-d H:i:s", $timestamp);
    } else {
        return gmdate("Y-m-d H:i:s");
    } 
}

function gmtime() { 
    return strtotime(get_date_time()); 
    }
