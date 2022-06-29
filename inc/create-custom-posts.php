<?php

function create_post_type() {
  register_post_type( 'cases',
    array(
      'labels' => array(
          'name' => __( 'Кейси' ),
          'singular_name' => __( 'Кейс' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'menu_icon' => 'dashicons-feedback',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions' ),
    )
  );

  register_post_type( 'products',
    array(
      'labels' => array(
          'name' => __( 'Продукти' ),
          'singular_name' => __( 'Продукт' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'menu_icon' => 'dashicons-cart',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions' ),
    )
  );
}
add_action( 'init', 'create_post_type' );