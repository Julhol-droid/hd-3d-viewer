<?php
namespace Inc\Frontend;

class Shortcode {
    public static String $shortcode_name = "hd_object_viewer";

    public static function init() {
        add_action( "init", [self::class, "add_shortcode"] );
    }

    public static function add_shortcode() {
        add_shortcode(self::$shortcode_name, function($atts) {
            $id = $atts["id"];
            return "TODO for id $id";
        });
    }
}