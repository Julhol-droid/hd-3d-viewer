<?php
/**
 * Shortcode Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Frontend;

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
				$id = $atts['id'];
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
		return '<div>TODO</div>';
	}
}
