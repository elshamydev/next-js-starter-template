<?php
// Custom REST API endpoints for Flutter mobile app integration

add_action( 'rest_api_init', function () {
    // Endpoint to get tenders
    register_rest_route( 'qatar-tender/v1', '/tenders', array(
        'methods' => 'GET',
        'callback' => 'qatar_tender_get_tenders',
        'permission_callback' => '__return_true',
    ) );

    // Endpoint to submit proposal
    register_rest_route( 'qatar-tender/v1', '/proposals', array(
        'methods' => 'POST',
        'callback' => 'qatar_tender_submit_proposal',
        'permission_callback' => 'is_user_logged_in',
    ) );
} );

function qatar_tender_get_tenders( $request ) {
    $args = array(
        'post_type' => 'tender',
        'post_status' => 'publish',
        'numberposts' => -1,
    );
    $tenders = get_posts( $args );
    $data = array();

    foreach ( $tenders as $tender ) {
        $data[] = array(
            'id' => $tender->ID,
            'title' => $tender->post_title,
            'content' => $tender->post_content,
            'author' => get_the_author_meta( 'display_name', $tender->post_author ),
            'date' => $tender->post_date,
        );
    }
    return rest_ensure_response( $data );
}

function qatar_tender_submit_proposal( $request ) {
    $user_id = get_current_user_id();
    if ( ! $user_id ) {
        return new WP_Error( 'rest_forbidden', esc_html__( 'You cannot submit proposals.', 'qatar-tender-core' ), array( 'status' => 401 ) );
    }

    $params = $request->get_json_params();

    $postarr = array(
        'post_title'   => sanitize_text_field( $params['title'] ),
        'post_content' => sanitize_textarea_field( $params['content'] ),
        'post_type'    => 'proposal',
        'post_status'  => 'pending',
        'post_author'  => $user_id,
    );

    $post_id = wp_insert_post( $postarr );

    if ( is_wp_error( $post_id ) ) {
        return $post_id;
    }

    // Save custom fields if any
    if ( ! empty( $params['tender_id'] ) ) {
        update_post_meta( $post_id, 'tender_id', intval( $params['tender_id'] ) );
    }

    return rest_ensure_response( array( 'success' => true, 'proposal_id' => $post_id ) );
}
?>
