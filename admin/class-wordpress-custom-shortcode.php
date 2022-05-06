<?php
/*
* Stop execution if someone tried to get file directly.
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Wordpress_Custom_Shortcode_Admin' ) ) {

	class Wordpress_Custom_Shortcode_Admin {

		Private
    		$IsAdmin;
        
		/**
		 * For user permissions
		 *
		 * @since 1.0.0
		 */

		public function bn_is_admin() {
        	$this->IsAdmin = current_user_can( "administrator" );
    	}
		
		function __construct() {
			
			add_shortcode( 'customcontent', 'wordpress_custom_shortcode' );
			function wordpress_custom_shortcode($atts, $content = null){
			$shortatt = shortcode_atts( array(
			'numberoftime' => 'numberoftime',
			'shortcontent'  =>  'shortcontent'
			), $atts );
			$numberofiteration 	= $shortatt['numberoftime'];
			$shortcontent 		= $shortatt['shortcontent'];
			$outuptdata = "<ul>";
			for ($x = 0; $x <= $numberofiteration; $x++) {
			  $outuptdata .= "<li>".$shortcontent."</li>";
			}
			$outuptdata .= "<ul>";
			
			return $outuptdata;
		}

}
}
 new Wordpress_Custom_Shortcode_Admin();
}