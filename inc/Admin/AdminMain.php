<?php
/**
 * AdminMain Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Admin;

use Inc\Admin\ObjectViewerColumns;
use Inc\Admin\Scripts;
use Inc\PluginMain;

/**
 * AdminMain Class
 */
class AdminMain {

	/**
	 * This function initalizes the AdminMain Class
	 */
	public static function init() {
		ObjectViewerColumns::init();
		Scripts::init();
		add_filter( 'upload_mimes', array( self::class, 'allow_obj_upload' ) );
	}

	/**
	 * @param array $mime_types The different mime types of the WordPress upload system.
	 */
	public static function allow_obj_upload( $mime_types ) {
		$mime_types['obj'] = 'application/octet-stream';
		return $mime_types;
	}
}
