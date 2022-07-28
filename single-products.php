<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="space-top">
  <main id="primary" class="mb-20 py-10 xl:py-20">
    <div class="container">
      <!-- Хлебные крошки -->    
      <div class="breadcrumbs text-sm text-gray-800 mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <ul class="flex items-center flex-wrap -mx-4">
          <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item px-4 pl-8 ml-4">
            <a itemprop="item" href="<?php echo home_url(); ?>" class="text-orange-400 dark:text-orange-200">
              <span itemprop="name"><?php _e( 'Головна', 'treba-wp' ); ?></span>
            </a>                        
            <meta itemprop="position" content="1">
          </li>
          <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item px-4">
            <a itemprop="item" href="<?php echo get_post_type_archive_link('products'); ?>" class="text-orange-400 dark:text-orange-200">
              <span itemprop="name"><?php _e( 'Обладнання', 'treba-wp' ); ?></span>
            </a>                        
            <meta itemprop="position" content="2">
          </li>
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item text-gray-300 px-4">
            <span itemprop="name"><?php the_title(); ?></span>
            <meta itemprop="position" content="3" />
          </li>
        </ul>
      </div>
      <!-- END Хлебные крошки -->
      <!-- TOP CONTENT -->
      <div class="flex flex-col xl:flex-row xl:-mx-10 mb-20">
        <div class="w-full xl:w-1/2 xl:px-10 mb-12 xl:mb-0">
          <h1 class="text-4xl font-title mb-6"><?php the_title(); ?></h1>
          <div class="content mb-12">
            <?php the_content(); ?>
          </div>
          <div class="btn-primary relative inline-flex p-3 xl:p-4 modal-js" data-modal="contact">
            <div class="relative bg-main-gray text-primary rounded-xl p-2 mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <div class="relative text-lg xl:text-xl mr-2"><?php _e("Замовити", "treba-wp"); ?></div>
            <div class="relative">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
        </div>
        <div class="w-full xl:w-1/2 xl:px-10">
          <div>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full object-contain relative rounded-lg" loading="lazy">
          </div>
        </div>
      </div>
      <!-- END TOP CONTENT -->
      <div class="divider w-full h-[8px] mb-20"></div>
      <div>
        <?php
          $product_content = carbon_get_the_post_meta('crb_product_content');
          foreach ($product_content as $product):
        ?>
          <div class="flex flex-wrap flex-col xl:flex-row xl:-mx-10">
            <div class="w-full xl:w-1/3 xl:px-10">
              <div class="text-xl font-title sticky top-6">
                <?php echo $product['crb_product_content_title']; ?>
              </div>
            </div>
            <div class="w-full xl:w-2/3 xl:px-10 mb-20">
              <div class="content">
                <?php 
                  $text = $product['crb_product_content_text'];
                  echo apply_filters( 'the_content', $text  ); 
                  unset($text);
                ?>
              </div>
            </div>
            <div class="w-full xl:px-10 mb-20">
              <div class="w-full h-[1px] bg-gray-700"></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- GALLERY -->
      <?php if (carbon_get_the_post_meta('crb_product_gallery')): ?>
      <div class="mb-32">
        <div class="text-3xl font-title mb-6"><?php _e("Галерея", "treba-wp"); ?></div>
        <div class="flex flex-wrap -mx-2 xl:-mx-4">
          <?php 
            $products_photos = carbon_get_the_post_meta('crb_product_gallery');
            foreach ( $products_photos as $products_photo ): ?>
            <div class="w-1/2 xl:w-1/4 relative px-2 xl:px-4 mb-4 xl:mb-6">
              <?php 
                $photo_src_large = wp_get_attachment_image_src($products_photo, 'large'); 
                $photo_src_medium = wp_get_attachment_image_src($products_photo, 'medium'); 
              ?>
              <a href="<?php echo $photo_src_large[0]; ?>" data-lightbox="wow-gallery" data-title="<?php the_title(); ?>" class="w-full h-full absolute top-0 left-0 z-10"></a>
              <img src="<?php echo $photo_src_medium[0]; ?>" loading="lazy" class="object-cover w-full h-[225px]">
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
      <!-- END GALLERY -->
    </div>
    <!-- Other products -->
    <div class="container">
      <div class="w-full">
        <div class="flex flex-wrap flex-col lg:flex-row">
          <h2 class="text-3xl font-title mb-12"><?php _e('Інше обладнення', 'treba-wp'); ?></h2>
          <div class="flex flex-wrap -mx-6">
            <?php 
              $current_id = get_the_ID();
              $query = new WP_Query( array( 
                'post_type' => 'products', 
                'posts_per_page' => 3,
                'order'    => 'DESC',
                'post__not_in' => array($current_id),
              ) );
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <div class="w-full xl:w-1/3 px-6 mb-6 xl:mb-0">
                <?php echo get_template_part('template-parts/components/product-card'); ?>
              </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- END Other products -->
  </main>
</div>
<?php endwhile; endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>