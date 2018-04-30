<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>


<footer>
    <div class="container">

        <div class="logo">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo_footer.png" alt=""></a>
        </div>
        <nav>
            <?php wp_nav_menu(array( 'theme_location' => 'secondary' ) ); ?>
        </nav>
    </div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>