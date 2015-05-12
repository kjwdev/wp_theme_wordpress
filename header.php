<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); ?> | développeur web</title>
<meta name="description" content="Sité dédiée au developpement web vue par Kjw-developpement, au moyen de créer un site." />
<meta name="keyword" content="conception de site, developpement web, developpeur web, developpeur d'application, developpeur, développeur, développeurs, web, internet, site, php, html, html5" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
</head>

<body <?php body_class(); ?>>

<div class="page">
    <header class="header" role="banner">
        <div class="wrapper">
            <div class="box-logo">
                <h1 class="logo">  
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                        <img src="<?= get_option('logoSite', '')?>" alt="logo KJW" title="KJW" />
                    </a>
                    <div class="logo-part">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            Développement
                        </a>
                    </div>
                </h1>
                <div class="box-citation">
                    
                    <?php bloginfo('description'); ?>
                </div>
            </div>
        </div>
    </header><!-- #masthead -->

    <div id="main">