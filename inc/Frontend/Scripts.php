<?php
namespace Inc\Frontend;

use Inc\Helpers\EnqueueHelper;

class Scripts {

	public static function init() {
		add_action( 'wp_enqueue_scripts', array( self::class, 'add_scripts' ) );

	}

	public static function add_scripts() {
		$frontendEnqueue = new EnqueueHelper( 'frontend.js', array(), true );
		$frontendEnqueue->enqueue();
	}
}
