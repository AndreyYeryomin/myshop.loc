<div class="list-product">
    <h2>POPULAR BIKE</h2>
    <ul class="popular-product">

  <?php
;
  $agrs=array(
            "post_type" =>'product',
            'product_tag' 	 => 'popular'
  );
  $posts = get_posts($agrs);
  foreach ($posts as $post) {
      $_product = wc_get_product($post->ID);
      ?>
      <li>
          <a href="<?php echo get_permalink(); ?>">
            <div class="product-item">
                <div class="product-img">
                    <?php echo get_the_post_thumbnail($post->ID);?>
                </div>
                <div class="info-box">
                    <div class="name-box"><?php echo $_product->get_name(); ?></div>
                    <div class="price-box"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $_product->get_price(); ?></div>
                </div>
                <div class="button-box">
                    <div class="button-option">option</div>
                    <a href="/?add-to-cart=<?php echo $post->ID;?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $post->ID;?>" data-product_sku="" aria-label="Add <?php echo $_product->get_name(); ?> to your cart" rel="nofollow"><div class="button-buy">buy</div></a>
                </div>
            </div>
          </a>
      </li>
  <?php } ?>
    </ul>
</div>
