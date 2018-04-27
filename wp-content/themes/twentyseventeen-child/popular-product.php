<div class="list-product">
    <h2>POPULAR BIKE</h2>
  <?php $agrs=array(
          "post_type" =>'product'
  );
  $posts = get_posts($agrs);
  foreach ($posts as $post) {
      $_product = wc_get_product($post->ID);
      ?>
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
            <div class="button-buy">buy</div>
        </div>
    </div>
  <?php } ?>
</div>
