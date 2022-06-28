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
            <div class="flex ">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/midsun-logo.svg" alt="Logo" class="w-full h-[50px]">
            </div>
            <div class="hidden xl:block mainmenu">
              <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => 'div',
                'menu_class' => 'flex'
              ]); ?> 
            </div>
            <div><a href="#" class="bg-gradient-to-r from-main-gray to-main-dark border-2 border-main-gray hover:text-white rounded-xl px-6 py-4"><?php _e("Зв'язатися з нами", "treba-wp"); ?></a></div>
            <div class="xl:hidden">Menu-trigger</div>
          </div>
        </div>
      </div>
    </header>