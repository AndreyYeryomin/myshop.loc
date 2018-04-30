<?php
/**
 * Created by PhpStorm.
 * User: devit31
 * Date: 26.04.18
 * Time: 14:13
 */

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
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', array(), NULL, true);
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
?>
