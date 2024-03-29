<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="h-[400px] w-full relative mb-12">
    <?php 
      $photo_medium = get_the_post_thumbnail_url( get_the_ID(), 'medium' ); 
      $photo_large = get_the_post_thumbnail_url( get_the_ID(), 'large' );
      $photo_full = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    ?>
    <div>
      <img srcset="<?php echo $photo_medium; ?> 767w, 
      <?php echo $photo_large; ?> 1280w,
      <?php echo $photo_full; ?> 1440w"
      sizes="(max-width: 767px) 767px,
      (max-width: 1280px) 1280px,
      1440px"
      src="<?php echo $photo_full; ?>" alt="<?php the_title(); ?>" loading="lazy" class="w-full h-[400px] object-cover">
    </div>
    <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-b from-slate-800/90 to-main-dark"></div>
    <div class="absolute left-1/2 bottom-0 -translate-x-1/2">
      <h1 class="text-4xl font-title text-center uppercase mb-12"><?php the_title(); ?></h1>
      <div class="text-xl opacity-75"><?php echo carbon_get_the_post_meta('crb_service_description'); ?></div>
    </div>
  </div>
  <div class="flex items-center justify-center opacity-75 -mx-2 mb-12 xl:mb-20 treba-animate fade-up">
    <div class="bg-primary w-6 h-[1px] px-2"></div>
    <div class="px-2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-item.svg" class="w-4 h-4"></div>
    <div class="bg-primary w-6 h-[1px] px-2"></div>
  </div>
  <div class="container mb-20">
    <div class="flex flex-wrap flex-col xl:flex-row xl:-mx-10 mb-20">
      <div class="w-full xl:w-2/3 xl:px-10 mb-20 xl:mb-0">
        <div class="content">
          <?php the_content(); ?>
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
    <!-- Блоки Текст+Картинка -->
    <div class="mb-20">
      <?php
        $items = carbon_get_the_post_meta('crb_service_blocks');
        foreach ($items as $item):
      ?>
        <div class="flex flex-col odd:xl:flex-row even:xl:flex-row-reverse xl:-mx-10 mb-20 last:mb-6">
          <div class="w-full xl:w-1/2 xl:px-10 mb-12 xl:mb-0">
            <div>
              <img src="<?php echo $item['crb_service_blocks_img']; ?>" alt="" loading="lazy" class="w-full h-full object-cover rounded-xl">
            </div>
          </div>
          <div class="w-full xl:w-1/2 xl:px-10 mb-20 xl:mb-0">
            <div class="content mb-12">
              <?php 
                $text = $item['crb_service_blocks_content'];
                echo apply_filters( 'the_content', $text  ); 
                unset($text);
              ?>
            </div>
            <?php if ($item['crb_service_blocks_btn']): ?>
              <div class="btn-primary relative inline-flex p-3 xl:p-4 modal-js" data-modal="contact">
                <div class="relative bg-main-gray text-primary rounded-xl p-2 mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 xl:h-6 w-6 xl:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                </div>
                <div class="relative text-lg xl:text-xl mr-2"><?php echo $item['crb_service_blocks_btn']; ?></div>
                <div class="relative">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- END Блоки Текст+Картинка -->

    <!-- GALLERY -->
    <?php if (carbon_get_the_post_meta('crb_service_gallery')): ?>
    <div class="mb-20">
      <div class="text-3xl font-title mb-6"><?php _e("Галерея", "treba-wp"); ?></div>
      <div class="flex flex-wrap -mx-2 xl:-mx-4">
        <?php 
          $services_photos = carbon_get_the_post_meta('crb_service_gallery');
          foreach ( $services_photos as $services_photo ): ?>
          <div class="w-1/2 xl:w-1/4 relative px-2 xl:px-4 mb-4 xl:mb-6">
            <?php 
              $photo_src_large = wp_get_attachment_image_src($services_photo, 'large'); 
              $photo_src_medium = wp_get_attachment_image_src($services_photo, 'medium'); 
            ?>
            <a href="<?php echo $photo_src_large[0]; ?>" data-lightbox="wow-gallery" data-title="<?php the_title(); ?>" class="w-full h-full absolute top-0 left-0 z-10"></a>
            <img src="<?php echo $photo_src_medium[0]; ?>" loading="lazy" class="object-cover w-full h-[225px]">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
    <!-- END GALLERY -->

    <!-- Other services -->
    <div class="mb-20">
      <h2 class="text-3xl font-title mb-12"><?php _e("Схожі послуги", "treba-wp"); ?></h2>
      <div class="flex flex-wrap">
        <?php 
          $current_id = get_the_ID();
          $query = new WP_Query( array( 
            'post_type' => 'services', 
            'posts_per_page' => 5,
            'order'    => 'DESC',
            'post__not_in' => array($current_id),
          ) );
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <?php echo get_template_part('template-parts/aromaitems/aromaitems-card'); ?>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
    <!-- END Other services -->

    <!-- Cases -->
    <div class="flex flex-wrap flex-col lg:flex-row mb-40">
      <h2 class="text-3xl font-title mb-12"><?php _e('Наші кейси', 'treba-wp'); ?></h2>
      <div class="flex flex-wrap -mx-6">
        <?php 
          $query = new WP_Query( array( 
            'post_type' => 'cases', 
            'posts_per_page' => 3,
            'order'    => 'DESC',
          ) );
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <div class="w-full xl:w-1/3 px-6 mb-6 xl:mb-0">
            <?php echo get_template_part('template-parts/components/case-card'); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
    <!-- END Cases -->
  </div>

  <div class="mb-32">
    <?php echo get_template_part('template-parts/components/consultation'); ?>
  </div>
  

<?php endwhile; endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>