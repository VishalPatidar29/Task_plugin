<?php
/*

* Plugin Name: Task Plugin

* Description:The Task Plugin is for Demo Purpose.

* Version: 1.0.0

* Author: Zehntech Technologies Pvt. Ltd.

* Author URI: https://www.zehntech.com/

* License: GPL2

* License URI: https://www.gnu.org/licenses/gpl-2.0.html

* Text Domain: smart-agreements


*/

defined( 'ABSPATH' ) || exit;

// this tag for add the style link in Top
$path_style = plugins_url('css/style.css', __FILE__);
$ver_style = filemtime(plugin_dir_path(__FILE__).'css/style.css');
wp_enqueue_style('my-custom-style', $path_style, '' , $ver_style);


function create_product_page() {
    $page_title = 'Product';
    $page_content = '[products_page]';
    $page_check = get_page_by_title( $page_title );

    if ( ! $page_check ) {
        $page = array(
            'post_type'    => 'page',
            'post_title'   => $page_title,
            'post_name'    => 'product-item', 
            'post_content' => $page_content,
            'post_status'  => 'publish',
            'post_author'  => 1,
        );

        wp_insert_post( $page );
    }
}
register_activation_hook( __FILE__, 'create_product_page' );


// for create the custom post type
include( plugin_dir_path( __FILE__ ) . 'post.php');
// include 'post.php';

// for create the meta filed price
include( plugin_dir_path( __FILE__ ) . 'meta.php');
// include 'meta.php';



 // This function for print the post 

 function my_posts(){

     $args = array(
        'post_type' => 'product'
    );
  $query = new WP_Query($args);

if($query->have_posts()){
  ob_start();
 echo  '<div class="product-container">';
    
    while ($query->have_posts()) {
        $query->the_post(); // Set up the post data

        $id = get_the_ID(); // Get the post ID after setting up the post data
        $price = get_post_meta($id, '_custom_product_price', true);
       
        ?>

       
        <!-- Repeat the following product divs to display more products -->
        <div class="product">
        <?php echo the_post_thumbnail(); ?> 
          <h5><?php echo get_the_title(); ?></h5>
          <p>₹<?php echo $price; ?></p>
          <a href="<?php the_permalink(); ?>"><button type="button" class="btn">Read More</button></a>
          <!-- <button>Read More</button> -->
        
        </div>
        <!-- Repeat the above product div for a total of 6 products in one row -->
    
    <?php
      
    }
     echo '</div>';
    

 }
wp_reset_postdata();

$html = ob_get_clean();

 return $html;
 }
 add_shortcode('products_page', 'my_posts');

