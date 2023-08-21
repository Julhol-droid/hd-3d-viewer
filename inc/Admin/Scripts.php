<?php
/**
 * Scripts Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Admin;

use Inc\Helpers\EnqueueHelper;

/**
 * Scripts Class
 * The Scripts class which gets added to the admin screen
 */
class Scripts {

	/**
	 * This function init the Script class for the frontend
	 */
	public static function init() {
		add_action( 'admin_enqueue_scripts', array( self::class, 'add_scripts' ) );
	}

	/**
	 * Enqueues the script
	 */
	public static function add_scripts() {
		$admin_enqueue = new EnqueueHelper( 'admin.js', array(), true );
		$admin_enqueue->enqueue();
	}
}
