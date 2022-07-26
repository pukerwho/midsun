<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'post' )
    ->add_fields( array(
      // Field::make( 'text', 'crb_post_timetoread', 'Time to read'),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'products' )
    ->add_fields( array(
      Field::make( 'media_gallery', 'crb_product_gallery', 'Галерея' )->set_type( array( 'image' ) ),
      Field::make( 'complex', 'crb_product_content', 'Blocks' )->set_layout('tabbed-horizontal')->add_fields( array(
        Field::make( 'text', 'crb_product_content_title', 'Заголовок' ),
        Field::make( 'rich_text', 'crb_product_content_text', 'Текст' ),
      )),
  ) ); 
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'services' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_service_description', 'Короткий опис' ),
      Field::make( 'complex', 'crb_service_blocks', 'Блоки' )->set_layout('tabbed-horizontal')->add_fields( array(
        Field::make( 'image', 'crb_service_blocks_img', 'Зображення' )->set_value_type( 'url'),
        Field::make( 'rich_text', 'crb_service_blocks_content', 'Текст' ),
      )),
  ) );  
}

?>