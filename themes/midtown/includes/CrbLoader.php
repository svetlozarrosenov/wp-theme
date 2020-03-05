<?php
use WPEmerge\Requests\RequestInterface;
use WPEmerge\Routing\Conditions\ConditionInterface;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

class CrbLoader implements ServiceProviderInterface {
	private $complex;
	private $file;
	private $common_types = [];
	private $sections;
	private $nav_items = [];

	public function get_sections( $complex, $file, $exceptions_from_common = [] ) {
		$this->complex = $complex;
		$this->file = $file . '/';

		$this->sections = carbon_get_the_post_meta( $complex );

		$old_path = $this->file;
		foreach ( $this->sections as $index => $section ) {
			if ( in_array($section['_type'], $this->common_types ) && ! in_array( $section['_type'], $exceptions_from_common ) ) {
				$this->file = 'common/';
			}
			$section_name = $section['_type'];

			$object_name = $section_name;
			unset($section['_type']);
			if ( array_key_exists( 'ids', $section ) ) {
				$section['loop'] = new WP_Query( array(
					'post_type' => self::find_cpt_name( $section_name ),
					'posts_per_page' => 100,
					'post__in' => self::get_association_ids( $section['ids'] ),
					'orderby' => 'post__in',
				) );

				unset($section['ids']);
			}
			\WPEmerge\render( $this->file . $section_name, [
				$object_name => $section,
			] );

			$this->file = $old_path;
		}
	}

	public function get_nav_items( $complex ) {
		$this->sections = carbon_get_the_post_meta( $complex );

		$sections_nav = [
			'Investment Highlights' => 'shopping_center',
			'Franchise Overview' => 'block',
			'Area Overview' => 'area',
			'Photo Gallery' => 'gallery',
			'Get Financing' => 'article',
			'Map' => 'map',
			'Contact Us' => 'contact'
		];

		foreach ( $this->sections as $section ) {
			if ( in_array( $section['_type'], $sections_nav ) ) {
				$this->nav_items[ $section['_type'] ] = array_search( $section['_type'], $sections_nav );

			}
		}

		return $this->nav_items;
	}

	public static function find_cpt_name( $string ) {
		return 'crb_' . substr( $string, 0, -1 );
	}

	public static function create_object_name_for_loop( $string ) {
		return $string . '_loop';
	}

	public static function get_association_ids( $association ) {
		$ids = [];
		if ( empty( $association ) ) {
			return [false];
		}

		foreach ( $association as $item ) {
			$ids[] = $item['id'];
		}

		return $ids;
	}

	public function register( $container ) {
		$container[CrbLoader::class] = function( $container ) {
			return new \CrbLoader();
		};
	}

	public function bootstrap( $container ) {
		return true;
    }

    public static function crb_esc_phone_number( $number ) {
		$checked_number = preg_replace( '/([^\d])/' , '', $number );

		return $checked_number;
	}
}