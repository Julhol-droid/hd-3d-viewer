<?php
namespace Inc;
use Inc\Activate;
use Inc\Deactivate;
use Inc\Uninstall;

class PluginMain {
    /**
     * Init Plugin
     */
    public function __construct() {
        Inc\Admin\AdminMain::init();
        Inc\Frontend\FrontendMain::init();
        Inc\Models\ModelsMain::init();
    }

    /**
     * Activate Plugin
     */
    public function activate() {
        Activate::activate();
    }

    /**
     * Deactivate Plugin
     */
    public function deactivate() {
        Deactivate::deactivate();
    }

    /**
     * Uninstall Plugin
     */
    public function uninstall() {
        Uninstall::uninstall();
    }

}
