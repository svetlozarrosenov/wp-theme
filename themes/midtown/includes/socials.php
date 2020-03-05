<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

function crb_get_socials() {
	$socials_setup = include CRB_THEME_DIR . '/config/socials.php';

	return $socials_setup;
}

function crb_get_social_url_option_name( $social ) {
	return "crb_{$social}_url";
}

function crb_setup_socials_theme_options() {
	$socials = crb_get_socials();
	$socials_theme_options = [];
	foreach ( $socials as $social_name => $social_data ) {

		$socials_theme_options[] =
			Field::make( 'text', crb_get_social_url_option_name( $social_name ), $social_data['name'] . __( ' Link', 'crb' ) );
	}

	return Container::make( 'theme_options', __( 'Social Links', 'crb' ) )
			->set_page_parent( 'crbn-theme-options.php' )
			->add_fields( $socials_theme_options );
}

function crb_get_socials_data() {
	$socials = crb_get_socials();
	$socials_data = [];
	
	foreach ( $socials as $social_name => $social_data ) {
		$social_url = carbon_get_theme_option( crb_get_social_url_option_name( $social_name ) );

		if ( empty( $social_url ) ) {
			continue;
		}

		$socials_data[ $social_name ] = array_merge( $social_data, [
			'url' => $social_url,
		] );
	}

	return $socials_data;
}

