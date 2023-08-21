<?php
/**
 * Scripts Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Frontend;

use Inc\Helpers\EnqueueHelper;

/**
 * Scripts Class
 * This is the class for the frontend
 */
class Scripts {

	/**
	 * This function init the Script class for the frontend
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( self::class, 'add_scripts' ) );

	}

	/**
	 * Enqueues the script
	 */
	public static function add_scripts() {
		$frontend_enqueue = new EnqueueHelper( 'frontend.js', array(), true );
		$frontend_enqueue->enqueue();
	}
}
