<?php
namespace Inc\Frontend;

class Shortcode {
	public static string $shortcode_name = 'hd_object_viewer';

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
	 * @param id The Id of the post to be referenced
	 */
	public static function generate_html( string $id ) {
		return '<div>TODO</div>';
	}
}
