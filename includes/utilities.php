<?php
/**
 * AV Plugin utility functions
 */

 if( ! function_exists( 'avthemes_clear_cache' ) ) {
	 
	function avthemes_clear_cache()  {

		// Clear Cachify Cache
		if ( has_action('cachify_flush_cache') ) {
		
			do_action('cachify_flush_cache');
		}

		// Clear Super Cache
		if ( function_exists( 'wp_cache_clear_cache' ) ) {
		
			ob_end_clean();
			wp_cache_clear_cache();
		}

		// Clear W3 Total Cache
		if ( function_exists( 'w3tc_pgcache_flush' ) ) {
			
			ob_end_clean();
			w3tc_pgcache_flush();
		}

		// Clear WP-Rocket Cache
		if ( function_exists( 'rocket_clean_domain' ) ) {
			
			rocket_clean_domain();
		}

		// Clear WP Fastest Cache
		if ( isset($GLOBALS['wp_fastest_cache']) && method_exists($GLOBALS['wp_fastest_cache'], 'deleteCache') ) {
			
			$GLOBALS['wp_fastest_cache']->deleteCache();
		}
	}
}

if( ! function_exists( 'avthemes_get_plugins' ) ) {
	
	/**
	 * Get all plugins by AV Themes and activation status
	 *
	 * @return Array	Returns an array of plugins
	 */
	function avthemes_get_plugins() {

		$all_plugins 			= get_plugins();
		$av_plugins				= array();

		foreach( $all_plugins as $pg_index => $pg ) {

			if( in_array( $pg['Author'], array( 'AV Themes' ) ) ) {

				if( is_plugin_active( $pg_index ) ) {
					
					$pg['isActive'] = 2;
				}
				else {

					$pg['isActive'] = 1;
				}

				$av_plugins[$pg_index] = $pg;
			}
		}

		return $av_plugins;
	}
}

if( ! function_exists( 'avthemes_set_value' ) ) {
	
	/**
	 * Sets form value
	 *
	 * @param  String $field_name	Name of the field
	 * @param  String $default		Default value
	 * @return String
	 */
	function avthemes_set_value( $field_name, $default = false ) {

		if( isset( $_POST[ $field_name ] ) ) {

			return avthemes_html_escape( $_POST[ $field_name ],  ENT_QUOTES);
		}
		else {

			return $default;
		}
	}
}

if( ! function_exists( 'avthemes_set_checkbox' ) ) {
		
	/**
	 * Set form checkbox checked or not
	 *
	 * @param  String $field_name		Name of the field
	 * @param  Mixed $value				Value of checkbox field [int|string]
	 * @param  Mixed $default			Default value [int|string]
	 * @return String
	 */
	function avthemes_set_checkbox( $field_name, $value, $default = false ) {
		
		if( isset( $_POST[ $field_name ] ) && $_POST[ $field_name ] == $value ) {

			return ' checked="checked" ';
		}
		else if( $default ) {

			return ' checked="checked" ';
		}
		else {

			return '';
		}
	}
}

if( ! function_exists( 'avthemes_set_radio' ) ) {
		
	/**
	 * Set form radio checked or not
	 *
	 * @param  String $field_name		Name of the field
	 * @param  Mixed $value				Value of radio field [int|string]
	 * @param  Mixed $default			Default value [int|string]
	 * @return String
	 */
	function avthemes_set_radio( $field_name, $value, $default = false ) {

		if( isset( $_POST[ $field_name ] ) && $_POST[ $field_name ] == $value ) {

			return ' checked="checked" ';
		}
		else if( $default ) {

			return ' checked="checked" ';
		}
		else {

			return '';
		}
	}
}

if( ! function_exists( 'avthemes_set_select' ) ) {
		
	/**
	 * Sets form selected option
	 *
	 * @param  String $field_name		Name of the field
	 * @param  Mixed $value				Value of select field [int|string]
	 * @param  Mixed $default			Default value [int|string]
	 * @return String
	 */
	function avthemes_set_select( $field_name, $value, $default = false ) {

		if( isset( $_POST[ $field_name ] ) && $_POST[ $field_name ] == $value ) {

			return ' selected="selected" ';
		}
		else if( $default ) {

			return ' selected="selected" ';
		}
		else {

			return '';
		}
	}
}

if( ! function_exists( 'avthemes_html_escape' ) ) {
	
	/**
	 * Sanitizes a string
	 *
	 * @param  String $string		String to sanitize
	 * @return String
	 */
	function avthemes_html_escape( $string ) {
	
		return htmlspecialchars( $string,  ENT_QUOTES );
	}
}

if( ! ( function_exists( 'avthemes_get_attachment_by_post_name' ) ) ) {
	
	function avthemes_get_attachment_by_post_name( $post_name ) {
		
		$args           = array(
                'posts_per_page' => 1,
                'post_type'      => 'attachment',
                'name'           => trim( $post_name ),
        );

        $get_attachment = new WP_Query( $args );

    	if ( ! $get_attachment || ! isset( $get_attachment->posts, $get_attachment->posts[0] ) ) {
				
			return false;
        }

        return $get_attachment->posts[0];
    }
}