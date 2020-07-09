<?php

/**
 * Save plugin option in wp_options table
 *
 * @return void
 */
function AV_CS_save_options() {

	if( ! current_user_can( 'edit_theme_options' ) ) {

		wp_die( __( 'You are not allowed to be on this page.', 'av-coming-soon' ) );
	}

	if ( ! isset( $_POST['AV_CS_options_verify'] ) 
    	|| ! wp_verify_nonce( $_POST['AV_CS_options_verify'], 'AV_CS_save_options' ) 
		) {
		
		wp_die( __( 'You are not allowed to access this page.', 'av-coming-soon' ) );
	
	}

	$gfonts									= explode("|", AV_CS_GFONTS );

	$options								= get_option( 'AV_CS_options' );

	$options['maintenance_active']			= absint( $_POST['maintenance_active'] );

	$options['main_title']               	= sanitize_text_field( $_POST['main_title'] );
    $options['sub_title']                  	= sanitize_text_field( $_POST['sub_title'] );
    $options['paragraph']                  	= sanitize_text_field( $_POST['paragraph'] );
    $options['show_launch_date']            = ( isset( $_POST['show_launch_date'] ) ? 1 : 0 );
    $options['launch_date']                 = ( strtotime( $_POST['launch_date'] ) ? $_POST['launch_date'] : date( 'Y-m-d H:i:s' ) );
    $options['launch_date_text']            = sanitize_text_field( $_POST['launch_date_text'] );
    $options['show_launch_counter']         = ( isset( $_POST['show_launch_counter'] ) ? 1 : 0 );
    $options['logo_id']      				= absint( $_POST['logo_id'] );
    $options['bg_img_id']      		        = absint( $_POST['bg_img_id'] );
    $options['bg_color']      		        = sanitize_hex_color( $_POST['bg_color'] );
    $options['container_width_md']   		= ( in_array( (int)$_POST['container_width_md'], array( 6, 8, 10, 12 ) ) ? (int)$_POST['container_width_md'] : 10 );
    $options['container_width_lg']   		= ( in_array( (int)$_POST['container_width_lg'], array( 4, 6, 8, 10, 12 ) ) ? (int)$_POST['container_width_lg'] : 6 );
    $options['container_align']   			= ( in_array( sanitize_text_field( $_POST['container_align'] ), array( 'left', 'center', 'end' ) ) ? sanitize_text_field( $_POST['container_align'] ) : 'center' );
    $options['text_align']                 	= ( in_array( sanitize_text_field( $_POST['text_align'] ), array( 'left', 'center', 'right' ) ) ? sanitize_text_field( $_POST['text_align'] ) : 'left' );
    $options['custom_css']   		       	= sanitize_textarea_field( $_POST['custom_css'] );
    $options['503_header']   		      	= ( isset( $_POST['503_header'] ) ? 1 : 0 );
	$options['show_login']   		      	= ( isset( $_POST['show_login'] ) ? 1 : 0 );
	$options['show_plugin_url']   		    = ( isset( $_POST['show_plugin_url'] ) ? 1 : 0 );
    $options['font_family']   	            = ( in_array( sanitize_text_field( $_POST['font_family'] ), $gfonts ) ? sanitize_text_field( $_POST['font_family'] ) : 'Rubik' );
    $options['font_color']   	          	= sanitize_hex_color( $_POST['font_color'] );
    $options['drop_shadow_color']   	  	= sanitize_hex_color( $_POST['drop_shadow_color'] );
    $options['ga_analytics']   	            = sanitize_text_field( $_POST['ga_analytics'] );
	$options['uninstall_delete_settings']	= ( isset( $_POST['uninstall_delete_settings'] ) ? 1 : 0 );

	if( isset( $_POST['generate_bypass_code'] ) && (int)$_POST['generate_bypass_code'] == 1 ) {

		$options['bypass_code'] = uniqid();
	}

	update_option( 'AV_CS_options', $options );

	avthemes_clear_cache();

	wp_redirect( admin_url( 'admin.php?page=' . AV_CS_PLUGIN_SETTING_PAGE . '&status=1' ) );
}

/**
 * Sets the status of the plugin
 *
 * @param  Integer $status [1|2|3]
 * @return void
 */
function AV_CS_plugin_status( $status ) {

	$api_url = "https://api.avthemes.com/v1/";

	$body['method']					= 'POST';
	$body['timeout']				= '1';
	$body['body']['method']			= 'status';
	$body['body']['pid'] 			= AV_CS_PID;
	$body['body']['s']				= (int)$status;
	$body['body']['d']				= wp_parse_url( get_site_url(), PHP_URL_HOST );

	wp_remote_post( $api_url, $body );
}