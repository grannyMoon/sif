<?php
/**
 * @package WordPress
 * @subpackage Sverresborg Idrettsforening
 * @since Sverresborg Idrettsforening 1.0
 */
?><!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="sif-wordpress-theme">

	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Always force latest IE rendering engine (even in intranet) -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->

	<?php
		if (is_search())
			echo '<meta name="robots" content="noindex, nofollow" />';
	?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">

	<!--Google will often use this as its description of your page/site. Make it good.-->
	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<?php
		if (true == of_get_option('meta_author'))
			echo '<meta name="author" content="' . of_get_option("meta_author") . '" />';

		if (true == of_get_option('meta_google'))
			echo '<meta name="google-site-verification" content="' . of_get_option("meta_google") . '" />';
	?>

	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">

	<?php
		/*
			j.mp/mobileviewport & davidbcalhoun.com/2010/viewport-metatag
			 - device-width : Occupy full width of the screen in its current orientation
			 - initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
			 - maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
		*/
		if (true == of_get_option('meta_viewport'))
			echo '<meta name="viewport" content="' . of_get_option("meta_viewport") . '" />';


		/*
			These are for traditional favicons and Android home screens.
			 - sizes: 1024x1024
			 - transparency is OK
			 - see wikipedia for info on browser support: http://mky.be/favicon/
			 - See Google Developer docs for Android options. https://developers.google.com/chrome/mobile/docs/installtohomescreen
		*/
		if (true == of_get_option('head_favicon')) {
			echo '<meta name=”mobile-web-app-capable” content=”yes”>';
			echo '<link rel="shortcut icon" sizes=”1024x1024” href="' . of_get_option("head_favicon") . '" />';
		}


		/*
			The is the icon for iOS Web Clip.
			 - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4 retina display (IMHO, just go ahead and use the biggest one)
			 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
			 - Transparency is not recommended (iOS will put a black BG behind the icon) -->';
		*/
		if (true == of_get_option('head_apple_touch_icon'))
			echo '<link rel="apple-touch-icon" href="' . of_get_option("head_apple_touch_icon") . '">';
	?>
		<!-- CSS is loaded via the enqueue function - change as necessary 
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/css/style.css" />
		-->

		<!-- This is an un-minified, complete version of Modernizr.
			 Before you move to production, you should generate a custom build that only has the detects you need. -->
		<script src="<?php echo get_template_directory_uri(); ?>/static/js/modernizr.js"></script>

	<!-- Application-specific meta tags -->
	<?php
		// Windows 8
		if (true == of_get_option('meta_app_win_name')) {
			echo '<meta name="application-name" content="' . of_get_option("meta_app_win_name") . '" /> ';
			echo '<meta name="msapplication-TileColor" content="' . of_get_option("meta_app_win_color") . '" /> ';
			echo '<meta name="msapplication-TileImage" content="' . of_get_option("meta_app_win_image") . '" />';
		}

		// Twitter
		if (true == of_get_option('meta_app_twt_card')) {
			echo '<meta name="twitter:card" content="' . of_get_option("meta_app_twt_card") . '" />';
			echo '<meta name="twitter:site" content="' . of_get_option("meta_app_twt_site") . '" />';
			echo '<meta name="twitter:title" content="' . of_get_option("meta_app_twt_title") . '">';
			echo '<meta name="twitter:description" content="' . of_get_option("meta_app_twt_description") . '" />';
			echo '<meta name="twitter:url" content="' . of_get_option("meta_app_twt_url") . '" />';
		}

		// Facebook
		if (true == of_get_option('meta_app_fb_title')) {
			echo '<meta property="og:title" content="' . of_get_option("meta_app_fb_title") . '" />';
			echo '<meta property="og:description" content="' . of_get_option("meta_app_fb_description") . '" />';
			echo '<meta property="og:url" content="' . of_get_option("meta_app_fb_url") . '" />';
			echo '<meta property="og:image" content="' . of_get_option("meta_app_fb_image") . '" />';
		}
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <div id="wrapper" class="container-fluid">

    <header id="header" role="banner" class="row">
      <div class="col-sm-3 hidden-xs"></div>
      <div class="col-sm-9 col-xs-12">
        <div class="pull-left header-text-left">
          <img src='<?php echo get_template_directory_uri(); ?>/static/images/LogoSverresborg.png' />
          <span id="header-category">
            <?php print get_blog_option($site['blog_id'], 'site_category');?>
          </span>
        </div>
           
        <div class="pull-right header-text-right ">
          <div class="pull-right search-wrapper">
            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                <div>
                  <input type="search" id="s" name="s" value="" placeholder="Søk"/>

                  <button type="submit" class="sif-btn" value="<?php _e('Search','sif'); ?>" id="searchsubmit">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </div>
            </form>
          </div>

          <div class="pull-right" id='header-login'>
            <a href='<?php echo wp_login_url(); ?>'>Logg inn</a>
          </div>
        </div>
      </div>
		</header>
    
    <div class="row">
      <!--Menu bar on left side-->
      <div class="col-sm-3 hidden-xs" id="main-header-area">
        <nav id="nav" role="navigation">
          <?php 
          // Get the sitewide menu
          set_sitewide_menu();
          $menu = unserialize(get_site_option('sitewide_menu'));
//          print "<pre>";
//          var_dump($menu);
//          print "</pre>";
          print_sitewide_menu($menu);
          ?>
          
        </nav>
      </div>

      <!--Main content section, div ends in footer.php-->
      <div class="col-sm-9 col-xs-12" id="main-area">

         <?php 
         if (is_page_template( 'page-main.php' )) {
           print do_shortcode("[rev_slider 1]"); 
         }
         ?>

        <nav id="primary-navigation" class="navbar navbar-default" role="navigation">
          <?php // wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); 
              wp_nav_menu( array(
                  'menu'              => 'primary',
                  'theme_location'    => 'primary',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse ',
                  'container_id'      => 'bs-example-navbar-collapse-1',
                  'menu_class'        => 'nav navbar-nav',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
              );
            ?>

        </nav>
        <div class="row">
          <div class="col-sm-8 col-md-9">
