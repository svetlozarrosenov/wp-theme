<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
	->set_page_file( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'text', 'crb_google_maps_api_key', __( 'Google Maps API Key', 'crb' ) )
			->help_text( sprintf(
				__( 'You can generate your own key, by visiting %s and clicking on the "GET A KEY" button there.', 'crb' ),
				sprintf(
					'<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">%s</a>',
					_x( 'Get API Key', 'Google Maps Docs', 'crb' )
				)
			) ),
		Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script', 'crb' ) ),
		Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script', 'crb' ) ),
	) );

Container::make( 'theme_options', __( 'Header Overlay', 'crb' ) )
	->set_page_parent( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'color', 'crb_header_overlay_color', __( 'Color', 'crb' ) ),
		Field::make( 'text', 'crb_header_overlay_opacity', __( 'Opacity', 'crb' ) )
			->set_help_text('It accepts values from 0 to 1.', 'crb'),
	) );

Container::make( 'theme_options', __( 'Copyright', 'crb' ) )
	->set_page_parent( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'text', 'crb_copyright', __( 'Content', 'crb' ) ),
	) );

Container::make( 'theme_options', __( 'Footer Text', 'crb' ) )
	->set_page_parent( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'text', 'crb_footer_text', __( 'Text', 'crb' ) ),
	) );

crb_setup_socials_theme_options();
