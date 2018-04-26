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
    $posts = get_post($attr['id']);
    ob_start();
    $post_image_url = wp_get_attachment_image_src($posts->ID);
        ?>
    <p><?php print_r($post_image_url) ?>/<?php echo $posts[0]->post_type; ?></p>
<?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;

}

add_shortcode('slider', 'my_slider_function');
function foobar_func( $atts ){
    return "foo and bar";
}
add_shortcode( 'foobar', 'foobar_func' );
