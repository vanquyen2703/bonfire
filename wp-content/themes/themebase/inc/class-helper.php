<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper functions
 */
class Themebase_Helper {
	public static function get_post_meta( $name, $default = false ) {
		global $themebase_page_options;
		if ( $themebase_page_options != false && isset( $themebase_page_options[ $name ] ) ) {
			return $themebase_page_options[ $name ];
		}
		return $default;
	}
	public static function get_the_post_meta( $options, $name, $default = false ) {
		if ( $options != false && isset( $options[ $name ] ) ) {
			return $options[ $name ];
		}
		return $default;
	}
	/**
	 * @param bool $default_option
	 *
	 * @return array
	 */
	public static function get_registered_sidebars( $default_option = false, $empty_option = true ) {
		global $wp_registered_sidebars;
		$sidebars = array();
		if ( $default_option == true ) {
			$sidebars['default'] = esc_html__( 'Default Sidebar', 'themebase' );
		}
		if ( $empty_option == true ) {
			$sidebars['none'] = esc_html__( 'No Sidebar', 'themebase' );
		}
		foreach ( $wp_registered_sidebars as $sidebar ) {
			$sidebars[ $sidebar['id'] ] = $sidebar['name'];
		}
		return $sidebars;
	}
	/**
	 * Get content of file
	 *
	 * @param string $path
	 *
	 * @return mixed
	 */
	static function get_file_contents( $path = '' ) {
		$content = '';
		if ( $path !== '' ) {
			global $wp_filesystem;
			Themebase::require_file( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
			if ( file_exists( $path ) ) {
				$content = $wp_filesystem->get_contents( $path );
			}
		}
		return $content;
	}
	/**
	 * Get size information for all currently-registered image sizes.
	 *
	 * @global $_wp_additional_image_sizes
	 * @uses   get_intermediate_image_sizes()
	 * @return array $sizes Data for all currently-registered image sizes.
	 */
	public static function get_image_sizes() {
		global $_wp_additional_image_sizes;
		$sizes = array( 'full' => 'full' );
		foreach ( get_intermediate_image_sizes() as $_size ) {
			if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
				$_size_w                               = get_option( "{$_size}_size_w" );
				$_size_h                               = get_option( "{$_size}_size_h" );
				$sizes["$_size {$_size_w}x{$_size_h}"] = $_size;
			} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
				$sizes["$_size {$_wp_additional_image_sizes[ $_size ]['width']}x{$_wp_additional_image_sizes[ $_size ]['height']}"] = $_size;
			}
		}

		return $sizes;
	}
	public static function aq_resize( $args = array() ) {
		$defaults = array(
			'url'     => '',
			'width'   => null,
			'height'  => null,
			'crop'    => true,
			'single'  => true,
			'upscale' => false,
			'echo'    => false,
		);
		$args  = wp_parse_args( $args, $defaults );
		$image = aq_resize( $args['url'], $args['width'], $args['height'], $args['crop'], $args['single'], $args['upscale'] );
		if ( $image === false ) {
			$image = $args['url'];
		}
		return $image;
	}
    /**
     * Get all menu
     */
    public static function get_all_menus() {
        $args = array(
            'hide_empty' => true,
        );
        $menus   = get_terms( 'nav_menu', $args );
        $results = array();
        foreach ( $menus as $key => $menu ) {
            $results[ $menu->slug ] = $menu->name;
        }
        $results[''] = esc_html__( 'Default Menu', 'themebase' );
        return $results;
    }

	public static function get_animation_list( $args = array() ) {
		return array(
			'none'             	=> esc_html__( 'None', 'themebase' ),
			'fadeIn'          	=> esc_html__( 'Fade In', 'themebase' ),
			'fadeInUp'          => esc_html__( 'Fade In Up', 'themebase' ),
			'fadeInDown'        => esc_html__( 'Fade In Down', 'themebase' ),
			'fadeInLeft'        => esc_html__( 'Fade In Left', 'themebase' ),
			'fadeInRight'       => esc_html__( 'Fade In Right', 'themebase' ),
			'pulse'         	=> esc_html__( 'Pulse', 'themebase' ),
			'lightSpeedIn' 		=> esc_html__( 'LightSpeedIn', 'themebase' ),
			'zoomIn'            => esc_html__( 'Zoom In', 'themebase' ),
			'zoomInDown'        => esc_html__( 'Zoom In Down ', 'themebase' ),
			'zoomInLeft'        => esc_html__( 'Zoom In Left', 'themebase' ),
			'zoomInRight'       => esc_html__( 'Zoom In Right', 'themebase' ),
		);
	}
	
	public static function get_footer_list( $default_option = false ) {

		$footers = array(
			'none' => esc_html__( 'Hide', 'themebase' ),
			'01'   => esc_html__( 'Footer 1', 'themebase' ),
			'02'   => esc_html__( 'Footer 2', 'themebase' ),
			'03'   => esc_html__( 'Footer 3', 'themebase' ),
			'04'   => esc_html__( 'Footer 4', 'themebase' ),
			'05'   => esc_html__( 'Footer 5', 'themebase' ),
			'06'   => esc_html__( 'Footer 6', 'themebase' ),
			'07'   => esc_html__( 'Footer 7', 'themebase' ),
		);

		if ( $default_option === true ) {
			$footers = array( '' => esc_html__( 'Default', 'themebase' ) ) + $footers;
		}

		return $footers;
	}
	

    public static function get_coming_soon_demo_date() {
        $date = date( 'm/d/Y', strtotime( '+2 months', strtotime( date( 'Y/m/d' ) ) ) );

        return $date;
    }

    public static function the_date( $date_string ) {
		$date_format = get_option( 'date_format' );
		echo date( $date_format, strtotime( $date_string ) );
	}
	public static function w3c_iframe( $iframe ) {
		$iframe = str_replace( 'frameborder="0"', '', $iframe );
		$iframe = str_replace( 'frameborder="no"', '', $iframe );
		$iframe = str_replace( 'scrolling="no"', '', $iframe );
		$iframe = str_replace( 'gesture="media"', '', $iframe );
		$iframe = str_replace( 'allow="encrypted-media"', '', $iframe );
		$iframe = str_replace( 'allowfullscreen', '', $iframe );

		return $iframe;
	}
}
