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

?>
<?php get_header();?>
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
    <?php get_footer();?>


