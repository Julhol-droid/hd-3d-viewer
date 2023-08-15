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

}
