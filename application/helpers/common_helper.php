<?php

function public_url($url = '')
{
    return base_url('static_admin/' . $url);
}

function diff_time($time1, $time2 = null)
{
    $datetime1 = new DateTime($time1);
    if ($time2 != null) {
        $datetime2 = new DateTime($time2);    
    } else {
        $datetime2 = new DateTime('now');
    }
    $diffTime = $datetime1->diff($datetime2)->format('%i');

    if ($diffTime == 0) {
        $diffTime = 'Vừa mới đây';
    } else if ($diffTime > 0 && $diffTime < 60) {
        $diffTime = $diffTime . ' phút trước';
    } else if ($diffTime > 60 && $diffTime < 1440) {
        $diffTime = $diffTime/60 . ' giờ trước';
    } else if ($diffTime >= 1440 && $diffTime < 10080) {
        $diffTime = $diffTime/1440 . ' ngày trước';
    } else if ($diffTime >= 10080 && $diffTime < 40320) {
        $diffTime = $diffTime/40320 . ' tuần trước';
    } else if ($diffTime >= 40320 && $diffTime < 525600) {
        $diffTime = $diffTime/40320 . ' tháng trước';
    } else {
        $diffTime = $diffTime/525600 . ' năm trước';
    }

    return $diffTime;
}
