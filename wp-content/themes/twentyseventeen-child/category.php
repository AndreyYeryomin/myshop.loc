<?php
/**
 * Created by PhpStorm.
 * User: devit31
 * Date: 27.04.18
 * Time: 14:13
 */
$args = array(
    'taxonomy'   => "product_cat",
    'hide_empty' => true,
    "order" => 'ASC',
    "orderby" => 'term_id'
);
$product_categories = get_terms($args); ?>
<div class="category-block">
    <div class="container">
    <h2>CATEGORY</h2>
        <ul class="category-list">
        <?php foreach ($product_categories as $cat){
            $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
            $image_url = wp_get_attachment_url( $thumbnail_id );
            $description = category_description( $cat->term_id );

        ?>
            <a href="<?php echo get_category_link( $cat->term_id); ?>">
        <li>
            <div class="category-item">
                <div class="overlay"></div>
                <img src="<?php echo $image_url; ?>" alt="">
                <div class="category-text">
                    <div class="category-name">
                        <?php echo $cat->name; ?>
                    </div>
                    <div class="category-description">
                        <?php echo $description; ?>
                    </div>
                    <div class="category-button">
                       GO TO STORE
                    </div>

                </div>
            </div>
        </li>
            </a>
        <?php } ?>
        </ul>
    </div>
</div>
