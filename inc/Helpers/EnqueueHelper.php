<?php

namespace Inc\Helpers;

use Inc\PluginMain;

class EnqueueHelper {
    public static String $prefix = "hd-3d-viewer";
    public String $filename;
    public Array $deps;
    public bool $in_footer;

    /**
     * NOTE: The file needs to be located inside assets/dist
     * @param filename The name of the Script to be enqueued. 
     * @param deps The dependecies array for the assets
     * @param in_footer If the asset should be included in the footer. This will only have an effect on JS files
     */
    function __construct(String $filename, $deps = [], bool $in_footer = false) {
        $this->filename = $filename;
        $this->deps = $deps;
        $this->in_footer = $in_footer;
    }

    /**
     * Is used to enqueue a script to the website
     */
    public function enqueue() {
        $src = self::get_src();
        $handle = self::get_handle();
        $ver = self::get_version();
        if ($this->isScript()) {
            wp_enqueue_script( $handle, $src, $this->deps, $ver, $this->in_footer );
            return;
        }
        if ($his->isCSS()) {
            wp_enqueue_style( $handle, $src, $this->deps, $ver);
            return;
        }
    }



    /**
     * Gets the handle for the enqued asset
     * @param filename 
     */
    private function get_handle() {
        $filename = str_replace([".js, .css"], "", $this->filename);
        return self::$prefix . "-" . $filename;
    }

    /**
     * Gets the src of the enqued asset
     * @param filename
     */
    private function get_src() {
        return PluginMain::get_plugin_url() .  "assets/dist/$this->filename";
    }

    /**
     * Gets the version of the assets based on the creation or last modified date of the asset
     */
    private function get_version() {
        return filemtime(PluginMain::get_plugin_dir() . 'assets/dist/' . $this->filename);
    }

    /**
     * Determines if this asset is a JS file
     */
    private function isScript() {
        return strpos($this->filename, ".js");
    }

    /**
     * Determines if this asset is a CSS file
     */
    private function isCSS() {
        return strpos($this->filename, ".css");
    }
}