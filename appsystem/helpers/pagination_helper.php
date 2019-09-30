<?php

function gen_pagination($config = array())
{
    $CI =& get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = $config['base_url'];
    $config['total_rows'] = $config['total_row'];
    $config['enable_query_strings'] = TRUE;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['use_page_numbers'] = TRUE;
    $config['first_link'] =  '<i class="fa fa-angle-double-left" style="font-size: 20px;"></i>';
    $config['next_link'] =  '<i class="fa fa-angle-right" style="font-size: 20px;"></i>';
    $config['last_link']  =  '<i class="fa fa-angle-double-right" style="font-size: 20px;"></i>';
    $config['prev_link']  =  '<i class="fa fa-angle-left" style="font-size: 20px;"></i>';
    $config['query_string_segment'] = 'page';
    $config['per_page'] = $config['per_page'];
    $config['num_links'] = 6;
    $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
    $result = $CI->pagination->initialize($config);
    return $result;
}