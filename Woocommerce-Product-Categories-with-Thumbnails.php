<?php

//Use shortcode: [show-product-categories-with-image]

function showProductCat() {

//Define category arguments
$cat_args = array(
'orderby' => 'name',
'order' => 'asc',
'hide_empty' => true,
);

//Load categories using query
$product_categories = get_terms( 'product_cat', $cat_args );

$result = "<div class='product-categories-with-image'>";

if( !empty($product_categories) ){

//Print each returned item
foreach ($product_categories as $key => $category) {

$thumb_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
$term_img = D0d_get_attachment_image_src( $thumb_id, 'thumbnail', true );

$cat_img = "";

if ($term_img[3]) {
$cat_img = "<img src='". $term_img[0] ."' width='" . $term_img[1] . "' height='" . $term_img[2] . "' />";
}

$result = $result . '<a href="'.get_term_link($category).'" >'
. $cat_img
. $category->name
. '</a><br/>';
}

}

$result = $result . "</div>";

return $result;
}
add_shortcode('show-product-categories-with-image', 'showProductCat');

?>