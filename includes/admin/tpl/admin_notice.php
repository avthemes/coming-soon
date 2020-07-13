<?php
/**
 * Admin notice template
 */
?>
<div class="notice notice-<?php echo $notice_type;?> <?php echo ( $is_dismissible  ? 'is-dismissible' : '' ); ?> inline av-admin-notice" 
		style="background-image: url( <?php echo plugins_url( 'assets/images/av_icon_16.png', AV_CS_PLUGIN_URL ); ?> ); background-image: url( <?php echo plugins_url( 'assets/images/av_icon_16.svg', AV_CS_PLUGIN_URL ); ?> ); background-position: 10px center; background-repeat: no-repeat; padding-left: 30px; margin-left: 0px; margin-top: 40px;">
	<p><?php echo $message; ?></p>
</div>