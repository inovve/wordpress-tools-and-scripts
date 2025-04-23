<?php
require_once('wp-load.php'); // Adjust the path if necessary

// Ensure this script is not accessible directly via URL in a production environment
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Increase PHP limits if needed (use with caution)
// set_time_limit(0);
// ini_set('memory_limit', '512M');

// Get all published WooCommerce products
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1, // Get all products
    'post_status'    => 'publish',
    'fields'         => 'ids', // Get only post IDs for better performance
);

$product_ids = get_posts( $args );

if ( $product_ids ) {
    echo "Starting slug regeneration for " . count( $product_ids ) . " products.<br/>";

    foreach ( $product_ids as $product_id ) {
        $product = wc_get_product( $product_id );

        if ( $product ) {
            $product_name = $product->get_name();
            $current_slug = $product->get_slug();

            // Generate a new slug from the product name
            $new_slug = sanitize_title( $product_name );

            // Ensure the new slug is unique
            $new_slug = wp_unique_post_slug( $new_slug, $product_id, 'publish', 'product', 0 );

            // Update the product slug if it's different from the current one
            if ( $current_slug !== $new_slug ) {
                $product->set_slug( $new_slug );
                $product->save();
                echo "Updated slug for product ID " . $product_id . " ('" . esc_html( $product_name ) . "') to '" . esc_html( $new_slug ) . "'<br/>";
            } else {
                echo "Slug for product ID " . $product_id . " ('" . esc_html( $product_name ) . "') is already correct ('" . esc_html( $current_slug ) . "').<br/>";
            }
        }
    }

    echo "Slug regeneration process completed.<br/>";

    // After updating slugs, it's recommended to flush permalinks
    flush_rewrite_rules();
    echo "Permalink rules flushed.<br/>";

} else {
    echo "No published products found.<br/>";
}
?>
