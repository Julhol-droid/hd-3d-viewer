<?php
/**
 * ObjectViewerColumns Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Admin;

use Inc\Models\ObjectViewerCPT;
use Inc\Frontend\Shortcode;

/**
 * ObjectViewerColumns Class
 */
class ObjectViewerColumns {

	/**
	 * This function initalizes the ObjectViewerColumns Class
	 */
	public static function init() {
		add_action( 'manage_' . ObjectViewerCPT::$slug . '_posts_columns', array( self::class, 'custom_columns' ) );
		add_action( 'manage_' . ObjectViewerCPT::$slug . '_posts_custom_column', array( self::class, 'display_columns_data' ), 10, 2 );
	}

	/**
	 * Adds custom columns to the posts admin dashboard
	 *
	 * @param array $columns The currently registered columns.
	 */
	public static function custom_columns( $columns ) {
		$columns['shortcode'] = 'Shortcode';
		return $columns;
	}

	/**
	 * Display the data for the column of each post
	 *
	 * @param string $column_name The Column name for the current column.
	 * @param string $post_id The id of the post.
	 */
	public static function display_columns_data( $column_name, $post_id ) {
		if ( 'shortcode' === $column_name ) {
			$shortcode = '[' . Shortcode::$shortcode_name . ' id="' . $post_id . '"]';
			ob_start();
			?>
				<div>
					<code><?php echo esc_html( $shortcode ); ?></code>
					<!-- TODO: Make Copy Button work -->
					<div class="button-primary">TODO: Copy</div>
				</div>
			<?php
			echo esc_html( ob_get_clean() );
		}
	}
}
