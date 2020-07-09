<?php

/**
 * Deactivates the plugin
 *
 * @return void
 */
function AV_CS_deactivate_plugin() {

    if ( ! current_user_can( 'activate_plugins' ) ) {
    
        return;
    }

    $AV_CS_options									= get_option( 'AV_CS_options' );

    $AV_CS_options['maintenance_active'] 			= 0;
    $AV_CS_options['plugin_activated'] 				= 1;
    $AV_CS_options['activation_notice_shown'] 		= 1;

    update_option('AV_CS_options', $AV_CS_options);

    AV_CS_plugin_status( 2 );
}