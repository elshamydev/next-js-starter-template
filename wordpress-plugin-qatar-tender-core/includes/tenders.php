<?php
// Register custom post type for Tenders
function qatar_tender_register_tender_post_type() {
    $labels = array(
        'name'               => _x( 'Tenders', 'post type general name', 'qatar-tender-core' ),
        'singular_name'      => _x( 'Tender', 'post type singular name', 'qatar-tender-core' ),
        'menu_name'          => _x( 'Tenders', 'admin menu', 'qatar-tender-core' ),
        'name_admin_bar'     => _x( 'Tender', 'add new on admin bar', 'qatar-tender-core' ),
        'add_new'            => _x( 'Add New', 'tender', 'qatar-tender-core' ),
        'add_new_item'       => __( 'Add New Tender', 'qatar-tender-core' ),
        'new_item'           => __( 'New Tender', 'qatar-tender-core' ),
        'edit_item'          => __( 'Edit Tender', 'qatar-tender-core' ),
        'view_item'          => __( 'View Tender', 'qatar-tender-core' ),
        'all_items'          => __( 'All Tenders', 'qatar-tender-core' ),
        'search_items'       => __( 'Search Tenders', 'qatar-tender-core' ),
        'parent_item_colon'  => __( 'Parent Tenders:', 'qatar-tender-core' ),
        'not_found'          => __( 'No tenders found.', 'qatar-tender-core' ),
        'not_found_in_trash' => __( 'No tenders found in Trash.', 'qatar-tender-core' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'tender' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),
        'capabilities'       => array(
            'edit_post'          => 'edit_tender',
            'read_post'          => 'read_tender',
            'delete_post'        => 'delete_tender',
            'edit_posts'         => 'edit_tenders',
            'edit_others_posts'  => 'edit_others_tenders',
            'publish_posts'      => 'publish_tenders',
            'read_private_posts' => 'read_private_tenders',
        ),
        'map_meta_cap'       => true,
    );

    register_post_type( 'tender', $args );
}
add_action( 'init', 'qatar_tender_register_tender_post_type' );
?>
