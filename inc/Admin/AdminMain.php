<?php
namespace Inc\Admin;

use Inc\Admin\ObjectViewerColumns;
use Inc\Admin\Scripts;
use Inc\PluginMain;

class AdminMain {

	public static function init() {
		ObjectViewerColumns::init();
		Scripts::init();
		add_filter( 'upload_mimes', array( self::class, 'allow_obj_upload' ) );
	}

	public static function allow_obj_upload( $mime_types ) {
		$mime_types['obj'] = 'application/octet-stream';
		return $mime_types;
	}
}
