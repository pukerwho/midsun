<div class="case-item relative rounded-2xl">
  <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
  <div class="h-[350px]">
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" loading="lazy" class="w-full h-full object-cover rounded-2xl rounded-b-3xl">
  </div>
  <div class="w-full h-full absolute top-0 left-0 rounded-2xl bg-gradient-to-b from-transparent to-black"></div>
  <div class="absolute bottom-0">
    <div class="text-xl font-title uppercase px-4 py-8">
      <?php the_title(); ?>
    </div>
  </div>
</div>