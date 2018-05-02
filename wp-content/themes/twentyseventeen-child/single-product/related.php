<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">

		<h2><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>

		<?php woocommerce_product_loop_start();
        global $wp;
        $current_url = home_url( add_query_arg( array(), $wp->request ) );

		?>
        <div class="slider_related">
			<?php foreach ( $related_products as $related_product ) : ?>
                <div class="product-item">
                    <a href="<?php echo get_permalink($related_product->id); ?>">
                        <div class="product-img">
                            <?php echo get_the_post_thumbnail($related_product->id);?>
                        </div>
                        <div class="info-box">
                            <div class="name-box"><?php echo $related_product->get_name(); ?></div>
                            <div class="price-box"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $related_product->get_price(); ?></div>
                        </div>
                        <div class="button-box">
                            <div class="button-option">option</div>
                            <a href="<?php echo  $current_url; ?>/?add-to-cart=<?php echo $related_product->id;?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $related_product->id;?>" data-product_sku="" aria-label="Add <?php echo $related_product->get_name(); ?> to your cart" rel="nofollow"><div class="button-buy">buy</div></a>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();
