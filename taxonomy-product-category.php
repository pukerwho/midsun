<?php 
  get_header(); 
  $current_cat_id = get_queried_object_id();
  $categories = get_terms(array( 'taxonomy' => 'product-category', 'empty' => true ));
?>

<div class="space-top">
  <div class="mb-20 py-10 xl:py-20">
    <div class="container">
      <h1 class="text-3xl xl:text-4xl xl:leading-12 font-title mb-6 treba-animate fade-up"><?php single_term_title(); ?></h1>
      <div class="w-full xl:w-2/3 text-lg opacity-75 mb-12">
        <?php echo category_description(); ?>
      </div>
      <div class="w-full h-[1px] bg-gray-700 mb-12"></div>
      <div class="flex flex-wrap flex-col xl:flex-row xl:-mx-10">
        <div class="w-full xl:w-1/3 xl:px-10 mb-12 xl:mb-0">
          <div class="sticky top-6">
            <div class="text-2xl font-title mb-6"><?php _e("Категоріі", "treba-wp"); ?></div>
            <div class="mb-12">
              <?php
                $menu_name = 'products_menu';
                $locations = get_nav_menu_locations();

                if( $locations && isset( $locations[ $menu_name ] ) ){
                  $menu_items = wp_get_nav_menu_items( $locations[ $menu_name ] );

                  $menu_list = '<ul id="menu-' . $menu_name . '" class="flex flex-col">';
                  foreach ( (array) $menu_items as $key => $menu_item ){
                    $menu_emoji = '' . get_stylesheet_directory_uri() . '/images/aroma-pattern-item.svg';
                    $menu_list .= '<li class="flex items-center relative mb-4"><a href="' . $menu_item->url . '" class="absolute-link"></a><img src="'. $menu_emoji .'" class="w-4 h-4 mr-4"><span class="text-lg">' . $menu_item->title . '</span></li>';
                  }
                  $menu_list .= '</ul>';
                }
                else {
                  $menu_list = '<ul><li>Меню "' . $menu_name . '" не определено.</li></ul>';
                }

                echo $menu_list;
              ?>
            </div>
            <div class="divider w-full h-[8px] mb-12"></div>
            <div>
              <div class="text-2xl font-title uppercase mb-6"><?php _e("Отримати консультацію", "treba-wp"); ?></div>
              <?php echo get_template_part('template-parts/components/contact-form'); ?>
            </div>
          </div>
        </div>
        <div class="w-full xl:w-2/3 xl:px-10">
          <div class="flex flex-wrap -mx-4">
            <?php 
              $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
              $query = new WP_Query( array( 
                'post_type' => 'products', 
                'posts_per_page' => 10,
                'order'    => 'DESC',
                'paged' => $current_page,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'product-category',
                    'terms' => $current_cat_id,
                    'field' => 'term_id',
                    'include_children' => true,
                    'operator' => 'IN'
                  )
                ),
              ) );
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <div class="w-1/2 px-4 mb-6">
                <?php echo get_template_part('template-parts/components/product-card'); ?>
              </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>