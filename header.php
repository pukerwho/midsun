<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#1D1E22" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <div class="wrap overflow-hidden">
    <header class="header">
      <div class="container">
        <div class="w-full">
          <div class="flex justify-between items-center">
            <div class="flex items-end">
              <div class="w-4 h-4 rounded-full bg-gradient-to-r to-orange-300 from-orange-400"></div>
              <div class="w-4 h-12 rounded-xl bg-gradient-to-b to-orange-300 from-orange-400 -rotate-[22deg] mr-3"></div>
              <div class="w-4 h-12 rounded-xl bg-orange-300"></div>
            </div>
            <div class="hidden xl:block mainmenu">
              <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => 'div',
                'menu_class' => 'flex'
              ]); ?> 
            </div>
            <div><a href="#" class="bg-main-gray rounded-2xl px-8 py-3"><?php _e("Зв'язатися з нами", "treba-wp"); ?></a></div>
            <div class="xl:hidden">Menu-trigger</div>
          </div>
        </div>
      </div>
    </header>