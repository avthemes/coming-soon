<?php
/**
 * Plugin options page template
 */
?>
<div class="container-fluid mt-3" id="container">

	<?php if( isset( $_GET['status'] ) && $_GET['status'] == 1 ) { ?> 
	<div class="notice notice-success is-dismissible inline ml-0 mb-3">
		<p>
			<?php _e( 'Settings successfully saved.', 'av-subscribe' ); ?>
		</p>
	</div>
	<?php } ?>

	<div class="av-title-logo">
		<div class="av-fs-180"><?php _e( 'Configure Coming Soon Page', 'av-coming-soon' );?></div>
	</div>

	<div class="row clearfix mt-2">

		<div class="col-md-8 mb-3">
		
			<form method="post" action="admin-post.php" id="AV_CS_FORM">
				<input type="hidden" name="action" value="AV_CS_save_options" />
				<?php wp_nonce_field( 'AV_CS_save_options', 'AV_CS_options_verify' ); ?>

				<div class="card mb-3">
					
					<div class="card-body">
						
						<div class="card-title font-weight-bold av-fs-120">
							<?php _e( 'Coming Soon / Maintenance Mode Status', 'av-coming-soon' ); ?>
						</div>

						<div class="row clearfix">
							<div class="col pl-3">

								<input type="hidden" name="maintenance_active" id="maintenance_active" value="<?php echo avthemes_set_value( 'maintenance_active', (int)$plugin_options['maintenance_active'] );?>" />

								<?php if( ( 1 == (int)$plugin_options['maintenance_active'] ) ) { ?>
								<button type="button" class="btn btn-success pl-5 pr-5" onclick="jQuery('#maintenance_active').val('0');jQuery('#AV_CS_FORM').submit();"><?php _e( 'Active', 'av-coming-soon' );?></button>&nbsp;&nbsp;&nbsp;<strong><?php _e( 'Click to deactivate', 'av-coming-soon' );?></strong> 
								<?php } else { ?>
								<button type="button" class="btn btn-danger pl-5 pr-5" onclick="jQuery('#maintenance_active').val('1');jQuery('#AV_CS_FORM').submit();"><?php _e( 'Disabled', 'av-coming-soon' );?></button>&nbsp;&nbsp;&nbsp;<strong><?php _e( 'Click to activate', 'av-coming-soon' );?></strong>
								<?php } ?> <?php _e( 'coming soon / maintenance mode', 'av-coming-soon' );?>

							</div>
							<div class="col-auto">
								<a href="<?php echo home_url( '/?av_coming_soon_preview' );?>" target="_blank" class="btn btn-outline-secondary"><?php _e( 'Preview', 'av-coming-soon' );?> &nearr;</a>
							</div>
						</div>

						<hr>

						<div>
							<p><strong><?php echo _e( 'Bypass link:', 'av-coming-soon' );?></strong> <span class="text-secondary small"><?php _e( '( Use this link to view site without logging in. E.g. Send it to your clients )', 'av-coming-soon' );?></span></p>
							<div class="row clearfix">
								<div class="col mb-3">
									<?php $unique_id = @$plugin_options['bypass_code']; ?>
									<a href="<?php echo home_url( '/?avcs='.$unique_id );?>" target="_blank"><?php echo home_url( '/?avcs='.$unique_id );?></a>
								</div>
								<div class="col-md-auto mb-2">
									<label class="mt-1">
										<input type="checkbox" name="generate_bypass_code" id="generate_bypass_code" value="1" /> <?php _e( 'Generate new code', 'av-coming-soon' );?>
									</label>
								</div>
								<div class="col-md-auto">
									<button type="submit" class="btn btn-primary btn-sm"><?php _e( 'Generate', 'av-coming-soon' ); ?></button>
								</div>
							</div>
						</div>

					</div>

				</div>

				<div class="card">
				
					<div class="card-body">
						
						<div class="card-title font-weight-bold av-fs-120">
							<?php _e( 'Content settings', 'av-coming-soon' ); ?>
						</div>

						<div class="form-group">
							<label for="main_title"><?php _e( 'Main title', 'av-coming-soon' );?>:</label>
							<input type="text" name="main_title" id="main_title" value="<?php echo avthemes_set_value( 'main_title', esc_attr( $plugin_options['main_title'] ) );?>" class="form-control" />
						</div>

						<div class="form-group">
							<label for="sub_title"><?php _e( 'Sub title', 'av-coming-soon' );?>:</label>
							<textarea name="sub_title" id="sub_title" rows="2" class="form-control"><?php echo avthemes_set_value( 'sub_title', esc_attr( $plugin_options['sub_title'] ) );?></textarea>
						</div>

						<div class="form-group">
							<label for="paragraph"><?php _e( 'Additional paragraph', 'av-coming-soon' );?>:</label>
							<textarea name="paragraph" id="paragraph" rows="2" class="form-control"><?php echo avthemes_set_value( 'paragraph', stripslashes( $plugin_options['paragraph'] ) );?></textarea>
							<div class="help-text"><?php _e( 'Optional content', 'av-coming-soon' );?></div>
						</div>

						<div class="form-group row clearfix">
							<div class="col-auto pt-2">
								<label for="launch_date"><?php _e( 'Launch date/time', 'av-coming-soon' );?>:</label>
							</div>
							<div class="col-auto">
								<input type="text" name="launch_date" id="launch_date" value="<?php echo avthemes_set_value( 'launch_date', esc_attr( $plugin_options['launch_date'] ) );?>" class="form-control av-datetime" />
							</div>
							<div class="col-auto pt-2">
								<label>
									<input type="checkbox" name="show_launch_date" id="show_launch_date" value="1" <?php echo avthemes_set_checkbox( 'show_launch_date', '1', ( (int)$plugin_options['show_launch_date'] == 1 ) );?> /> <?php _e( 'Show launch date', 'av-coming-soon' );?>
								</label>
							</div>
							<div class="col-auto pt-2">
								<label>
									<input type="checkbox" name="show_launch_counter" id="show_launch_counter" value="1" <?php echo avthemes_set_checkbox( 'show_launch_counter', '1', ( (int)$plugin_options['show_launch_counter'] == 1 ) );?> /> <?php _e( 'Show launch countdown', 'av-coming-soon' );?>
								</label>
							</div>
						</div>

						<div class="form-group">
							<label for="launch_date_text"><?php _e( 'Launch date text', 'av-coming-soon' );?>:</label>
							<input type="text" name="launch_date_text" id="launch_date_text" value="<?php echo avthemes_set_value( 'launch_date_text', esc_attr( $plugin_options['launch_date_text'] ) );?>" class="form-control" />
						</div>

						<div class="form-group">
							<div class="text-left">
								<button type="submit" class="btn btn-primary btn-block av-fs-150"><?php _e( 'Save settings', 'av-coming-soon' );?></button>
							</div>
						</div>

					</div>

				</div>

				<div class="card mt-3">
				
					<div class="card-body">
						
						<div class="card-title font-weight-bold av-fs-120">
							<?php _e( 'Design &amp; layout settings', 'av-coming-soon' ); ?>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-2"><label><?php _e( 'Show login button', 'av-coming-soon' );?></label></div>
							<div class="col-md-7">
								<label class="font-weight-normal">
									<input type="checkbox" name="show_login" id="show_login" value="1" <?php echo avthemes_set_checkbox( 'show_login', '1', ( (int)$plugin_options['show_login'] == 1 ) );?> /> <?php _e( 'Yes', 'av-coming-soon' ); ?>
								</label>
							</div>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-2">
								<label class="mr-2"><?php _e( 'Container width', 'av-coming-soon' ); ?>:</label>
							</div>
							<div class="col-md-2">
								<select name="container_width_md" id="container_width_md" class="form-control">
									<option value="6" <?php echo avthemes_set_select( 'container_width_md', '6', ( '6' == $plugin_options['container_width_md'] ) );?>><?php _e( '50%', 'av-coming-soon' );?></option>
									<option value="8" <?php echo avthemes_set_select( 'container_width_md', '8', ( '8' == $plugin_options['container_width_md'] ) );?>><?php _e( '66%', 'av-coming-soon' );?></option>
									<option value="10" <?php echo avthemes_set_select( 'container_width_md', '10', ( '10' == $plugin_options['container_width_md'] ) );?>><?php _e( '83%', 'av-coming-soon' );?></option>
									<option value="12" <?php echo avthemes_set_select( 'container_width_md', '12', ( '12' == $plugin_options['container_width_md'] ) );?>><?php _e( '100%', 'av-coming-soon' );?></option>
								</select>
								<div class="help-text"><?php _e( 'Large devices: 992px+', 'av-coming-soon' );?></div>
							</div>
							<div class="col-md-3">
								<select name="container_width_lg" id="container_width_lg" class="form-control">
									<option value="4" <?php echo avthemes_set_select( 'container_width_lg', '4', ( '4' == $plugin_options['container_width_lg'] ) );?>><?php _e( '33%', 'av-coming-soon' );?></option>
									<option value="6" <?php echo avthemes_set_select( 'container_width_lg', '6', ( '6' == $plugin_options['container_width_lg'] ) );?>><?php _e( '50%', 'av-coming-soon' );?></option>
									<option value="8" <?php echo avthemes_set_select( 'container_width_lg', '8', ( '8' == $plugin_options['container_width_lg'] ) );?>><?php _e( '66%', 'av-coming-soon' );?></option>
									<option value="10" <?php echo avthemes_set_select( 'container_width_lg', '10', ( '10' == $plugin_options['container_width_lg'] ) );?>><?php _e( '83%', 'av-coming-soon' );?></option>
									<option value="12" <?php echo avthemes_set_select( 'container_width_lg', '12', ( '12' == $plugin_options['container_width_lg'] ) );?>><?php _e( '100%', 'av-coming-soon' );?></option>
								</select>
								<div class="help-text"><?php _e( 'Extra large devices: 1200px+', 'av-coming-soon' );?></div>
							</div>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-2">
								<label class="mr-2"><?php _e( 'Container alignement', 'av-coming-soon' ); ?>:</label>
							</div>
							<div class="col-md-7">
								<span class="mr-2"><input type="radio" name="container_align" value="left" <?php echo avthemes_set_radio( 'container_align', 'left', ( 'left' == $plugin_options['container_align'] ) );?> /> <?php _e( 'Left', 'av-coming-soon' ); ?></span>
								<span class="mr-2"><input type="radio" name="container_align" value="center" <?php echo avthemes_set_radio( 'container_align', 'center', ( 'center' == $plugin_options['container_align'] ) );?> /> <?php _e( 'Center', 'av-coming-soon' ); ?></span>
								<span class="mr-2"><input type="radio" name="container_align" value="end" <?php echo avthemes_set_radio( 'container_align', 'end', ( 'end' == $plugin_options['container_align'] ) );?> /> <?php _e( 'Right', 'av-coming-soon' ); ?></span>
							</div>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-2">
								<label class="mr-2"><?php _e( 'Text alignement', 'av-coming-soon' );?>:</label>
							</div>
							<div class="col-md-7">
								<span class="mr-2"><input type="radio" name="text_align" value="left" <?php echo avthemes_set_radio( 'text_align', 'left', ( 'left' == $plugin_options['text_align'] ) );?> /> <?php _e( 'Left', 'av-coming-soon' ); ?></span>
								<span class="mr-2"><input type="radio" name="text_align" value="center" <?php echo avthemes_set_radio( 'text_align', 'center', ( 'center' == $plugin_options['text_align'] ) );?> /> <?php _e( 'Center', 'av-coming-soon' ); ?></span>
								<span class="mr-2"><input type="radio" name="text_align" value="right" <?php echo avthemes_set_radio( 'text_align', 'right', ( 'right' == $plugin_options['text_align'] ) );?> /> <?php _e( 'Right', 'av-coming-soon' ); ?></span>
							</div>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-2">
								<label for="font_family"><?php _e( 'Font type', 'av-coming-soon' );?>:</label>
							</div>
							<div class="col-md-5">
								<input type="text" id="font_family" name="font_family" class="gfont-picker av-form-control" value="<?php echo avthemes_set_value( 'font_family', esc_attr( $plugin_options['font_family'] ) );?>" />
							</div>
						</div>


						<div class="form-group row clearfix">
							<div class="col-md-2">
								<label for="font_color"><?php _e( 'Font color', 'av-coming-soon' );?>:</label>
							</div>
							<div class="col-md-5">
								<input type="text" name="font_color" id="font_color" value="<?php echo avthemes_set_value( 'font_color', esc_attr( $plugin_options['font_color'] ) );?>" class="form-control av-color-field" />
							</div>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-2">
								<label for="drop_shadow_color"><?php _e( 'Font shadow color', 'av-coming-soon' );?>:</label>
							</div>
							<div class="col-md-5">
								<input type="text" name="drop_shadow_color" id="drop_shadow_color" value="<?php echo avthemes_set_value( 'drop_shadow_color', esc_attr( $plugin_options['drop_shadow_color'] ) );?>" class="form-control av-color-field" />
							</div>
						</div>

						<?php
						$logo_id 	= (int)$plugin_options['logo_id'];
						$logo_url 	= wp_get_attachment_url( $logo_id );
						$logo_rm	= ( $logo_url ? 'block' : 'none' ); 
						?>
						<div class="form-group row clearfix">
							<div class="col-md-2">
								<label for="upload_image"><?php _e( 'Logo', 'av-coming-soon' );?>:</label>
							</div>
							<div class="col-md-3 mb-3" id="ph-logo">
								<?php if( $logo_url ) { ?>
								<img src="<?php echo esc_url_raw( $logo_url );?>" style="width: auto; max-height: 100px;" />
								<?php } else { ?>
								<div class="av-img-placeholder"><?php _e( 'Upload logo', 'av-coming-soon' );?></div>
								<?php } ?>
							</div>
							<input type="hidden" name="url_logo" id="url_logo" value="<?php echo avthemes_set_value( 'url_logo', esc_attr( $logo_url ) );?>" />
							<input type="hidden" name="logo_id" id="logo" value="<?php echo avthemes_set_value( 'logo_id', (int)$logo_id );?>" />
							<div class="col-md-2">
								<input class="button" id="upload_img_btn" type="button" value="<?php echo esc_attr( __( 'Upload Image', 'av-coming-soon' ) ); ?>" data-target="logo" data-height="100" />
								<div id="remove_logo" class="mt-1" style="display: <?php echo $logo_rm; ?>;"><a href="javascript:void(0);" class="text-danger remove-attachment" data-target="logo"><?php _e( 'Remove', 'av-coming-soon' );?></a></div>
							</div>
						</div>


						<?php
						$bg_id 		= (int)$plugin_options['bg_img_id'];
						$bg_url 	= wp_get_attachment_url( $bg_id );
						$bg_rm		= ( $bg_url ? 'block' : 'none' ); 
						?>
						<div class="form-group row clearfix">
							<div class="col-md-2">
								<label for="upload_image"><?php _e( 'Background image', 'av-coming-soon' );?>:</label>
							</div>
							<div class="col-md-3 mb-3" id="ph-bg">
								<?php if( $bg_url ) { ?>
								<img src="<?php echo esc_url_raw( $bg_url );?>" class="img-fluid" />
								<?php } else { ?>
								<div class="av-img-placeholder" style="height: 175px;"><?php _e( 'Upload background image', 'av-coming-soon' );?></div>
								<?php } ?>
							</div>
							<input type="hidden" name="url_bg" id="url_bg" value="<?php echo avthemes_set_value( 'url_bg', esc_attr( $bg_url ) );?>" />
							<input type="hidden" name="bg_img_id" id="bg" value="<?php echo avthemes_set_value( 'bg_img_id', (int)$bg_id );?>" />
							<div class="col-md-2">
								<input class="button" id="upload_bg_btn" type="button" value="<?php echo esc_attr( __( 'Upload Image', 'av-coming-soon' ) ); ?>" data-target="bg" data-height="175" />
								<div id="remove_bg" class="mt-1" style="display: <?php echo esc_attr( $bg_rm ); ?>;"><a href="javascript:void(0);" class="text-danger remove-attachment" data-target="bg"><?php _e( 'Remove', 'av-coming-soon' );?></a></div>
							</div>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-2">
								<label for="bg_color"><?php _e( 'Background color', 'av-coming-soon' );?>:</label>
							</div>
							<div class="col-md-5">
							<input type="text" name="bg_color" id="bg_color" value="<?php echo avthemes_set_value( 'bg_color', esc_attr( $plugin_options['bg_color'] ) );?>" class="form-control av-color-field" />
							</div>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-2"><label><?php _e( 'Show us some love', 'av-coming-soon' );?></label></div>
							<div class="col-md-5">
								<label class="font-weight-normal">
									<input type="checkbox" name="show_plugin_url" id="show_plugin_url" value="1" <?php echo avthemes_set_checkbox( 'show_plugin_url', '1', ( (int)$plugin_options['show_plugin_url'] == 1 ) );?> /> <?php _e( 'Yes', 'av-coming-soon' ); ?>
								</label>
								<div class="help-text"><?php _e( 'Found this plugin useful? Help spread the word by including a small link in the footer. This also encourages us to continue developing more free awesome plugins for you. Thanks!', 'av-coming-soon' );?></div>
							</div>
						</div>

						<div class="form-group">
							<div class="text-left">
								<button type="submit" class="btn btn-primary btn-block av-fs-150"><?php _e( 'Save settings', 'av-coming-soon' );?></button>
							</div>
						</div>

					</div>

				</div>

				<div class="card mt-3">
				
					<div class="card-body">
						
						<div class="card-title font-weight-bold av-fs-120">
							<?php _e( 'Custom style & Analytics', 'av-coming-soon' ); ?>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-2">
								<label><?php _e( 'Enable 503 header', 'av-coming-soon' );?></label>
							</div>
							<div class="col-md-5">
								<label class="font-weight-normal">
									<input type="checkbox" name="503_header" id="503_header" value="1" <?php echo avthemes_set_checkbox( '503_header', '1', ( (int)$plugin_options['503_header'] == 1 ) );?> /> <?php _e( 'Yes', 'av-coming-soon' );?>
								</label>
								<div class="help-text">
									<?php _e( 'Activating this option will inform your browser and search engines that your website is temporarily unavailable.', 'av-coming-soon' );?>
								</div>
							</div>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-2 pt-2">
								<label for="ga_analytics"><?php _e( 'Google Analytics ID', 'av-coming-soon' );?>:</label>
							</div>
							<div class="col-md-3">
								<input name="ga_analytics" id="ga_analytics" class="form-control" value="<?php echo avthemes_set_value( 'ga_analytics', esc_attr( $plugin_options['ga_analytics'] ) );?>" placeholder="UA-XXXXXXX-X" />
							</div>
						</div>

						<div class="form-group">
							<label for="custom_css"><?php _e( 'Custom CSS', 'av-coming-soon' );?>:</label>
							<textarea name="custom_css" id="custom_css" rows="5" class="form-control"><?php echo avthemes_set_value( 'custom_css', stripslashes( $plugin_options['custom_css'] ) );?></textarea>
						</div>

						<div class="form-group">
							<div class="text-left">
								<button type="submit" class="btn btn-primary btn-block av-fs-150"><?php _e( 'Save settings', 'av-coming-soon' );?></button>
							</div>
						</div>

					</div>

				</div>

				<div class="card mt-3">
				
					<div class="card-body">
						
						<div class="card-title font-weight-bold av-fs-120">
							<?php _e( 'Uninstall settings', 'av-coming-soon' ); ?>
						</div>

						<div class="form-group row clearfix">
							<div class="col-md-3">
								<label><?php _e( 'Delete settings on uninstall', 'av-coming-soon' );?></label>
							</div>
							<div class="col-md-5">
								<label class="text-danger font-weight-normal">
									<input type="checkbox" name="uninstall_delete_settings" id="uninstall_delete_settings" value="1" <?php echo avthemes_set_checkbox( 'uninstall_delete_settings', '1', ( (int)$plugin_options['uninstall_delete_settings'] == 1 ) );?> /> <?php _e( 'Yes', 'av-coming-soon' );?>
								</label>
								<div class="help-text text-danger">
									<?php _e( 'Checking this option will permanently delete this plugin settings when you uninstall it.', 'av-coming-soon' );?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="text-left">
								<button type="submit" class="btn btn-primary btn-block av-fs-150"><?php _e( 'Save settings', 'av-coming-soon' );?></button>
							</div>
						</div>

					</div>

				</div>


			</form>

		</div>

		<div class="col-md-4 col-lg-3">
		
			<div class="card mb-3">
				<div class="card-body">		
					<div class="card-title font-weight-bold av-fs-120">
						<?php _e( 'Something not working? Need help?', 'av-coming-soon' ); ?>
					</div>

					<p><?php 
							echo sprintf( '%s <a href="" target="_blank">%s</a> %s', 
								__( 'We are here to for you! It can be frustrating when things don\'t work like you want them to. If you need help with something, please', 'av-coming-soon' ),
								__( 'open a new topic in our official support forum', 'av-coming-soon' ),
								__( 'and we will get back to you ASAP. We answer all questions, and most of them withing a few hours during business hours.', 'av-coming-soon' )
							);?>
					</p>

					<a href="https://wordpress.org/support/plugin/av-coming-soon/" class="btn btn-outline-secondary btn-sm" target="_blank"><?php _e( 'Get Help Now', 'av-coming-soon' );?></a>

				</div>
			</div>


			<div class="card mb-3">
				<div class="card-body">		
					<div class="card-title font-weight-bold av-fs-120">
						<?php _e( 'Found this plugin useful?', 'av-coming-soon' ); ?>
					</div>

					<p>
						<?php _e( 'We would love to hear your feedback on this plugin. Your feedback helps us make the plugin better and also motivates us to create more free plugins for WordPress.', 'av-coming-soon' ); ?>
					</p>

					<a href="https://wordpress.org/support/plugin/av-coming-soon/reviews/#new-post" class="btn btn-outline-secondary btn-sm" target="_blank"><?php _e( 'Submit a Review', 'av-coming-soon' );?></a>

				</div>
			</div>

		</div>

	</div>

</div>