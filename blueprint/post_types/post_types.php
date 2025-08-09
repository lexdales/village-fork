<?php
#####################################################
##### BLUEPRINT - POST TYPES
#####################################################

add_action( 'init', 'blueprint_register_post_types' );

function blueprint_register_post_types() {
    global $blueprint_post_type_array;

    if ( empty( $blueprint_post_type_array ) || empty( $blueprint_post_type_array[0] ) ) {
        return;
    }

    foreach ( $blueprint_post_type_array as $post_type ) {

        $labels = array(
            'name'               => $post_type['post_type_plural_label_name'],
            'singular_name'      => $post_type['post_type_label_name'],
            'add_new'            => _x( 'Add New', 'slider' ),
            'add_new_item'       => 'Add A New ' . $post_type['post_type_label_name'],
            'edit_item'          => 'Edit ' . $post_type['post_type_label_name'],
            'new_item'           => 'New ' . $post_type['post_type_label_name'],
            'view_item'          => 'View ' . $post_type['post_type_label_name'],
            'search_items'       => 'Search ' . $post_type['post_type_plural_label_name'],
            'not_found'          => 'No ' . strtolower( $post_type['post_type_plural_label_name'] ) . ' found',
            'not_found_in_trash' => 'No ' . strtolower( $post_type['post_type_plural_label_name'] ) . ' found in Trash',
            'parent_item_colon'  => '',
            'menu_name'          => $post_type['post_type_plural_label_name'],
        );

        // Only set the meta box callback if it exists and is callable.
        $register_meta_box_cb = null;
        if ( ! empty( $post_type['meta_box_function'] ) && is_string( $post_type['meta_box_function'] ) && is_callable( $post_type['meta_box_function'] ) ) {
            $register_meta_box_cb = $post_type['meta_box_function'];
        }

        $args = array(
            'labels'              => $labels,
            'public'              => true,
            'show_ui'             => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'supports'            => isset( $post_type['supports_array'] ) ? (array) $post_type['supports_array'] : array( 'title', 'editor' ),
            'query_var'           => true,
            'rewrite'             => true,
            'menu_icon'           => isset( $post_type['post_type_icon'] ) ? $post_type['post_type_icon'] : null,
        );

        if ( $register_meta_box_cb ) {
            $args['register_meta_box_cb'] = $register_meta_box_cb;
        }

        register_post_type( $post_type['post_type_name'], $args );

        // Taxonomy (optional)
        if ( ! empty( $post_type['use_taxonomy'] ) ) {
            $g_labels = array(
                'name'                       => $post_type['taxonomy_plural_label_name'],
                'singular_name'              => $post_type['taxonomy_label_name'],
                'search_items'               => 'Search ' . $post_type['taxonomy_plural_label_name'],
                'popular_items'              => 'Popular ' . $post_type['taxonomy_plural_label_name'],
                'all_items'                  => 'All ' . $post_type['taxonomy_plural_label_name'],
                'parent_item'                => null,
                'parent_item_colon'          => null,
                'edit_item'                  => 'Edit ' . $post_type['taxonomy_label_name'],
                'update_item'                => 'Update ' . $post_type['taxonomy_label_name'],
                'add_new_item'               => 'Add New ' . $post_type['taxonomy_label_name'],
                'new_item_name'              => 'New ' . $post_type['taxonomy_label_name'] . ' Name',
                'separate_items_with_commas' => 'Separate ' . strtolower( $post_type['taxonomy_plural_label_name'] ) . ' with commas',
                'add_or_remove_items'        => 'Add or remove ' . strtolower( $post_type['taxonomy_plural_label_name'] ),
                'choose_from_most_used'      => 'Choose from the most used ' . strtolower( $post_type['taxonomy_plural_label_name'] ),
                'menu_name'                  => $post_type['taxonomy_plural_label_name'],
            );

            register_taxonomy(
                $post_type['taxonomy_name'],
                array( $post_type['post_type_name'] ),
                array(
                    'hierarchical'       => true,
                    'labels'             => $g_labels,
                    'query_var'          => true,
                    'rewrite'            => true,
                    'show_in_nav_menus'  => true,
                )
            );
        }
    }
}

/**
 * Important: do NOT flush rewrite rules on every request.
 * Flush once on theme switch/activation instead.
 */
add_action( 'after_switch_theme', function () {
    blueprint_register_post_types();
    flush_rewrite_rules();
} );