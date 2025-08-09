<?php

function has_taxonomy_terms ($taxonomy) {

global $post;

$terms = wp_get_object_terms($post->ID, $taxonomy);
$terms_total = count($terms);

if ($terms_total > 0) return true;

return false;

}

function the_taxonomy ($taxonomy) {

global $post;

if ( empty($terms) )
$terms = wp_get_object_terms($post->ID, $taxonomy);
$terms_total = count($terms);
$terms_counter = 0;
                
foreach ( $terms as $term ) {
$term_output .= '<a href="';
$term_output .= get_term_link($term, $taxonomy);
$term_output .= '">';
$term_output .= "$term->name";  
$term_output .= '</a>';

$terms_counter++;
($terms_counter != $terms_total) ? $term_output .= " " : $term_output .= "";       
}

echo $term_output;

}

function new_excerpt_length($length) {
	return 200;
}

add_filter('excerpt_length', 'new_excerpt_length');

function is_firefox() {
	$agent = '';
	if (!empty($HTTP_USER_AGENT))
		$agent = $HTTP_USER_AGENT;
	if (empty($agent) && !empty($_SERVER["HTTP_USER_AGENT"]))
		$agent = $_SERVER["HTTP_USER_AGENT"];
	if (!empty($agent) && preg_match("/firefox/si", $agent))
		return true;
	return false;
}

?>