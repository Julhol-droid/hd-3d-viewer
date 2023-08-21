<?php
namespace Inc\Frontend;

use Inc\Frontend\Shortcode;
use Inc\Frontend\Scripts;

class FrontendMain {

	public static function init() {
		Shortcode::init();
		Scripts::init();
	}
}
