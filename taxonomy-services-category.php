<?php 
  get_header();
  $current_cat_id = get_queried_object_id();
  $categories = get_terms(array( 'taxonomy' => 'services-category', 'empty' => true ));
?>

<div class="h-[400px] w-full relative mb-12">
  <?php 
    $photo_medium = wp_get_attachment_image_src(carbon_get_term_meta(get_queried_object_id(), 'crb_services_cat_image'), 'medium'); 
    $photo_large = wp_get_attachment_image_src(carbon_get_term_meta(get_queried_object_id(), 'crb_services_cat_image'), 'large'); 
    $photo_full = wp_get_attachment_image_src(carbon_get_term_meta(get_queried_object_id(), 'crb_services_cat_image'), 'full'); 
  ?>
  <div>
    <img srcset="<?php echo $photo_medium[0] ?> 767w, 
    <?php echo $photo_large[0] ?> 1280w,
    <?php echo $photo_full[0] ?> 1440w"
    sizes="(max-width: 767px) 767px,
    (max-width: 1280px) 1280px,
    1440px"
    src="<?php echo $photo_full[0] ?>" alt="<?php single_term_title(); ?>" loading="lazy" class="w-full h-[400px] object-cover">
  </div>
  <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-b from-slate-800/90 to-main-dark"></div>
  <div class="absolute left-1/2 bottom-0 -translate-x-1/2">
    <h1 class="text-4xl font-title text-center uppercase mb-12"><?php single_term_title(); ?></h1>
    <div class="text-xl opacity-75"><?php echo category_description(); ?></div>
  </div>
</div>
<div class="flex items-center justify-center opacity-75 -mx-2 mb-20 treba-animate fade-up">
  <div class="bg-primary w-6 h-[1px] px-2"></div>
  <div class="px-2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-item.svg" class="w-4 h-4"></div>
  <div class="bg-primary w-6 h-[1px] px-2"></div>
</div>
<div class="container mb-20">
  <div class="flex flex-wrap flex-col xl:flex-row xl:-mx-10 mb-20">
    <div class="w-full xl:w-2/3 xl:px-10">
      <div class="content">
        <?php echo carbon_get_term_meta($current_cat_id, 'crb_services_cat_content'); ?>
      </div>
    </div>
    <div class="w-full xl:w-1/3 xl:px-10">
      <div class="relative">
        <div class="w-full h-full absolute top-0 left-0" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-small.svg); background-size: cover;"></div>
        <div class="p-1">
          <div class="relative bg-main-dark rounded-3xl p-6">
            <div class="text-2xl font-title text-center uppercase mb-6"><?php _e("Отримати консультацію", "treba-wp"); ?></div>
            <?php get_template_part('template-parts/components/contact-form'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Services -->
  <div class="mb-20">
    <h2 class="text-3xl font-title mb-12"><?php _e("Послуги", "treba-wp"); ?></h2>
    <div class="flex flex-wrap">
      <?php 
        $query = new WP_Query( array( 
          'post_type' => 'services', 
          'posts_per_page' => -1,
          'order'    => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => 'services-category',
              'terms' => $current_cat_id,
              'field' => 'term_id',
              'include_children' => true,
              'operator' => 'IN'
            )
          ),
        ) );
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <?php echo get_template_part('template-parts/aromaitems/aromaitems-card'); ?>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
  <!-- END Other services -->
</div>

<div class="mb-32">
  <?php echo get_template_part('template-parts/components/consultation'); ?>
</div>
  
<?php get_footer(); ?>