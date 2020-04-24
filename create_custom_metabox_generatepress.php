<?php 

/**
 * Generate a custom metabox
 */
 
add_action( 'add_meta_boxes', 'generate_register_custom_meta_box' );

function generate_register_custom_meta_box() {
	if ( ! current_user_can( apply_filters( 'generate_metabox_capability', 'edit_theme_options' ) ) ) {
		return;
	}

	$post_types = get_post_types( array( 'public' => true ) );

	foreach ( $post_types as $type ) {
		if ( 'post' !== $type ) {
			add_meta_box(
				'generate_custom_meta_box',
				esc_html__( 'Custom Metabox', 'generatepress' ),
				'generate_do_layout_meta_box',
				$type,
				'side'
			);
		}
	}
}
