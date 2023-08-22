<?php
/**
 * Shortcode Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Frontend;

use Inc\Helpers\EnqueueHelper;
use Inc\Frontend\Scripts;
use Inc\PluginMain;

/**
 * Shortcode Class
 */
class Shortcode {
	/** @var string $shortcode_name The slug of the shortcode */
	public static string $shortcode_name = 'hd_object_viewer';

	/**
	 * The init function for the Shortcode Class
	 */
	public static function init() {
		add_action( 'init', array( self::class, 'add_shortcode' ) );
	}

	/**
	 * Adds the Shortcode to WP
	 */
	public static function add_shortcode() {
		add_shortcode(
			self::$shortcode_name,
			function( $atts ) {
				$id                     = $atts['id'];
				$frontend_script_handle = ( new EnqueueHelper( 'frontend.js' ) )->get_handle();
				Scripts::enqueue_frontend_script_in_shortcode();
				Scripts::localize_script_in_shortcode( $atts );
				return self::generate_html( $id );
			}
		);
	}

	/**
	 * Gneerates the HTML for the Shortcode
	 *
	 * @param string $id The Id of the post to be referenced.
	 */
	public static function generate_html( string $id ) {
		$js_name     = PluginMain::$js_name;
		$plugin_slug = PluginMain::$name;
		return "<div class=\"${js_name}Shortcode$id ${js_name}\" data-$plugin_slug-id=$id>TODO $id</div>";
	}
}
