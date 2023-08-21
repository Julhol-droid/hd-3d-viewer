<?php
/**
 * EnqueueHelper Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Helpers;

use Inc\PluginMain;

/**
 * EnqueueHelper Class
 */
class EnqueueHelper {
	/** @var string The prefix for the enqueued asset */
	public static string $prefix = 'hd-3d-viewer';
	/** @var string The filename of the enqueued assets */
	public string $filename;
	/** @var array The dependencies of the asset */
	public array $deps;
	/** @var bool Wheter the Script should be inside the footer */
	public bool $in_footer;

	/**
	 * NOTE: The file needs to be located inside assets/dist
	 *
	 * @param string $filename The name of the Script to be enqueued.
	 * @param array  $deps The dependecies array for the assets.
	 * @param bool   $in_footer If the asset should be included in the footer. This will only have an effect on JS files.
	 */
	public function __construct( string $filename, $deps = array(), bool $in_footer = false ) {
		$this->filename  = $filename;
		$this->deps      = $deps;
		$this->in_footer = $in_footer;
	}

	/**
	 * Is used to enqueue a script to the website
	 */
	public function enqueue() {
		$src    = self::get_src();
		$handle = self::get_handle();
		$ver    = self::get_version();
		if ( $this->is_script() ) {
			wp_enqueue_script( $handle, $src, $this->deps, $ver, $this->in_footer );
			return;
		}
		if ( $his->is_css() ) {
			wp_enqueue_style( $handle, $src, $this->deps, $ver );
			return;
		}
	}

	/**
	 * Gets the handle for the enqued asset
	 */
	private function get_handle() {
		$filename = str_replace( array( '.js, .css' ), '', $this->filename );
		return self::$prefix . '-' . $filename;
	}

	/**
	 * Gets the src of the enqued asset
	 */
	private function get_src() {
		return PluginMain::get_plugin_url() . "assets/dist/$this->filename";
	}

	/**
	 * Gets the version of the assets based on the creation or last modified date of the asset
	 */
	private function get_version() {
		return filemtime( PluginMain::get_plugin_dir() . 'assets/dist/' . $this->filename );
	}

	/**
	 * Determines if this asset is a JS file
	 */
	private function is_script() {
		return strpos( $this->filename, '.js' );
	}

	/**
	 * Determines if this asset is a CSS file
	 */
	private function is_css() {
		return strpos( $this->filename, '.css' );
	}
}
