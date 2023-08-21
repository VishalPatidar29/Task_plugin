<?php

defined( 'ABSPATH' ) || exit;

// Register custom post type
function custom_product_post_type() {
    $labels = array(
        'name'               => 'Products',
        'singular_name'      => 'Product',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Product',
        'edit_item'          => 'Edit Product',
        'new_item'           => 'New Product',
        'view_item'          => 'View Product',
        'search_items'       => 'Search Products',
        'not_found'          => 'No products found',
        'not_found_in_trash' => 'No products found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'product' ),
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-cart',
        'supports'            => array( 'title', 'editor', 'thumbnail', ),
    );

    register_post_type( 'product', $args );
}
add_action( 'init', 'custom_product_post_type' );




?>