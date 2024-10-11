<!DOCTYPE html>
<html <?php language_attributes(); ?>>
 <head>
   <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
   <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
   <?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>
    <header>
        <div class="container">
            <a href="<?php echo get_site_url(); ?>" class="logo" id="main-logo">
                <span class="signet"></span>
                <ul><li></li><li></li><li></li></ul>
            </a>
            <div id="icon-menu" class="d-md-none">
                <span></span><span></span><span></span><span></span>
            </div>
            <nav>
                <?php wp_nav_menu( array( 'header-menu' => 'header-menu', 'container' => false, ) ); ?>
            </nav>
        </div>
    </header>
