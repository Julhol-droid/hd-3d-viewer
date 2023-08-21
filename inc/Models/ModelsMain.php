<?php
/**
 * ModelsMain Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Models;

use Inc\Models\ObjectViewerCPT;

/**
 * ModelsMain Class
 */
class ModelsMain {

	/**
	 * The init function for the ModelsMain class
	 */
	public static function init() {
		ObjectViewerCPT::init();
	}
}
