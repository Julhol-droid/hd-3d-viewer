<?php
namespace Inc\Admin;
use Inc\Admin\ObjectViewerColumns;

class AdminMain {
    public static function init() {
        ObjectViewerColumns::init();
        add_filter( 'upload_mimes', [self::class, 'allow_obj_upload'] );
    }

    public static function allow_obj_upload( $mime_types ) {
        $mime_types['obj'] = 'application/octet-stream';
        return $mime_types;
    }
}
