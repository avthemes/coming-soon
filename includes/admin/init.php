<?php

/**
 * Plugin initialization
 *
 * @return void
 */
function AV_CS_admin_init() {

    include( AV_CS_PLUGIN_PATH . 'includes/admin/enqueue.php' );

    add_action( 'admin_enqueue_scripts', 'AV_CS_admin_enqueue' );
    add_action( 'admin_post_AV_CS_save_options', 'AV_CS_save_options' );

    $AV_CS_options				= get_option( 'AV_CS_options' );

    if( isset( $AV_CS_options['maintenance_active']) && (int)$AV_CS_options['maintenance_active'] == 1 ) {
    
        add_action( 'admin_notices', 'AV_CS_admin_notices' );
    }
}

/**
 * Alert message when active
*/
function AV_CS_admin_notices() {
    
    $notice_type            = 'error';
    $is_dismissible         = false;
    $message                =  __( '<strong>Coming Soon / Maintenance mode</strong> is <strong>active</strong>!', 'av-coming-soon' ) . ' <a href="' . admin_url( '/admin.php?page=' . AV_CS_PLUGIN_SETTING_PAGE ) . '">' . __( 'Deactivate it, when you are ready to go live.', 'av-coming-soon' ) . '</a>';

    include( AV_CS_PLUGIN_PATH . 'includes/admin/tpl/admin_notice.php' );
}

if ( is_multisite() && is_plugin_active_for_network( plugin_basename( __FILE__ ) ) ) {

    add_action( 'network_admin_notices', 'AV_CS_admin_notices' );
    add_action( 'admin_notices', 'AV_CS_admin_notices' );
    add_filter( 'login_message',
    
        function() {
            
            return '<div id="login_error">' . __( '<strong>Coming Soon / Maintenance mode</strong> is <strong>active</strong>!', 'av-coming-soon' ) . '</div>';
        } 
    );
}