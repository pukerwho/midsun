<?php get_header(); ?>

<?php $categories = get_terms(array( 'taxonomy' => 'product-catagory', 'empty' => true )); ?>

<div class="mb-20 py-10 xl:py-20">
  <div class="container">
    <h1 class="text-3xl xl:text-4xl xl:leading-12 font-title mb-6 treba-animate fade-up"><?php _e("Товари і продукти", "treba-wp"); ?></h1>
    <div class="w-full xl:w-2/3 text-lg opacity-75 mb-12">
      <?php _e("Просто обрати правильний аромат недостатньо. Аромат настільки ж важливий, як і обладнання, яке його розповсюджує.", "treba-wp"); ?>
    </div>
    <div class="w-full h-[1px] bg-gray-700 mb-12"></div>
    <div class="flex flex-wrap flex-col xl:flex-row xl:-mx-10">
      <div class="w-full xl:w-1/3 xl:px-10 mb-12 xl:mb-0">
        <div class="sticky top-6">
          <div class="text-2xl font-title mb-6"><?php _e("Категоріі", "treba-wp"); ?></div>
          <?php foreach($categories as $category): ?>
            <div class="flex items-center relative hover:text-primary mb-4">
              <a href="<?php echo get_term_link($category->term_id, 'product-catagory') ?>" class="absolute-link"></a>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-item.svg" class="w-4 h-4 mr-4">
              <span class="text-lg"><?php echo $category->name; ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="w-full xl:w-2/3 xl:px-10">
        <div class="flex flex-wrap -mx-4">
          <?php 
            $query = new WP_Query( array( 
              'post_type' => 'products', 
              'posts_per_page' => 8,
              'order'    => 'ASC',
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

<?php get_footer(); ?>