<?php

function getTimestamp()
{
    $date = new DateTime();
    return $date->getTimestamp();
}


function toDatetime($timestamp)
{
    return date('d-m-Y', $timestamp);
}


function diff_time($time1, $time2 = null)
{
    $time1 = strtotime($time1);
    if ($time2 != null) {
        $time2 = strtotime($time2);
    } else {
        $time2 = getTimestamp();
    }
    $diffTime = $time2 - $time1;

    if ($diffTime < 60) {
        $diffTime = 'Vừa mới đây';
    } else if ($diffTime >= 60 && $diffTime < 3600) {
        $diffTime = intval($diffTime/60) . ' phút trước';
    } else if ($diffTime >= 3600 && $diffTime < 86400) {
        $diffTime = intval($diffTime/3600) . ' giờ trước';
    } else if ($diffTime >= 86400 && $diffTime < 604800) {
        $diffTime = intval($diffTime/86400) . ' ngày trước';
    } else if ($diffTime >= 604800 && $diffTime < 2419200) {
        $diffTime = intval($diffTime/604800) . ' tuần trước';
    } else if ($diffTime >= 2419200 && $diffTime < 29030400) {
        $diffTime = intval($diffTime/2419200) . ' tháng trước';
    } else {
        $diffTime = intval($diffTime/29030400) . ' năm trước';
    }

    return $diffTime;
}