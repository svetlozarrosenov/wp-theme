<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;


Container::make( 'post_meta', __( 'Default Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_id', '!=', get_option('page_for_posts') )
	->where( 'post_template', '!=', 'templates/plain_page.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_default_page_fields', '' )
			->add_fields( 'intro', __( 'Header Image with Title', 'crb' ), array(
				Field::make( 'checkbox', 'small_intro_layout', __( 'Small Intro Layout', 'crb' ) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'subtitle', __( 'Subtitle', 'crb' ) ),
			) )
			->add_fields( 'bar', __( 'Secondary Header', 'crb' ), array(
				Field::make( 'radio', 'border', __( 'Border', 'crb' ) )
				 ->set_options( array(
			        'bar' => 'Without Border',
			        'bar border-top' => 'Border Top',
			        'bar border-top border-bottom' => 'Border Top and Bottom',
			    ) ),
				Field::make( 'checkbox', 'large_title', __( 'Large Title', 'crb' ) ),
				Field::make( 'text', 'text', __( 'Title', 'crb' ) ),
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) ),
			) )
			->add_fields( 'features', __( 'Image Feature', 'crb' ), array(
				Field::make( 'complex', 'features', __( '', 'crb' ) )
					->add_fields( array(
						Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
						Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
						Field::make( 'textarea', 'text', __( 'Text', 'crb' ) ),
					) )
					->set_layout('tabbed-horizontal')
					->set_header_template('<%- title %>')
			) )
			->add_fields( 'block', __( 'Full Width Content Highlight', 'crb' ), array(
				Field::make( 'checkbox', 'right_alignment', __( 'Right Alignment', 'crb' ) ),
				Field::make( 'color', 'overlay_color', __( 'Overlay Color', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'overlay_opacity', __( 'Overlay Opacity', 'crb' ) )
					->set_width( 50 )
					->set_help_text('It accepts values from 0 to 1.', 'crb'),
				Field::make( 'color', 'text_color', __( 'Text Color', 'crb' ) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb' ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )
			->add_fields( 'subscribe', __( 'Newsletter Signup', 'crb' ), array(
				Field::make( 'radio', 'border', __( 'Border', 'crb' ) )
				 ->set_options( array(
			        'subscribe' => 'Without Border',
			        'subscribe border-top' => 'Border Top',
			        'subscribe border-top border-bottom' => 'Border Top and Bottom',
			    ) ),
				Field::make( 'gravity_form', 'gform', __( 'Form', 'crb' ) ),
			) )
			->add_fields( 'box', __( 'Split Width Content Highlight', 'crb' ), array(
				Field::make( 'radio', 'alignment', __( 'Alignment', 'crb' ) )
				 ->set_options( array(
			        '' => 'Left',
			        'card--reversed' => 'Right',
			    ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb' ) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )
			->add_fields( 'html_block', __( 'HTML Block', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
			) )
			->add_fields( 'btns', __( 'Button Block', 'crb' ), array(
				Field::make( 'complex', 'btns', '' )
					->add_fields( array(
						Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
							->set_width( 50 ),
						Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
							->set_width( 50 ),
					) )
					->set_max(3)
					->set_layout('tabbed-horizontal')
					->set_header_template('<%- btn_label %>')
			) )
			->add_fields( 'image', __( 'Full Width Image', 'crb' ), array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
			) )
			->set_layout('tabbed-vertical'),
	) );

