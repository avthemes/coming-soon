<?php

/**
 * Uninstall plugin callback
 *
 * @return void
 */
function AV_CS_uninstall_pugin() {

    if ( ! current_user_can( 'activate_plugins' ) ) {
    
        return;
    }
    
    $AV_CS_options				= get_option( 'AV_CS_options' );

    if( isset( $AV_CS_options['uninstall_delete_settings'] ) && (int)$AV_CS_options['uninstall_delete_settings'] === 1 ) {

        delete_option( 'AV_CS_options' );
    }

    AV_CS_plugin_status( 3 );
}