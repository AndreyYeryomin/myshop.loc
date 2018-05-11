<?php
/**
 * Created by PhpStorm.
 * User: devit31
 * Date: 26.04.18
 * Time: 14:13
 */
add_action( 'wp_enqueue_scripts', 'woo_stripe_script' );
function woo_stripe_script(){
    if(is_checkout()){
        wp_enqueue_script( 'woo-stripe-checkout', 'https://checkout.stripe.com/v2/checkout.js', false );
        wp_enqueue_script('woo-stripe-custom-js',plugins_url('src/js/stripe-custom-js.js'),false);
    }
}
define('MY_POST_TYPE', 'slider');
define('MY_POST_SLUG', 'slider');
function my_register_post_type () {
    $args = array (
        'label' => 'Slider',
        'supports' => array( 'title', 'excerpt','thumbnail' ),
        'register_meta_box_cb' => 'my_meta_box_cb',
        'show_ui' => true,
        'query_var' => true
    );
    register_post_type( MY_POST_TYPE , $args );
}
add_action( 'init', 'my_register_post_type' );
function my_meta_box_cb () {
    add_meta_box( MY_POST_TYPE . '_details' , 'Media Library', 'my_meta_box_details', MY_POST_TYPE, 'normal', 'high' );
}
function my_meta_box_details () {
    global $post;
    $post_ID = $post->ID;
    printf( "<iframe frameborder='0' src=' %s ' style='width: 100%%; height: 400px;'> </iframe>", get_upload_iframe_src('media') );
}
add_filter( 'woocommerce_product_add_to_cart_text', 'archive_add_to_cart_text' );
function archive_add_to_cart_text()
{
    return __('Buy', 'add-to-cart');
}

function my_slider_function ($attr)
{
    $args = array(
        'post_parent' => $attr['id'],
    );
    $images = get_children($args);
    ob_start();
        ?>
   <div class="slick-slider">
        <?php foreach ($images as $image){?>
            <div class="slider-block">
                <img src="<?php echo $image->guid;?>" alt="">
                    <div class="slider-text">
                        <h1>Handmade bicycle</h1>
                        <p>You <span>create</span> the <span>journey</span>, we supply the <span>parts</span></p>
                        <a class="slider-button" href="#">SHOP BIKES</a>
                        <div class="scroll-bar">
                            <svg class="svg1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="66px" height="77px">
                                <path fill-rule="evenodd"  fill="rgb(81, 80, 80)"
                                      d="M55.781,43.512 L55.781,41.140 C60.137,40.967 63.619,37.391 63.619,32.993 C63.619,28.485 59.963,24.830 55.454,24.830 C50.944,24.830 47.289,28.485 47.289,32.993 C47.289,37.275 50.587,40.780 54.781,41.122 L54.781,43.501 C50.786,43.314 47.358,40.964 45.678,37.574 C41.336,44.620 33.550,49.320 24.665,49.320 C11.043,49.320 -0.000,38.279 -0.000,24.660 C-0.000,11.040 11.043,-0.000 24.665,-0.000 C38.041,-0.000 48.922,10.647 49.311,23.926 C51.018,22.779 53.072,22.109 55.283,22.109 C61.202,22.109 66.000,26.906 66.000,32.823 C66.000,38.572 61.467,43.250 55.781,43.512 ZM24.665,2.721 C12.546,2.721 2.722,12.543 2.722,24.660 C2.722,36.776 12.546,46.599 24.665,46.599 C33.523,46.599 41.148,41.347 44.613,33.792 C44.584,33.472 44.567,33.150 44.567,32.823 C44.567,32.106 44.639,31.407 44.773,30.729 L27.037,26.871 L26.619,26.871 C26.141,27.290 25.521,27.551 24.835,27.551 C23.332,27.551 22.113,26.333 22.113,24.830 C22.113,23.772 22.718,22.858 23.599,22.408 C23.293,22.261 23.124,22.184 23.496,22.183 L23.627,22.394 C23.640,22.388 23.654,22.381 23.668,22.375 L23.556,22.182 C23.661,22.184 23.767,22.196 23.873,22.211 L24.146,21.738 L24.308,21.831 L31.938,3.960 C29.661,3.161 27.215,2.721 24.665,2.721 ZM34.686,5.144 L26.822,22.983 C26.959,23.132 27.084,23.293 27.186,23.469 L27.216,23.469 L27.216,23.521 C27.267,23.613 27.310,23.711 27.351,23.809 L27.897,23.809 L27.897,23.996 L45.639,28.149 C45.888,27.635 46.180,27.145 46.505,26.681 C46.567,26.015 46.608,25.342 46.608,24.660 C46.608,16.154 41.764,8.785 34.686,5.144 ZM55.781,43.512 L55.781,49.000 L54.781,49.000 L54.781,43.501 C54.950,43.509 55.113,43.537 55.283,43.537 C55.452,43.537 55.615,43.520 55.781,43.512 ZM54.781,41.122 L54.781,34.234 C54.935,34.306 55.102,34.354 55.283,34.354 C55.463,34.354 55.629,34.308 55.781,34.237 L55.781,41.140 C55.672,41.144 55.564,41.156 55.454,41.156 C55.227,41.156 55.003,41.141 54.781,41.122 ZM54.093,33.163 C54.093,32.506 54.626,31.973 55.283,31.973 C55.941,31.973 56.474,32.506 56.474,33.163 C56.474,33.641 56.188,34.048 55.781,34.237 L55.781,33.344 L54.781,33.344 L54.781,34.234 C54.377,34.044 54.093,33.639 54.093,33.163 ZM60.219,50.000 L54.781,50.000 L54.781,49.687 L55.781,49.687 L55.781,49.000 L60.219,49.000 L60.219,50.000 ZM34.500,59.000 C33.672,59.000 33.000,58.328 33.000,57.500 L33.000,52.500 C33.000,51.672 33.672,51.000 34.500,51.000 C35.328,51.000 36.000,51.672 36.000,52.500 L36.000,57.500 C36.000,58.328 35.328,59.000 34.500,59.000 ZM36.000,66.500 C36.000,67.328 35.328,68.000 34.500,68.000 C33.672,68.000 33.000,67.328 33.000,66.500 L33.000,62.500 C33.000,61.671 33.672,61.000 34.500,61.000 C35.328,61.000 36.000,61.671 36.000,62.500 L36.000,66.500 ZM31.219,68.570 L34.498,72.091 L37.777,68.570 C38.515,67.779 39.711,67.779 40.449,68.570 C41.187,69.363 41.187,70.647 40.449,71.439 L35.834,76.393 C35.096,77.185 33.900,77.185 33.162,76.393 L28.547,71.439 C27.809,70.647 27.809,69.363 28.547,68.570 C29.285,67.779 30.481,67.779 31.219,68.570 Z"/>
                            </svg>
                            <svg class="svg2"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="66px" height="77px">
                                <path fill-rule="evenodd"  fill="rgb(81, 80, 80)"
                                      d="M55.781,43.512 L55.781,41.140 C60.137,40.967 63.619,37.391 63.619,32.993 C63.619,28.485 59.963,24.830 55.454,24.830 C50.944,24.830 47.289,28.485 47.289,32.993 C47.289,37.275 50.587,40.780 54.781,41.122 L54.781,43.501 C50.786,43.314 47.358,40.964 45.678,37.574 C41.336,44.620 33.550,49.320 24.665,49.320 C11.043,49.320 -0.000,38.279 -0.000,24.660 C-0.000,11.040 11.043,-0.000 24.665,-0.000 C38.041,-0.000 48.922,10.647 49.311,23.926 C51.018,22.779 53.072,22.109 55.283,22.109 C61.202,22.109 66.000,26.906 66.000,32.823 C66.000,38.572 61.467,43.250 55.781,43.512 ZM24.665,2.721 C12.546,2.721 2.722,12.543 2.722,24.660 C2.722,36.776 12.546,46.599 24.665,46.599 C33.523,46.599 41.148,41.347 44.613,33.792 C44.584,33.472 44.567,33.150 44.567,32.823 C44.567,32.106 44.639,31.407 44.773,30.729 L27.037,26.871 L26.619,26.871 C26.141,27.290 25.521,27.551 24.835,27.551 C23.332,27.551 22.113,26.333 22.113,24.830 C22.113,23.772 22.718,22.858 23.599,22.408 C23.293,22.261 23.124,22.184 23.496,22.183 L23.627,22.394 C23.640,22.388 23.654,22.381 23.668,22.375 L23.556,22.182 C23.661,22.184 23.767,22.196 23.873,22.211 L24.146,21.738 L24.308,21.831 L31.938,3.960 C29.661,3.161 27.215,2.721 24.665,2.721 ZM34.686,5.144 L26.822,22.983 C26.959,23.132 27.084,23.293 27.186,23.469 L27.216,23.469 L27.216,23.521 C27.267,23.613 27.310,23.711 27.351,23.809 L27.897,23.809 L27.897,23.996 L45.639,28.149 C45.888,27.635 46.180,27.145 46.505,26.681 C46.567,26.015 46.608,25.342 46.608,24.660 C46.608,16.154 41.764,8.785 34.686,5.144 ZM55.781,43.512 L55.781,49.000 L54.781,49.000 L54.781,43.501 C54.950,43.509 55.113,43.537 55.283,43.537 C55.452,43.537 55.615,43.520 55.781,43.512 ZM54.781,41.122 L54.781,34.234 C54.935,34.306 55.102,34.354 55.283,34.354 C55.463,34.354 55.629,34.308 55.781,34.237 L55.781,41.140 C55.672,41.144 55.564,41.156 55.454,41.156 C55.227,41.156 55.003,41.141 54.781,41.122 ZM54.093,33.163 C54.093,32.506 54.626,31.973 55.283,31.973 C55.941,31.973 56.474,32.506 56.474,33.163 C56.474,33.641 56.188,34.048 55.781,34.237 L55.781,33.344 L54.781,33.344 L54.781,34.234 C54.377,34.044 54.093,33.639 54.093,33.163 ZM60.219,50.000 L54.781,50.000 L54.781,49.687 L55.781,49.687 L55.781,49.000 L60.219,49.000 L60.219,50.000 ZM34.500,59.000 C33.672,59.000 33.000,58.328 33.000,57.500 L33.000,52.500 C33.000,51.672 33.672,51.000 34.500,51.000 C35.328,51.000 36.000,51.672 36.000,52.500 L36.000,57.500 C36.000,58.328 35.328,59.000 34.500,59.000 ZM36.000,66.500 C36.000,67.328 35.328,68.000 34.500,68.000 C33.672,68.000 33.000,67.328 33.000,66.500 L33.000,62.500 C33.000,61.671 33.672,61.000 34.500,61.000 C35.328,61.000 36.000,61.671 36.000,62.500 L36.000,66.500 ZM31.219,68.570 L34.498,72.091 L37.777,68.570 C38.515,67.779 39.711,67.779 40.449,68.570 C41.187,69.363 41.187,70.647 40.449,71.439 L35.834,76.393 C35.096,77.185 33.900,77.185 33.162,76.393 L28.547,71.439 C27.809,70.647 27.809,69.363 28.547,68.570 C29.285,67.779 30.481,67.779 31.219,68.570 Z"/>
                            </svg>
                        </div>
                    </div>
            </div>
        <?php } ?>
   </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;

}

add_shortcode('slider', 'my_slider_function');



function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js', array(), NULL, true);
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'lib-slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), NULL, true);
    wp_enqueue_script('lib-slick');
    wp_register_style('css-slick', get_stylesheet_directory_uri() . '/assets/css/slick.css');
    wp_enqueue_style( 'css-slick');
    wp_register_style('css-slick-theme', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css');
    wp_enqueue_style( 'css-slick-theme');
    wp_register_style('css-fontawesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css');
    wp_enqueue_style( 'css-fontawesome');
    wp_register_script( 'my-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery', 'lib-slick'), NULL, true);
    wp_enqueue_script( 'my-script' );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

register_nav_menus( array(
    'primary' => __( 'Primary Navigation', 'twentyseventeen' ),
    'secondary' => __('Secondary Navigation', 'twentyseventeen')
) );
add_filter('add_to_cart_fragments', __NAMESPACE__ . '\\woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <a class="cart-customlocation" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php

    $fragments['a.cart-customlocation'] = ob_get_clean();

    return $fragments;
}
?>
<?php	require('src/init.php');
    class WC_Gateway_Your_Gateway extends WC_Payment_Gateway
    {

        public function __construct()
        {
            $this->id = 'custom';
            $this->has_fields = true;
            $this->order_button_text = __('Proceed to custom', 'woocommerce');
            $this->method_title = __('CusTom', 'woocommerce');
            $this->method_description = sprintf(__('PayPal Standard sends customers to PayPal to enter their payment information. PayPal IPN requires fsockopen/cURL support to update order statuses after payment. Check the <a href="%s">system status</a> page for more details.', 'woocommerce'), admin_url('admin.php?page=wc-status'));
            $this->supports = array(
                'products',
                'refunds',
            );

            // Load the settings.
            $this->init_form_fields();
            $this->init_settings();
            $this->form_fields = array(
            'enabled' => array(
                'title' => __('Enable/Disable', 'woocommerce'),
                'type' => 'checkbox',
                'label' => __('Enable Cheque Payment', 'woocommerce'),
                'default' => 'yes'
            ),
            'title' => array(
                'title' => __('Title', 'woocommerce'),
                'type' => 'text',
                'description' => __('This controls the title which the user sees during checkout.', 'woocommerce'),
                'default' => __('Cheque Payment', 'woocommerce'),
                'desc_tip' => true,
            ),
            'description' => array(
                'title' => __('Customer Message', 'woocommerce'),
                'type' => 'textarea',
                'default' => ''
            ),
                'test_publishable_key' => array(
                    'title'       => __( 'Test Publishable Key', 'woocommerce' ),
                    'type'        => 'password',
                    'description' => __( 'Get your API keys from your stripe account.', 'woocommerce-gateway-stripe' ),
                    'default'     => '',
                    'desc_tip'    => true,
                ),
                'test_secret_key' => array(
                    'title'       => __( 'Test Secret Key', 'woocommerce' ),
                    'type'        => 'password',
                    'description' => __( 'Get your API keys from your stripe account.', 'woocommerce-gateway-stripe' ),
                    'default'     => '',
                    'desc_tip'    => true,
                ),
                'publishable_key' => array(
                    'title'       => __( 'Live Publishable Key', 'woocommerce' ),
                    'type'        => 'password',
                    'description' => __( 'Get your API keys from your stripe account.', 'woocommerce' ),
                    'default'     => '',
                    'desc_tip'    => true,
                ),
                'secret_key' => array(
                    'title'       => __( 'Live Secret Key', 'woocommerce' ),
                    'type'        => 'password',
                    'description' => __( 'Get your API keys from your stripe account.', 'woocommerce' ),
                    'default'     => '',
                    'desc_tip'    => true,
                )
        );
        // Define user set variables.
        $this->title = $this->get_option('title');
        $this->description = $this->get_option('description');
        $this->testmode = 'yes' === $this->get_option('testmode', 'no');
        $this->debug = 'yes' === $this->get_option('debug', 'no');
        $this->email = $this->get_option('email');
        $this->receiver_email = $this->get_option('receiver_email', $this->email);
        $this->identity_token = $this->get_option('identity_token');
        $this->test_piblishable_key = $this->get_option('test_publishable_key');

        add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
    }

         function process_payment( $order_id ) {
			    	$order = wc_get_order( $order_id );
			    	$stripe_token=$_POST['stripe_token'];
			    	$amount=$order->get_total()*100;
			    	\Stripe\Stripe::setApiKey("rk_test_Gkoz6igW0973J9TY97rMieGw");
			    	\Stripe\Charge::create(array(
					  "amount" => $amount,
					  "currency" => get_option('woocommerce_currency'),
					  "customer" => $stripe_token,
					  "description" => "Charge for purchasing pruducts"
					));
			        $order->update_status( 'processing', __( 'Payment complete through stripe', 'wc-gateway-offline' ) );
			        $order->reduce_order_stock();
			        WC()->cart->empty_cart();
			        return array(
				        'result'    => 'success',
				        'redirect'  => $this->get_return_url( $order )
				    );
				}
        function process_refund($order_id){
            $stripe_token=$_POST['stripe_token'];
        }



}
add_action( 'plugins_loaded', 'init_your_gateway_class' );

?>
