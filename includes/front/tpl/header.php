<?php if( $AV_CS_options['503_header'] == 1 ) {  header('HTTP/1.1 503 Service Temporarily Unavailable'); } ?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    	<link rel="stylesheet" href="<?php echo plugins_url( '/assets/css/bootstrap.min.css', AV_CS_PLUGIN_URL ); ?>">
		<link href="https://fonts.googleapis.com/css2?family=<?php echo $AV_CS_options['font_family'];?>:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
		<?php
			$bg_img = wp_get_attachment_url( $AV_CS_options['bg_img_id'] );
		?>
		<style type="text/css">
			* { box-sizing: border-box; }
			html, body { height: 100%; }
			body { 
				font-family: '<?php echo str_replace( "+", " ", $AV_CS_options['font_family'] );?>', sans-serif;
				background-color: <?php echo $AV_CS_options['bg_color'];?>;
				color: <?php echo $AV_CS_options['font_color'];?>;
				text-shadow: 1px 1px 0px <?php echo $AV_CS_options['drop_shadow_color'];?>; 
				height: 100%;
				<?php if( $bg_img ) { ?>
				background-image: url("<?php echo esc_url_raw( $bg_img );?>");
  				background-position: center center;
  				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: fixed;
				<?php } ?>
				position: relative;
				top: 0; left: 0;
				margin: 0; padding: 0;
			}
			.av-logo { font-size: 300%; font-weight: 300; }
			.av-counter { font-size: 500%; font-weight: bold; }
			h1 { font-size: 350%; }
			h2, h3 { font-weight: normal; margin-top: 20px; }
			h3 { font-size: 150%; }
			footer { padding: 10px; position: absolute; bottom: 0; width: 100%; }
			footer a { color: <?php echo $AV_CS_options['font_color'];?>; }
			<?php if( ! empty( $AV_CS_options['custom_css'] ) ) { echo $AV_CS_options['custom_css']; } ?>
		</style>

		<?php if( !empty( $AV_CS_options['ga_analytics'] ) ) { ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $AV_CS_options['ga_analytics'] ); ?>"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', '<?php echo esc_attr( $AV_CS_options['ga_analytics'] ); ?>');
		</script>
		<?php } ?>

    	<title><?php _e( 'Coming soon', 'av-coming-soon' );?> | <?php echo get_bloginfo( 'name' );?></title>
  	</head>
  <body>