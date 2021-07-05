<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 21/08/2015
 * Time: 9:45 SA
 */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles', 20 );

function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'custom_js_ajax', get_stylesheet_directory_uri() . '/js/ajax.js', array(), '1.0.0', true );
}

add_action( 'wp_ajax_nopriv_get_booking', 'get_booking' );
add_action( 'wp_ajax_get_booking', 'get_booking' );

function get_booking() {
echo  "test";
global $woocommerce;
$id = $_POST['id'];
$hotel_address = get_post_meta( $id, 'address', true );
$hotel_price = get_post_meta( $id, 'price_avg', true );

$hotel_name = get_the_title( $id );
//Create Final Hotel as Wocommece Product
// First we create the product post so we can grab it's ID
		$post_id = wp_insert_post(
			array(
				'post_title' => 'Product ' . $hotel_name,
				'post_type' => 'product',
				'post_status' => 'publish'
			)
		);

		// Then we use the product ID to set all the posts meta
		wp_set_object_terms( $post_id, 'simple', 'product_type' ); // set product is simple/variable/grouped
		update_post_meta( $post_id, '_visibility', 'visible' );
		update_post_meta( $post_id, '_stock_status', 'instock');
		update_post_meta( $post_id, 'total_sales', '0' );
		update_post_meta( $post_id, '_downloadable', 'no' );
		update_post_meta( $post_id, '_virtual', 'yes' );
		update_post_meta( $post_id, '_regular_price', '' );
		update_post_meta( $post_id, '_sale_price', '' );
		update_post_meta( $post_id, '_purchase_note', '' );
		update_post_meta( $post_id, '_featured', 'no' );
		//update_post_meta( $post_id, '_weight', '11' );
		//update_post_meta( $post_id, '_length', '11' );
		//update_post_meta( $post_id, '_width', '11' );
		//update_post_meta( $post_id, '_height', '11' );
		update_post_meta( $post_id, '_sku', 'SKU11' );
		update_post_meta( $post_id, '_product_attributes', array() );
		//update_post_meta( $post_id, '_sale_price_dates_from', '' );
		//update_post_meta( $post_id, '_sale_price_dates_to', '' );
		update_post_meta( $post_id, '_price', $hotel_price );
		update_post_meta( $post_id, '_sold_individually', '' );
		//update_post_meta( $post_id, '_manage_stock', 'yes' ); // activate stock management
		//wc_update_product_stock($post_id, 1000, 'set'); // set 1000 in stock
		update_post_meta( $post_id, '_backorders', 'no' );
		
		//Add product dyanamically in cart
		$woocommerce->cart->add_to_cart( $post_id ); // you can pass a number here

wp_die();  //die();
}