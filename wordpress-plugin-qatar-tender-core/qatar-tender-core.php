<?php
/*
Plugin Name: Qatar Tender Core
Plugin URI: https://example.com/qatar-tender-core
Description: Core plugin for Qatar-based Projects and Tender Management Platform. Handles user roles, tenders, proposals, notifications, and REST API.
Version: 1.0
Author: Your Name
Author URI: https://example.com
Text Domain: qatar-tender-core
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants
define( 'QATAR_TENDER_CORE_PATH', plugin_dir_path( __FILE__ ) );
define( 'QATAR_TENDER_CORE_URL', plugin_dir_url( __FILE__ ) );

// Include required files
require_once QATAR_TENDER_CORE_PATH . 'includes/user-roles.php';
require_once QATAR_TENDER_CORE_PATH . 'includes/tenders.php';
require_once QATAR_TENDER_CORE_PATH . 'includes/proposals.php';
require_once QATAR_TENDER_CORE_PATH . 'includes/notifications.php';
require_once QATAR_TENDER_CORE_PATH . 'includes/activity-logging.php';
require_once QATAR_TENDER_CORE_PATH . 'includes/rest-api.php';

// Activation hook
function qatar_tender_core_activate() {
    qatar_tender_register_user_roles();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'qatar_tender_core_activate' );

// Deactivation hook
function qatar_tender_core_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'qatar_tender_core_deactivate' );

// Initialize plugin
function qatar_tender_core_init() {
    qatar_tender_register_user_roles();
}
add_action( 'init', 'qatar_tender_core_init' );
?>
