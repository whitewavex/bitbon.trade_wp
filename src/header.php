<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php bloginfo( 'name' ); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ) ?>/libs/libs.min.css">
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ) ?>">
    <?php wp_head() ?>
</head>
<body id="page" class="page">
    <header class="header">
        <div class="header__wrapper">
                   
            <?php 
            
                wp_nav_menu( array(
                    'theme_location'  => 'main_menu', 
                    'container'       => 'nav', 
                    'container_class' => 'navigation header__navigation', 
                    'menu_class'      => 'navigation__list', 
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                ) );
            
            ?>

            <div class="clear"></div>
            <div class="logo header__logo">
                <a href="<?php echo home_url() ?>" class="logo__link d-inline-block">
                    
                    <?php dynamic_sidebar('logo') ?>
                    
                </a>
            </div>
            <div class="triangle header__triangle"></div>
            <div class="rectangle header__rectangle"></div>
        </div>
    </header>