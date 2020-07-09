<?php
/**
 * Plugin activation
 *
 * @return void
 */
function AV_CS_activate_plugin() {

    if ( ! current_user_can( 'activate_plugins' ) ) {
    
        return;
    }

    $bg_img_path                            = AV_CS_PLUGIN_PATH . "assets/images/av-milky-way.jpg";
    $AV_CS_options				            = get_option( 'AV_CS_options' );

    if( ! $AV_CS_options ) {

        $opts                               = array(
            'maintenance_active'            => 0,
            'main_title'                    => __( 'Manage your online presence with ease', 'av-coming-soon' ),
            'sub_title'                     => __( 'Coming soon...', 'av-coming-soon' ),
            'paragraph'                     => __( 'We are currently working on the last features and will launch soon!', 'av-coming-soon' ),
            'show_launch_date'              => 1,
            'launch_date'                   => date( 'Y-m-d H:i:s', strtotime( "+5 days" ) ),
            'launch_date_text'              => __( 'We are launching on', 'av-coming-soon' ),
            'show_launch_counter'           => 1,
            'logo_id'      				    => 0,
            'bg_img_id'      		        => AV_CS_upload_media( $bg_img_path ),
            'bg_color'      		        => '#333333',
            'container_align'   			=> 'center',
            'container_width_lg'            => 6,
            'container_width_md'            => 10,
            'text_align'                    => 'left',
            'custom_css'   		            => '',
            '503_header'   		            => 0,
            'show_login'   		            => 1,
            'font_family'   	            => 'Rubik',
            'font_color'   	                => '#ffffff',
            'drop_shadow_color'   	        => '#000000',
            'bypass_code'                   => uniqid(),
            'show_plugin_url'               => 1,
            'ga_analytics'   	            => '',
            'uninstall_delete_settings'   	=> 0,
            'plugin_activated'              => 1,
            'activation_notice_shown'       => 1,
        );

        add_option( 'AV_CS_options', $opts );
    }

    AV_CS_plugin_status( 1 );
}

/**
 * Add settings link after plugin activation on plugin list page
 *
 * @param  Array $links
 * @return Array
 */
function AV_CS_plugin_settings_link( $links ) {
    
    $url = get_admin_url() . 'admin.php?page='.AV_CS_PLUGIN_SETTING_PAGE;
    
    $settings_link = '<a href="' . $url . '">' . __('Settings', 'av-coming-soon') . '</a>';
    
    array_unshift( $links, $settings_link );
    
    return $links;
}

/**
 * Displays an admin notice after plugin activation
 *
 * @return void
 */
function AV_CS_activation_admin_notices() {

    $AV_CS_options				= get_option( 'AV_CS_options' );

    if (  isset( $AV_CS_options['activation_notice_shown'] )
            && $AV_CS_options['activation_notice_shown'] == 1
            && is_plugin_active('av-coming-soon/index.php') 
        ) {

        $notice_type            = 'success';
        $is_dismissible         = true;
        $message                = sprintf( '%s <a href="' . admin_url( 'admin.php?page=' . AV_CS_PLUGIN_SETTING_PAGE ) . '">%s</a>', __( 'Thank you for installing & activating the <strong>AV Coming Soon</strong> plugin.', 'av-coming-soon' ), __( 'Go to settings &rsaquo;', 'av-coming-soon' ) );

        include( AV_CS_PLUGIN_PATH . 'includes/admin/tpl/admin_notice.php' );

        $AV_CS_options['activation_notice_shown'] = 2;

        update_option('AV_CS_options', $AV_CS_options);
    }
}

function AV_CS_upload_media( $file_path ) {

    $file_name              = basename( $file_path );
    $wordpress_upload_dir   = wp_upload_dir();
    $upload_file_path       = $wordpress_upload_dir['basedir'] . "/" . $file_name;
    $file_mime              = mime_content_type( $file_path );

    if( ! file_exists( $upload_file_path ) ) {

        if( copy( $file_path, $upload_file_path ) ) {

            $upload_id = wp_insert_attachment( 
                            array(
                                'guid'           => $upload_file_path, 
                                'post_mime_type' => $file_mime,
                                'post_title'     => preg_replace( '/\.[^.]+$/', '', $file_name ),
                                'post_content'   => '',
                                'post_status'    => 'inherit'
                            ), 
                            $upload_file_path 
                        );

            require_once( ABSPATH . 'wp-admin/includes/image.php' );
            wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $upload_file_path ) );

            return $upload_id;
        }
    }
    else {

        $attachment = avthemes_get_attachment_by_post_name( 'av-milky-way' );

        if ( $attachment ) {

            return $attachment->ID;
        }
    }

    return 0;
}