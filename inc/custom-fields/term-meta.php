<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_term_options' );
function crb_term_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
  ->where( 'term_taxonomy', '=', 'services-category' )
  ->add_fields( array(
    Field::make( 'image', 'crb_services_cat_image', 'Заглавная картинка' ),
    Field::make( 'rich_text', 'crb_services_cat_content', 'Текст' ),
  ));

  Container::make( 'term_meta', __( 'City Options', 'crb' ) )
  ->where( 'term_taxonomy', '=', 'city' ) // only show our new field for categories
  ->add_fields( array(
    Field::make( 'image', 'crb_city_img', 'Заглавная картинка' )->set_value_type( 'url'),
    Field::make( 'select', 'crb_city_region', 'Регион' )
    ->add_options( array(
      'azovsea' => 'Азовское море',
      'blacksea' => 'Черное море',
      'karpaty' => 'Карпаты',
    ) ),
  ));
}

?>
