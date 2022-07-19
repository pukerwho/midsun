<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#1D1E22" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&family=Roboto:wght@300&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <div class="wrap ">
    <header class="header">
      <div class="container">
        <div class="w-full">
          <div class="flex justify-between items-center">
            <div class="flex relative">
              <a href="<?php echo get_home_url(); ?>" class="absolute-link"></a>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/midsun-logo.svg" alt="Logo" class="w-full h-[50px]">
            </div>
            <div class="hidden xl:block mainmenu">
              <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => 'div',
                'menu_class' => 'flex'
              ]); ?> 
            </div>
            <div class="hidden xl:block"><a href="#" class="bg-gradient-to-r from-main-gray to-main-dark border-2 border-main-gray hover:text-white rounded-xl px-6 py-4"><?php _e("Зв'язатися з нами", "treba-wp"); ?></a></div>
            <div class="xl:hidden text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
            </div>
          </div>
        </div>
      </div>
    </header>