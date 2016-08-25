<?php
/**
 * Created by PhpStorm.
 * User: Kaan
 * Date: 25.08.2016
 * Time: 03:13 AM
 */

// Get Categories
function get_categories_h(){
    $CI = get_instance();
    $categories = $CI->Product_model->get_categories();

    return $categories;
}

function get_popular_h(){
    $CI = get_instance();
    $CI->load->model('Product_model');
    $popular_products = $CI->Product_model->get_popular();

    return $popular_products;
}
