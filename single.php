<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="hidden postID"><?php echo get_the_ID(); ?></div>
<div class="post-item__top relative mb-12">
  <div class="h-full">
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover">
    <div class="w-full h-full absolute left-0 top-0 bg-gradient-to-b from-transparent to-black/75"></div>
  </div>
  <div class="container relative">
    <div class="w-full lg:w-8/12 absolute left-0 right-0 bottom-12 mx-auto px-6 xl:px-0">
      <h1 class="post-item__title"><?php the_title(); ?></h1>
      <div class="post-item__author-top">by <?php echo get_the_author(); ?></div>
    </div>
  </div>
</div>

<div class="post-item__content mb-32">
  <div class="container">
    <div class="w-full lg:w-8/12 mx-auto">
      <div class="flex items-center post-card__meta -mx-1 mb-12">
        <div class="px-1"><?php echo get_the_date('d.m.Y'); ?></div>
        <div class="px-1">·</div>
        <div class="post-time-read px-1"><span></span> min read</div>
      </div>
      <div class="content border-b pb-12 mb-12"><?php the_content(); ?></div>
      
      <div class="flex justify-between items-center">
        <!-- AUTHOR -->
        <div class="post-item__author flex items-center">
          <!-- AVATAR -->
          <div class="mr-4">
            <?php 
              $avatar_url = carbon_get_user_meta(get_the_author_meta( 'ID' ), 'crb_user_ava'); 
            ?>
            <?php if ($avatar_url): ?>
              <img src="<?php echo $avatar_url; ?>" alt="" class="avatar">
            <?php else: ?>
              <?php 
                $avatar = get_avatar(
                  get_the_author_meta('ID'), '', '', '',
                  array( 'class' => array( 'avatar' ) )
                );
              ?>
              <?php if ($avatar): ?>
                <?php echo $avatar; ?>
              <?php else: ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/user.png" width="50px">
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <!-- END AVATAR -->
          <div class="flex flex-col">
            <div class="name"><?php echo get_the_author(); ?></div>
            <div class="description"><?php _e('Pay with Crypto', 'treba-wp'); ?></div>
          </div>
        </div>
        <!-- END AUTHOR -->

        <!-- SHARE -->
        <div>
          <?php do_action('show_social_share_buttons'); ?>
        </div>
        <!-- END SHARE -->
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="w-full lg:w-11/12">
    <!-- RELATED POSTS -->
    <div class="flex flex-wrap flex-col lg:flex-row">
      <div class="w-full lg:w-2/12">
        <div class="nav-subtitle"><?php _e('Related posts', 'treba-wp'); ?></div>
      </div>
      <div class="w-full lg:w-9/12">
        <?php 
          $current_id = get_the_ID();
          $query = new WP_Query( array( 
            'post_type' => 'post', 
            'posts_per_page' => 5,
            'order'    => 'ASC',
            'post__not_in' => array($current_id),
          ) );
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <div class="w-full mb-12">
            <?php get_template_part('template-parts/components/post-card'); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
    <!-- END LATEST POSTS -->
  </div>
</div>

<?php endwhile; endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>