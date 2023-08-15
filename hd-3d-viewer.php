<?php
/*
 * Plugin Name: 3D Viewer
 * Description: This is a plugin which allows you to display 3D Objects at your Wordpress Site
 * Author:      Julian Holzmayer
 * Author URI:  https://www.holzmayer.dev
 * License:     TODO
 * License URI: TODO
 * Text Domain: hd-3d-viewer
 * Domain Path: TODO
 * Version:     0.0.1
 */
defined("ABSPATH") or die("Hey, what are you doing here!");


require_once __DIR__ . '/vendor/autoload.php';

use Inc\PluginMain;

if ( class_exists("Inc\PluginMain") ) {
    $plugin = new PluginMain();
    register_activation_hook( __FILE__, ["Inc\PluginMain", "activate"] );
    register_deactivation_hook( __FILE__, ["Inc\PluginMain", "deactivate"]  );
    register_uninstall_hook( __FILE__, ["Inc\PluginMain", "uninstall"] );
}
