<?php
namespace Inc;
use Inc\Activate;
use Inc\Deactivate;
use Inc\Uninstall;

use Inc\Admin\AdminMain;
use Inc\Frontend\FrontendMain;
use Inc\Models\ModelsMain;

class PluginMain {
    /**
     * NOTE: If changed also change the plugin dir name
     */
    public static $name = "hd-3d-viewer";

    /**
     * Init Plugin
     */
    public function __construct() {
        AdminMain::init();
        FrontendMain::init();
        ModelsMain::init();
    }

    /**
     * Activate Plugin
     */
    public static  function activate() {
        Activate::activate();
    }

    /**
     * Deactivate Plugin
     */
    public static function deactivate() {
        Deactivate::deactivate();
    }

    /**
     * Uninstall Plugin
     */
    public static function uninstall() {
        Uninstall::uninstall();
    }

    /**
     * Gets the base directory of this plugin including a leading slash
     */
    public static function get_plugin_dir() {
        return WP_PLUGIN_DIR . "/" . self::$name . "/";
    }

    /**
     * Gets the base url of this plugin including a leading slash
     */
    public static function get_plugin_url() {
        return plugin_dir_url( __DIR__ ); 
    }
}
