<?php

/**
 * WP-ADMIN enqueue scripts
 *
 * @return void
 */
function AV_CS_admin_enqueue() {

	if( isset( $_GET['page'] ) 
		&& in_array( trim($_GET['page']), array( 
			'AV_themes_plugin_options',
			AV_CS_PLUGIN_SETTING_PAGE 
			) 
		) ) {

		wp_register_style( 'av_cs_css', plugins_url( '/assets/css/style.css', AV_CS_PLUGIN_URL ) );
		wp_register_style( 'av_cs_datetime_picker', plugins_url( '/assets/css/jquery.datetimepicker.min.css', AV_CS_PLUGIN_URL ) );
		wp_register_style( 'av_cs_font_select', plugins_url( '/assets/css/jquery.fontselect.min.css', AV_CS_PLUGIN_URL ) );
		wp_enqueue_style( 'av_cs_css' );
		wp_enqueue_style( 'wp-color-picker' ); 
		wp_enqueue_media();
		wp_enqueue_style( 'av_cs_datetime_picker' ); 
		wp_enqueue_style( 'av_cs_font_select' ); 

		wp_enqueue_script( 'av_cs_datetime_picker', plugins_url( '/assets/js/jquery.datetimepicker.full.min.js', AV_CS_PLUGIN_URL ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'av_cs_font_select', plugins_url( '/assets/js/jquery.fontselect.min.js', AV_CS_PLUGIN_URL ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'av_cs_main_js', plugins_url( '/assets/js/admin.js', AV_CS_PLUGIN_URL ), array( 'wp-color-picker' ), false, true );
	}
}