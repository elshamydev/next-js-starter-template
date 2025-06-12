<?php
// User activity logging for audit purposes

function qatar_tender_log_activity( $user_id, $action, $details = '' ) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'qatar_tender_activity_log';

    $wpdb->insert(
        $table_name,
        array(
            'user_id' => $user_id,
            'action' => $action,
            'details' => $details,
            'timestamp' => current_time( 'mysql' ),
        ),
        array(
            '%d',
            '%s',
            '%s',
            '%s',
        )
    );
}

// Create the activity log table on plugin activation
function qatar_tender_create_activity_log_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'qatar_tender_activity_log';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        user_id bigint(20) unsigned NOT NULL,
        action varchar(255) NOT NULL,
        details text,
        timestamp datetime NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'qatar_tender_create_activity_log_table' );
?>
