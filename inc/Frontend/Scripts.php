<?php
/**
 * Scripts Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Frontend;

use Inc\Helpers\EnqueueHelper;
use Inc\Helpers\GeneralHelper;
use Inc\PluginMain;
use Inc\Models\DataClassViewerCPT;

/**
 * Scripts Class
 * This is the class for the frontend
 */
class Scripts {

	/**
	 * Initalizes the frontend scripts
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', [ self::class, 'add_scripts' ] );
		add_action( 'wp_print_scripts', [ self::class, 'add_general_plugin_variables' ] );
	}

	/**
	 * Enqueues the scripts
	 */
	public static function add_scripts() {
		$frontend_enqueue = new EnqueueHelper( 'frontend.js', [], true );
		$frontend_enqueue->enqueue();
	}

	/**
	 * This function is used to enqueue the scripts inside the shortcode, so we can have access
	 */
	public static function enqueue_frontend_script_in_shortcode() {
		$frontend_enqueue = new EnqueueHelper( 'frontend.js', [], true );
		$frontend_enqueue->enqueue();
	}

	/**
	 * This function localizes the script inside the shortcode and adds the shortcode attr to the script
	 *
	 * @param array $attr The Shortcode Attributes to be used inside the script.
	 */
	public static function localize_script_in_shortcode( array $attr ) {
		$handle          = ( new EnqueueHelper( 'frontend.js' ) )->get_handle();
		$slug            = PluginMain::$js_name;
		$id              = $attr['id'];
		$viewer_cpt_data = new DataClassViewerCPT( $id );
		$data            = "window.${slug}Shortcode${id} = " . wp_json_encode( $viewer_cpt_data->generate_data_array() ) . ';';

		wp_add_inline_script( $handle, $data, 'before' );
	}

	/**
	 * Adds the general Plugin Variables for the JS Files
	 */
	public static function add_general_plugin_variables() {
		$handle              = ( new EnqueueHelper( 'frontend.js' ) )->get_handle();
		$general_plugin_info = [
			'name'          => PluginMain::$js_name,
			'nameSnakeCase' => PluginMain::$name,
		];

		$data = 'const HdViewerPluginInfo = ' . wp_json_encode( $general_plugin_info ) . ';';

		wp_add_inline_script( $handle, $data, 'before' );
	}
}
