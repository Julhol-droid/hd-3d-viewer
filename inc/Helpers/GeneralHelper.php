<?php
/**
 * GeneralHelper Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Helpers;

/**
 * GeneralHelper Class
 */
class GeneralHelper {

	/**
	 * Converts a given string in kebab or snake case to CamelCase
	 *
	 * @param string $string The string to be converted.
	 */
	public static function string_to_camel_case( string $string ) {
		$clear_string = str_replace( '-', ' ', $string );
		$clear_string = str_replace( '_', ' ', $string );
		$str          = str_replace( ' ', '', ucwords( $clear_string ) );

		return $str;
	}
}
