<?php
/*
Plugin Name: Frontier
Description: A CSS and JavaScript Editor WordPress Plugin 
Author: Masudul Haque
Version: 0.1
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Text Domain: frontier
*/


/* Admin Panel */

add_action( 'admin_menu', 'register_frontier_menu' );

function register_frontier_menu() {

	add_menu_page( 'Frontier', 'Frontier', 'manage_options', 'frontier/frontier-admin.php', '', plugins_url( 'frontier/icon.png' ));

}


function frontier_custom_css() {
	$val_custom_css = get_option('custom_css');
	$val_custom_js = get_option('custom_js');
	echo "<style>".$val_custom_css."</style>";
}

function frontier_custom_js() {
	?>
	
	<script>
		if(!window.jQuery)
		{
		   var script = document.createElement('script');
		   script.type = "text/javascript";
		   script.src = "http://code.jquery.com/jquery-latest.min.js";
		   document.getElementsByTagName('head')[0].appendChild(script);
		}
	</script>

	<?php
	$val_custom_js = get_option('custom_js');
	echo "<script>".$val_custom_js."</script>";
}
add_action('wp_head', 'frontier_custom_css');
add_action('wp_footer','frontier_custom_js' );