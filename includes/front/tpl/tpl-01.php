<?php include_once "header.php"; ?>

<header>

	<div class="container-fluid">
		<div class="row clearfix justify-content-<?php echo esc_attr( $AV_CS_options['container_align'] ); ?>">
			<div class="col-md-<?php echo (int)$AV_CS_options['container_width_md'];?> col-lg-<?php echo (int)$AV_CS_options['container_width_lg'];?> text-<?php echo esc_attr( $AV_CS_options['text_align'] ); ?>" id="main-content">


				<div class="av-logo mb-3">
					<?php 
					$logo = wp_get_attachment_url( $AV_CS_options['logo_id'] );
					if( $logo ) { ?>
					<img src="<?php echo esc_url_raw( $logo );?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
					<?php } else { echo esc_html( get_bloginfo( 'name' ) ); } ?>
				</div>

				<?php if( ! empty( $AV_CS_options['main_title'] ) ) { ?>
				<h1 class="av-title"><?php echo esc_html( do_shortcode( $AV_CS_options['main_title'] ) ); ?></h1>
				<?php } ?>
				
				<?php if( ! empty( $AV_CS_options['sub_title'] ) ) { ?>
				<h2 class="av-text-second">
					<?php echo esc_html( do_shortcode( $AV_CS_options['sub_title'] ) ); ?>
				</h2>
				<?php } ?>

				<?php if( ! empty( $AV_CS_options['paragraph'] ) ) { ?>
				<h3 class="av-text-third">
					<?php echo esc_html( do_shortcode( $AV_CS_options['paragraph'] ) ); ?>
				</h3>
				<?php } ?>

				<div class="countdown mt-5 mb-5 av-countdown-container">
					<?php if( (int)$AV_CS_options['show_launch_date'] == 1 && strtotime( $AV_CS_options['launch_date'] ) ) { ?>
					<div class="counter-date av-countdown-date"><?php echo esc_html( $AV_CS_options['launch_date_text'] ); ?> <?php echo date( get_option('date_format') . ' - ' . get_option('time_format') , strtotime( $AV_CS_options['launch_date'] ) ); ?></div>
					<?php } ?>
					<?php if( (int)$AV_CS_options['show_launch_counter'] == 1 ) { ?>
					<div id="counter" class="av-counter" data-date="<?php echo esc_attr( $AV_CS_options['launch_date'] ); ?>">0d 00h 00m 00s</div>
					<?php } ?>
				</div>

			</div>
		</div>
	</div>
	
</header>

<footer id="footer" class="container-fluid">
	<div class="row clearfix justify-content-<?php echo esc_attr( $AV_CS_options['container_align'] ); ?>">
		<div class="col-md-<?php echo (int)$AV_CS_options['container_width_md'];?> col-lg-<?php echo (int)$AV_CS_options['container_width_lg'];?> mt-5 text-<?php echo esc_attr( $AV_CS_options['text_align'] ); ?>">
			&copy; <?php echo date('Y');?> - <?php echo esc_html( get_bloginfo( 'name' ) ); ?> 
			<?php if( (int)$AV_CS_options['show_login'] == 1 ) { ?> &bull; &#128274; <a href="<?php echo esc_url_raw( home_url( 'wp-admin' ) );?>" rel="nofollow"><?php _e( 'Login', 'av-coming-soon' );?></a><?php } ?>
			<?php if( (int)$AV_CS_options['show_plugin_url'] == 1 ) { ?>
			<br><small><?php _e( 'This site is using the free <a href="https://avthemes.com/plugin/coming-soon">AV Coming Soon</a> plugin', 'av-coming-soon' ); ?></small>
			<?php } ?>
		</div>
	</div>
</footer>

<?php include_once "footer.php"; ?>
