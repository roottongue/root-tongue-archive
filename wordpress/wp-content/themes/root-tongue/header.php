<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-74127104-1"></script>
		<script>
  			window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
  			gtag('config', 'UA-74127104-1');
		</script>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
		<meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.png" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-precomposed.png">
		<?php if( ICL_LANGUAGE_CODE=='zh-hant' || ICL_LANGUAGE_CODE=='zh-hans'){ ?>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/stylesheets/chinese_font.css">
		<?php } ?>
		<!--
		/**
		 * @license
		 * MyFonts Webfont Build ID 3136849, 2015-12-06T18:01:54-0500
		 *
		 * The fonts listed in this notice are subject to the End User License
		 * Agreement(s) entered into by the website owner. All other parties are
		 * explicitly restricted from using the Licensed Webfonts(s).
		 *
		 * You may obtain a valid license at the URLs below.
		 *
		 * Webfont: FuturaBT-Book by Bitstream
		 * URL: http://www.myfonts.com/fonts/bitstream/futura/book/
		 * Copyright: Copyright 1990-2003 Bitstream Inc. All rights reserved.
		 * Licensed pageviews: 10,000
		 *
		 * Webfont: FuturaBT-Bold by Bitstream
		 * URL: http://www.myfonts.com/fonts/bitstream/futura/bold/
		 * Copyright: Copyright 1990-2003 Bitstream Inc. All rights reserved.
		 * Licensed pageviews: 10,000
		 *
		 * Webfont: FuturaBT-MediumCondensed by Bitstream
		 * URL: http://www.myfonts.com/fonts/bitstream/futura/medium-condensed/
		 * Copyright: Copyright 1990-2003 Bitstream Inc. All rights reserved.
		 * Licensed pageviews: 10,000
		 *
		 * Webfont: TandelleRg-Regular by Typodermic
		 * URL: http://www.myfonts.com/fonts/typodermic/tandelle/regular/
		 * Copyright: (c) 2005-2010 Typodermic Fonts. This font is not freely distributable.
		 * Visit typodermic.com for more info.
		 * Licensed pageviews: 20,000
		 *
		 *
		 * License: http://www.myfonts.com/viewlicense?type=web&buildid=3136849
		 *
		 * © 2015 MyFonts Inc
		*/
		-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>
	<?php
		if( ICL_LANGUAGE_CODE=='zh-hant' || ICL_LANGUAGE_CODE=='zh-hans'){
			$menu_title='選單';}
		else{
			$menu_title='MENU';
		}
    ?>
    <?php
        $mediaDirectory = get_stylesheet_directory_uri();
        $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
        //$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android"); // may not need this

        if( is_page(6) AND ($iPhone || $iPad) ) {
            echo "<video id='rt-opening' poster='$mediaDirectory/assets/video/rt-opening-still.jpg'></video>";
        } elseif ( is_page(6) ) {
            echo "<video autoplay muted id='rt-opening'><source src='$mediaDirectory/assets/video/RT_Opening.mp4' type='video/mp4'></video>";
        }
    ?>

    <div id="body-wrapper">
	<header id="masthead" class="site-header" role="banner">
    <span class="lang_swt">
      <?php
        $languages = icl_get_languages('skip_missing=0');
      $items = "";
      if( ! empty( $languages ) ) {
        foreach( $languages as $l ){
          if( $l['native_name']=='English' )
          {
            $lang_name='EN';
          } else {
            $lang_name=$l['native_name'];
          }
          $items .= '<li class="menu-item" id="langcode_'.$l['code'].'"><a href="' . $l['url'] . '">' . $lang_name . '</a></li>';
        }
        echo $items;
      }?>
    </span>

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-left">
					<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
			<div class="top-bar-right">
				<div class="nav-toggle">
					<span class="menu-label"><?php echo $menu_title; ?></span>
					<span class="menu-icon">
					</span>
				</div>
				<nav id="main-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
				</nav>
			</div>
		</nav>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' ); ?>
