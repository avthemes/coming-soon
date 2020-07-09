<div class="container-fluid" id="av-container">

	<?php if( ( $active_count = count( $av_plugins ) ) > 0 ) { ?>
	<div class="av-title-logo mt-3">
		<div class="av-fs-180"><?php _e( 'Active plugins', 'av-subscribe' );?></div>
		<p><?php _e( 'List of active AV Plugins on your site. Click on the plugin to go to the settings page.', 'av-subscribe' );?></p>
	</div>

	<div class="row clearfix">

		<?php 
		$plugin_root 	= WP_PLUGIN_DIR . '/';
		foreach( $av_plugins as $pl_dir => $plgn ) { ?>

		<div class="col-sm-6 col-md-4 col-lg-3 mt-2 av-plugin-container">
			<div class="card">
				<img src="<?php echo plugins_url( '/assets/images/cover.png', $plugin_root . $pl_dir ); ?>" alt="<?php echo $plgn['Name']; ?>" class="card-img-top" />
				<div class="card-body">
					<p><strong><?php echo $plgn['Name']; ?></strong></p>
					<div class="av-main-descr"><?php echo $plgn['Description'];?></div>
				</div>
			</div>
		</div>

		<?php } ?>
	</div>
	<?php } ?>

</div>