<?php
// Register custom post type for Proposals
function qatar_tender_register_proposal_post_type() {
    $labels = array(
        'name'               => _x( 'Proposals', 'post type general name', 'qatar-tender-core' ),
        'singular_name'      => _x( 'Proposal', 'post type singular name', 'qatar-tender-core' ),
        'menu_name'          => _x( 'Proposals', 'admin menu', 'qatar-tender-core' ),
        'name_admin_bar'     => _x( 'Proposal', 'add new on admin bar', 'qatar-tender-core' ),
        'add_new'            => _x( 'Add New', 'proposal', 'qatar-tender-core' ),
        'add_new_item'       => __( 'Add New Proposal', 'qatar-tender-core' ),
        'new_item'           => __( 'New Proposal', 'qatar-tender-core' ),
        'edit_item'          => __( 'Edit Proposal', 'qatar-tender-core' ),
        'view_item'          => __( 'View Proposal', 'qatar-tender-core' ),
        'all_items'          => __( 'All Proposals', 'qatar-tender-core' ),
        'search_items'       => __( 'Search Proposals', 'qatar-tender-core' ),
        'parent_item_colon'  => __( 'Parent Proposals:', 'qatar-tender-core' ),
        'not_found'          => __( 'No proposals found.', 'qatar-tender-core' ),
        'not_found_in_trash' => __( 'No proposals found in Trash.', 'qatar-tender-core' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'proposal' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'author', 'custom-fields' ),
        'capabilities'       => array(
            'edit_post'          => 'edit_proposal',
            'read_post'          => 'read_proposal',
            'delete_post'        => 'delete_proposal',
            'edit_posts'         => 'edit_proposals',
            'edit_others_posts'  => 'edit_others_proposals',
            'publish_posts'      => 'publish_proposals',
            'read_private_posts' => 'read_private_proposals',
        ),
        'map_meta_cap'       => true,
    );

    register_post_type( 'proposal', $args );
}
add_action( 'init', 'qatar_tender_register_proposal_post_type' );
?>
