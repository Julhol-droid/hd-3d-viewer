<?php
/**
 * DataClassViewerCPT Class
 *
 * @package hd-3d-viewer
 */

namespace Inc\Models;

use Inc\Models\ObjectViewerCPT;

/**
 * DataClassViewerCPT Class
 * This is an Data Class used to generate all data for a post type the frontend.
 */
class DataClassViewerCPT {
	/** @var string $id */
	private string $id;

	/**
	 * Constructor
	 *
	 * @param string $id The id of the post.
	 */
	public function __construct( string $id ) {
		$this->id = $id;
	}

	/**
	 * Generates the data array with all information of the post
	 * The keys of the array returned are in camelCase because it is in JS
	 *
	 * @return I3dViewerCptData @link https://github.com/Julhol-droid/hd-3d-viewer/blob/master/assets/src/types/index.ts  Type of TS interface
	 */
	public function generate_data_array() {
		$meta_data = $this->get_post_meta();

		return [
			'id'       => $this->id,
			'postMeta' => $meta_data,
		];
	}

	/**
	 * Gets the post meta for the post
	 *
	 * @return I3dViewerPostMeta @link https://github.com/Julhol-droid/hd-3d-viewer/blob/master/assets/src/types/index.ts  Type of TS interface
	 */
	public function get_post_meta() {
		return [
			'files' => get_post_meta( $this->id, ObjectViewerCPT::$file_group, true ),
			'title' => get_the_title( $this->id ),
		];
	}
}
