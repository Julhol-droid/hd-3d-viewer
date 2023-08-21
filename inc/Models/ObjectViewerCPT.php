<?php
/**
 * ObjectViewerCPT Class.
 *
 * @package hd-3d-viewer
 */

namespace Inc\Models;

/**
 * ObjectViewerCPT
 */
class ObjectViewerCPT {
	/** @var string The Slug of the CPT */
	public static $slug = 'hd-object-viewer';
	/** @var string The metabox id of the CPT's metabox */
	public static $metabox_id = 'hd-object-viewer-mb';
	/** @var string The Slug of the file group inside the CPT's metabox */
	public static $file_group = 'hd-object-viewer-mb-files-group';

	/**
	 * The init function
	 */
	public static function init() {
		add_action( 'init', array( self::class, 'register_post_type' ) );
		add_action( 'cmb2_admin_init', array( self::class, 'add_metaboxes' ) );
	}

	/**
	 * Registers the 3D View CPT
	 */
	public static function register_post_type() {
		register_post_type(
			self::$slug,
			array(
				'label'               => __( '3D View', 'hd-3d-viewer' ),
				'description'         => 'Recipe custom post type.',
				'public'              => true,
				'exclude_from_search' => true,
				'supports'            => array( 'title' ),
				'menu_icon'           => 'dashicons-admin-site',
			)
		);
	}

	/**
	 * Adds the Metaboxes to the ObjectViewer CPT
	 */
	public static function add_metaboxes() {
		$cmb = new_cmb2_box(
			array(
				'id'           => self::$metabox_id,
				'title'        => __( '3D View Options', 'hd-3d-viewer' ),
				'object_types' => array( self::$slug ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
			)
		);

		$group_field_id = $cmb->add_field(
			array(
				'id'      => self::$file_group,
				'type'    => 'group',
				'options' => array(
					'group_title'    => __( '3D Object', 'hd-3d-viewer' ),
					'add_button'     => __( 'Add 3D Object', 'hd-3d-viewer' ),
					'remove_button'  => __( 'Remove 3D Object', 'hd-3d-viewer' ),
					'sortable'       => true,
					'remove_confirm' => __( 'Are you sure you want to remove?', 'hd-3d-viewer' ),
				),
			)
		);

		$cmb->add_group_field(
			$group_field_id,
			array(
				'name' => __( 'Title', 'hd-3d-viewer' ),
				'id'   => 'title',
				'type' => 'text',
			)
		);

		// 3D File
		$cmb->add_group_field(
			$group_field_id,
			array(
				'name' => __( '3D File', 'hd-3d-viewer' ),
				'id'   => 'file',
				'type' => 'file',
			)
		);
	}
}
