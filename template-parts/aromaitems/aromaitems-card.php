<div class="w-full h-[75px] flex justify-end mb-6">
  <div class="w-full flex justify-between items-center bg-main-gray rounded-2xl cursor-pointer">
    <div class="flex items-center">
      <div class="mr-4 xl:mr-6">
        <div class="relative h-[75px]">
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="w-[50px] min-w-[50px] xl:w-[175px] xl:min-w-[175px] rounded-l-2xl h-full object-cover">
          <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-l from-main-gray via-main-dark/75 rounded-l-2xl"></div>
        </div>
      </div>
      <div class="mr-4 xl:mr-6">
        <div class="w-[1px] h-[35px] bg-primary"></div>
      </div>
      <div>
        <div class="text-xl xl:text-2xl"><?php the_title(); ?></div>
      </div>
    </div>
    <div class="px-6 xl:px-8">
      <div class="relative flex items-center bg-main-dark rounded-2xl px-4 xl:px-8 py-3">
        <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
        <div class="text-sm xl:text-base mr-2"><?php _e("Детальніше", "treba-wp"); ?></div>
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 xl:h-5 w-4 xl:w-5 opacity-75" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </div>
    </div>
  </div>
</div>