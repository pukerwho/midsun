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
      Field::make( 'complex', 'crb_product_content', 'Blocks' )->set_layout('tabbed-horizontal')->add_fields( array(
        Field::make( 'text', 'crb_product_content_title', 'Заголовок' ),
        Field::make( 'rich_text', 'crb_product_content_text', 'Текст' ),
      )),
  ) );  
}

?>