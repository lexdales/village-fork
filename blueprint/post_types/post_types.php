<?php 

#####################################################
##### BLUEPRINT - POST TYPES
#####################################################

add_action("init", "blueprint_register_post_types");

function blueprint_register_post_types () {

global $blueprint_post_type_array;

if ($blueprint_post_type_array[0]) :

foreach ($blueprint_post_type_array as $post_type_count => $post_type) :

$labels = array(

    'name' => __($post_type["post_type_plural_label_name"], 'post type general name'),
    'singular_name' => __($post_type["post_type_label_name"], 'post type singular name'),
    'add_new' => _x('Add New', 'slider'),
    'add_new_item' => __('Add A New ' . $post_type["post_type_label_name"] . ''),
    'edit_item' => __('Edit ' . $post_type["post_type_label_name"] . ''),
    'new_item' => __('New ' . $post_type["post_type_label_name"] . ''),
    'view_item' => __('View ' . $post_type["post_type_label_name"] . ''),
    'search_items' => __('Search ' . $post_type["post_type_plural_label_name"] . ''),
    'not_found' =>  __('No ' . strtolower($post_type["post_type_plural_label_name"]) . ' found'),
    'not_found_in_trash' => __('No ' . strtolower($post_type["post_type_plural_label_name"]) . ' found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => '' . $post_type["post_type_plural_label_name"] . ''

);

$args = array (
'labels' => $labels,
'public' => true,
'show_ui' => true,
'publicly_queryable' => true,
'capability_type' => 'post',
'supports' => $post_type["supports_array"],
'register_meta_box_cb' => $post_type['meta_box_function'],
'query_var' => true,
'rewrite' => true,
'menu_icon' => $post_type['post_type_icon']
);

register_post_type($post_type['post_type_name'], $args);

flush_rewrite_rules();

$g_labels = array(
    'name' => __( '' . $post_type["taxonomy_plural_label_name"] . '', 'taxonomy general name' ),
    'singular_name' => __( '' . $post_type["taxonomy_label_name"] . '', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search ' . $post_type["taxonomy_plural_label_name"] . '' ),
    'popular_items' => __( 'Popular ' . $post_type["taxonomy_plural_label_name"] . '' ),
    'all_items' => __( 'All ' . $post_type["taxonomy_plural_label_name"] . '' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit ' . $post_type["taxonomy_label_name"] . '' ), 
    'update_item' => __( 'Update ' . $post_type["taxonomy_label_name"] . '' ),
    'add_new_item' => __( 'Add New ' . $post_type["taxonomy_label_name"] . '' ),
    'new_item_name' => __( 'New ' . $post_type["taxonomy_label_name"] . ' Name' ),
    'separate_items_with_commas' => __( 'Separate ' . strtolower($post_type["taxonomy_plural_label_name"]) . ' with commas' ),
    'add_or_remove_items' => __( 'Add or remove ' . strtolower($post_type["taxonomy_plural_label_name"]) . '' ),
    'choose_from_most_used' => __( 'Choose from the most used ' . strtolower($post_type["taxonomy_plural_label_name"]) . '' ),
    'menu_name' => __( '' . $post_type["taxonomy_plural_label_name"] . '' ),
);

if ($post_type['use_taxonomy'] == true) {
   
register_taxonomy($post_type['taxonomy_name'], array($post_type['post_type_name']), array("hierarchical" => true, "label" => "Sliders", "singular_label" => "Slider Category", "labels" => $g_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));

flush_rewrite_rules();

}

endforeach;

endif;

}

?>