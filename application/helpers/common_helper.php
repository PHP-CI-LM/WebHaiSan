<?php


function app_title()
{
    return 'Hải Sản Bình Minh';
}


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
        $diffTime = $diffTime / 60 . ' giờ trước';
    } else if ($diffTime >= 1440 && $diffTime < 10080) {
        $diffTime = $diffTime / 1440 . ' ngày trước';
    } else if ($diffTime >= 10080 && $diffTime < 40320) {
        $diffTime = $diffTime / 40320 . ' tuần trước';
    } else if ($diffTime >= 40320 && $diffTime < 525600) {
        $diffTime = $diffTime / 40320 . ' tháng trước';
    } else {
        $diffTime = $diffTime / 525600 . ' năm trước';
    }

    return $diffTime;
}


/**
 * Generate configration for paginate method of products page
 * 
 * @param int $total_rows
 * @param int $limit_per_page
 * 
 * @return array
 */
function generateConfigPagination($total_rows, $limit_per_page = 10, $base_url, $uri_segment = 3, $prefix = '', $suffix = '', $use_query_string = false)
{
    $config['total_rows'] = $total_rows;
    $config['base_url'] = $base_url;
    $config['per_page'] = $limit_per_page;
    $config['uri_segment'] = $uri_segment;
    if (false == $use_query_string) {
        $config['use_page_numbers'] = TRUE;
    } else {
        $config['use_page_numbers'] = FALSE;
    }
    
    $config['page_query_string'] = $use_query_string;
    $config['query_string_segment'] = 'page';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';
    $config['num_links'] = 3;
    $config['prefix'] = $prefix;
    $config['suffix'] = $suffix;
    $config['use_page_numbers'] = true;
    $config['full_tag_open'] = '<div class="pagination">';
    $config['full_tag_close'] = '</div>';
    $config['cur_tag_open'] = '<a href="javascript:void(0)" class="active_link">';
    $config['cur_tag_close'] = '</a>';
    $config['next_tag_open'] = '<span class="next_link">';
    $config['next_tag_close'] = '</span>';
    $config['prev_tag_open'] = '<span class="prev_link">';
    $config['prev_tag_close'] = '</span>';
    $config['last_tag_open'] = '<span class="last_link">';
    $config['last_tag_close'] = '</span>';
    $config['attributes'] = [
        'class'     => 'page_link'
    ];
    return $config;
}


/**
 * Get base url of pagination
 * 
 * @param string $current_url
 * 
 * @return array
 */
function getBaseURL($current_url = '', $query = null)
{
    $html_post = strripos($current_url, '.html');
    if (null != $query) {
        unset($query['page']);
        $query_string = '?' . http_build_query($query);
        return substr(current_url(), 0, $html_post + 5) . $query_string;
    }
    $current_url = substr(current_url(), 0, $html_post + 5);
    return $current_url . '/';
}


/**
 * Generate pagination link
 */
function generatePagingLinks($total_rows, $limit_per_page = 10, $use_query_string = false, $uri_segment = 3, $prefix = '', $suffix = '')
{
    $CI = &get_instance();
    $limit_per_page = 8;
    $baseURL = getBaseURL(current_url(), $CI->input->get(null, true));
    $config = generateConfigPagination($total_rows, $limit_per_page, $baseURL, $uri_segment, $prefix, $suffix, $use_query_string);
    $CI->pagination->initialize($config);
    return $CI->pagination->create_links();
}
