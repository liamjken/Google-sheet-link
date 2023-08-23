<?php 

function custom_get_sheet_info() {
    $sheetInfo = array(
        'sheet_id' => get_option('sheet_id'),
        'api_key' => get_option('api_key'),
        'range' => get_option('range')
    );

    return $sheetInfo;
}

add_action('rest_api_init', function () {
    register_rest_route('gsl/v1', 'sheet-info', array(
        'methods' => 'GET',
        'callback' => 'custom_get_sheet_info',
    ));
});
