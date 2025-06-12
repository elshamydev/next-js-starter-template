<?php
// Register custom user roles for the platform
function qatar_tender_register_user_roles() {
    add_role(
        'client',
        __( 'Client', 'qatar-tender-core' ),
        array(
            'read' => true,
            'edit_posts' => false,
            'delete_posts' => false,
            'publish_tenders' => true,
            'manage_own_tenders' => true,
        )
    );

    add_role(
        'contractor',
        __( 'Contractor', 'qatar-tender-core' ),
        array(
            'read' => true,
            'submit_proposals' => true,
            'view_tenders' => true,
        )
    );

    add_role(
        'consultant',
        __( 'Consultant', 'qatar-tender-core' ),
        array(
            'read' => true,
            'submit_proposals' => true,
            'view_tenders' => true,
        )
    );

    // Admin role exists by default with all capabilities
}
?>
