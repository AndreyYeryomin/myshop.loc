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
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo.png" alt=""></a>
        </div>
        <nav>
            <?php wp_nav_menu(); ?>    
        </nav>
    </div>
</header>

<div class="main">
<?php
echo do_shortcode('[slider id="23"]');
if(is_front_page()) {
    include('category.php');
    include ('popular-product.php');
    include ('contact.php');
}
?>
</div>
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="wrap">
            <?php wp_footer(); ?>
            <?php
            get_template_part( 'template-parts/footer/footer', 'widgets' );

            get_template_part( 'template-parts/footer/site', 'info' );
            ?>
        </div><!-- .wrap -->
    </footer><!-- #colophon -->
</body>
</html>


