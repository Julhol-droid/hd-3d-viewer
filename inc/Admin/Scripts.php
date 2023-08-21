<?php
namespace Inc\Admin;

use Inc\Helpers\EnqueueHelper;

class Scripts {

	public static function init() {
		add_action( 'admin_enqueue_scripts', array( self::class, 'add_scripts' ) );
	}

	public static function add_scripts() {
		$adminEnqueue = new EnqueueHelper( 'admin.js', array(), true );
		$adminEnqueue->enqueue();
	}
}
