<?php
namespace Inc\Models;

use Inc\Helpers\DomainHelper;

class ObjectViewerCPT {
	public static $slug       = 'hd-object-viewer';
	public static $metabox_id = 'hd-object-viewer-mb';
	public static $file_group = 'hd-object-viewer-mb-files-group';

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
				'label'               => __( '3D View', DomainHelper::$domain ),
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
				'title'        => __( '3D View Options', DomainHelper::$domain ),
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
					'group_title'    => __( '3D Object', DomainHelper::$domain ),
					'add_button'     => __( 'Add 3D Object', DomainHelper::$domain ),
					'remove_button'  => __( 'Remove 3D Object', DomainHelper::$domain ),
					'sortable'       => true,
					'remove_confirm' => __( 'Are you sure you want to remove?', DomainHelper::$domain ),
				),
			)
		);

		// Title for 3D Object
		$cmb->add_group_field(
			$group_field_id,
			array(
				'name' => __( 'Title', DomainHelper::$domain ),
				'id'   => 'title',
				'type' => 'text',
			)
		);

		// 3D File
		$cmb->add_group_field(
			$group_field_id,
			array(
				'name' => __( '3D File', DomainHelper::$domain ),
				'id'   => 'file',
				'type' => 'file',
			)
		);
	}
}
