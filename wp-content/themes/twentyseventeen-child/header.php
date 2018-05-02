<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<body>
<?php if(is_front_page()){ ?>
<header>
    <div class="container">
        <div class="logo">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo.png" alt=""></a>
        </div>
        <nav id="primary-menu">
            <?php wp_nav_menu(); ?>

        </nav>
        <a href="" style="font-size:15px;" class="icon" onclick="return false;"><i class="fa fa-bars" aria-hidden="true"></i></a>
    </div>
</header>
<?php }else{?>
  <header class="header">
    <div class="container">
        <div class="logo">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo.png" alt=""></a>
        </div>
        <nav id="primary-menu">
            <?php wp_nav_menu(); ?>

</nav>
<a href="" style="font-size:15px;" class="icon" onclick="return false;"><i class="fa fa-bars" aria-hidden="true"></i></a>
</div>
</header>
<?php } ?>


