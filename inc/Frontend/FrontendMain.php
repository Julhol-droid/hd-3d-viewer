<?php
/**
 * FrontendMain Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Frontend;

use Inc\Frontend\Shortcode;
use Inc\Frontend\Scripts;

/**
 * FrontendMain Class
 */
class FrontendMain {

	/**
	 * This init the FrontendMain Class
	 */
	public static function init() {
		Shortcode::init();
		Scripts::init();
	}
}
