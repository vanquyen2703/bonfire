<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Themebase_Enqueue' ) ) {
	class Themebase_Enqueue {
		protected static $instance = null;
		public function __construct() {
			add_action('after_setup_theme', array($this,'setup'));
			add_action('admin_enqueue_scripts', array($this,'admin_scripts_css'));
			add_action('wp_enqueue_scripts', array($this,'scripts_js'));
			add_filter('tiny_mce_before_init', array( $this, 'override_mce_options'));
		}
		public function setup() {
			// Make theme available for translation.
			load_theme_textdomain('themebase', get_template_directory() . '/languages');
			// Theme editor style
			add_editor_style( array( 'style.css' ) );
			// Add theme support
			add_theme_support('automatic-feed-links');
			add_theme_support( 'title-tag' );  
			/*
			 * Enable support for Post Formats.
			 *
			 * See: https://codex.wordpress.org/Post_Formats
			 */
			add_theme_support( 'post-formats', array(
				'image', 'video', 'audio', 'quote', 'link', 'gallery'
			) );
			// register menu locations
			register_nav_menus( array(
				'primary' => esc_html__('Primary Menu', 'themebase'),
			));
			// Enable custom background image option
			add_theme_support( 'custom-background' );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
		public function admin_scripts_css() {
			// Register & enqueue admin script
			wp_enqueue_media();
			wp_enqueue_style( 'wp-color-picker');
			wp_enqueue_script( 'wp-color-picker');
			wp_register_script('themebase-admin-js', THEMEBASE_JS . '/un-minify/admin.js', array('common', 'jquery', 'media-upload', 'thickbox'), THEMEBASE_THEME_VERSION, true);
			wp_enqueue_script('themebase-admin-js');

		}
		public function scripts_js() {
			if(!is_admin()){
				global $wp_styles, $wp_query, $wp_scripts;
				$themebase_woo_enable = $themebase_is_product_enable = $themebase_is_cart = $themebase_fancybox_enable = $themebase_rtl = $post_content = $shop_list = $themebase_slick_enable = $themebase_valid_form = $themebase_animation = $product_list_mode = $themebase_number_cate = '';
				$themebase_scripts = array_map('basename', (array) wp_list_pluck($wp_scripts->registered, 'src') );
				$themebase_suffix  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min'; 
				$themebase_srcs = array_map('basename', (array) wp_list_pluck($wp_styles->registered, 'src') );    
				function themebase_fonts_url() {
					$font_url = '';
					$fonts     = array();
					$subsets   = 'latin,latin-ext';
					$themebase_breadcrumbs_font = get_post_meta(get_the_ID(),'breadcrumbs_font',true);
					/*
					Translators: If there are characters in your language that are not supported
					by chosen font(s), translate this to 'off'. Do not translate into your own language.
					 */
					if ( 'off' !== _x( 'on', 'Google font: on or off', 'themebase' ) ) {
						$fonts[] = 'Jost'.':300,400,400i,500,500i,600,700,700i,800,900&display=swap';
					}
					/*
					 * Translators: To add an additional character subset specific to your language,
					 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
					 */
					$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'themebase' );
					if ( 'cyrillic' == $subset ) {
						$subsets .= ',cyrillic,cyrillic-ext';
					} elseif ( 'greek' == $subset ) {
						$subsets .= ',greek,greek-ext';
					} elseif ( 'devanagari' == $subset ) {
						$subsets .= ',devanagari';
					} elseif ( 'vietnamese' == $subset ) {
						$subsets .= ',vietnamese';
					}
					if ( $fonts ) {
						$font_url = add_query_arg( array(
							'family' => urlencode( implode( '|', $fonts ) ),
							'subset' => urlencode( $subsets ),
						), '//fonts.googleapis.com/css' );
					}
					return esc_url_raw($font_url);
				}
				if(class_exists('WooCommerce')){
					$themebase_woo_enable = 'yes';
					$shop_list = is_product_category();
					$cat = $wp_query->get_queried_object();
					if(isset($cat->term_id)){
						$woo_cat = $cat->term_id;
					}else{
						$woo_cat = '';
					}  
					$product_list_mode = get_metadata('product_cat', $woo_cat, 'list_mode_product', true); 
					$themebase_number_cate = Themebase::setting( 'number_cate' );
					if(is_single() && 'product' == get_post_type()){
						$themebase_is_product_enable = 'yes';
					}
					if(is_cart()){
						$themebase_is_cart = 'yes';
					}
				}
                $coming_soon_countdown = Themebase::setting('coming_soon_countdown');
                $single_product_prev = Themebase::setting('single_product_prev');
                $single_product_next = Themebase::setting('single_product_next');
                $single_per_limit = Themebase::setting('per_limit');
                $single_ajax_add_to_cart = Themebase::setting('single_ajax_cart');
                $popup_newsletter_show = Themebase::setting('popup_newsletter_show');
                $single_zoom_image = Themebase::setting('single_zoom_image');
				if ( is_singular() && get_option( 'thread_comments' ) ) {
					wp_enqueue_script( 'comment-reply' );
				}
				/* Register Script */
					wp_register_script('popper', get_template_directory_uri() . '/assets/js/popper'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('swiper', get_template_directory_uri() . '/assets/js/swiper'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('fullpage', get_template_directory_uri() . '/assets/js/fullpage'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('validate', get_template_directory_uri() . '/assets/js/jquery.validate'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION);
					wp_register_script('themebase-scripts', get_template_directory_uri() . '/assets/js/un-minify/theme_function'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('slimscroll-scripts', get_template_directory_uri() . '/assets/js/jquery.slimscroll'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('countdown-scripts', get_template_directory_uri() . '/assets/js/jquery.countdown'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('sticky-kit', get_template_directory_uri() . '/assets/js/sticky-kit'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('cascade-slider', get_template_directory_uri() . '/assets/js/cascade-slider'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
					wp_register_script('elevatezoom', get_template_directory_uri() . '/assets/js/jquery.elevatezoom'.esc_html($themebase_suffix).'.js', array('jquery'), THEMEBASE_THEME_VERSION, true);
				/* Register Styles*/
					wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/plugin/bootstrap'.esc_html($themebase_suffix).'.css?ver=' . THEMEBASE_THEME_VERSION);     
					wp_register_style('font-awesome-theme', get_template_directory_uri() . '/assets/css/font-awesome'.esc_html($themebase_suffix).'.css?ver=' . THEMEBASE_THEME_VERSION);
					wp_register_style('themebase', get_template_directory_uri() . '/assets/css/themebase'.esc_html($themebase_suffix).'.css?ver=' . THEMEBASE_THEME_VERSION);
					wp_register_style('fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox'.esc_html($themebase_suffix).'.css?ver=' . THEMEBASE_THEME_VERSION);
					wp_register_style('slick', get_template_directory_uri() . '/assets/css/plugin/slick'.esc_html($themebase_suffix).'.css?ver=' . THEMEBASE_THEME_VERSION);
					wp_register_style('swiper', get_template_directory_uri() . '/assets/css/plugin/swiper'.esc_html($themebase_suffix).'.css?ver=' . THEMEBASE_THEME_VERSION);
					wp_register_style('fullpage', get_template_directory_uri() . '/assets/css/fullpage'.esc_html($themebase_suffix).'.css?ver=' . THEMEBASE_THEME_VERSION);
					wp_register_style('themebase-theme', get_template_directory_uri() . '/assets/css/theme'.esc_html($themebase_suffix).'.css?ver=' . THEMEBASE_THEME_VERSION);
					wp_register_style( 'themebase-style', get_template_directory_uri() . '/style.css' );
					wp_deregister_style('font-awesome');
					wp_deregister_style('yith-wcwl-font-awesome'); 
					
					
					if (Themebase::setting( 'custom_css_enable' ) == 1) {
						wp_add_inline_style( 'themebase-style', html_entity_decode( Themebase::setting( 'custom_css' ), ENT_QUOTES ) );
					}
					if ( Themebase::setting( 'custom_js_enable' ) == 1 ) {
						wp_add_inline_script( 'themebase-scripts', html_entity_decode( Themebase::setting( 'custom_js' ) ) );
					}
				/* Enqueue Styles & Script */
					wp_enqueue_style('bootstrap');
					wp_enqueue_style('font-awesome-theme'); 
                    wp_enqueue_style('themebase-fonts', themebase_fonts_url(), array(), null );
					wp_enqueue_style('themebase');
					if (is_rtl()) {
		                wp_enqueue_style('themebase-theme-rtl', get_template_directory_uri() . '/assets/css/theme_rtl'.esc_html($themebase_suffix).'.css?ver=' . THEMEBASE_THEME_VERSION);
		            }else{
		                wp_enqueue_style('themebase-theme', get_template_directory_uri() . '/assets/css/theme'.esc_html($themebase_suffix).'.css?ver=' . THEMEBASE_THEME_VERSION);
		            }
					wp_enqueue_style('slick');
					wp_enqueue_style('swiper');
					wp_enqueue_style('themebase-style' );
					// Animation
					$themebase_animation = 'yes';
					if(get_the_ID()!=''){
                        // Fancybox
                        $themebase_fancybox_enable = 'yes';
                        wp_enqueue_script('fancybox');
                        wp_enqueue_style('fancybox');
					}      
					if( post_type_supports( get_post_type(), 'comments' ) ) {
						if( comments_open() ) {
							$themebase_valid_form = 'yes';
							wp_enqueue_script('validate');
						}
					}   
					wp_enqueue_script('popper');
					wp_enqueue_script('bootstrap');
					wp_enqueue_script('slick');
					wp_enqueue_script('fullpage');
					wp_enqueue_script('swiper');
					wp_enqueue_style('slick');
					wp_enqueue_style('swiper');
					wp_enqueue_style('fullpage');
					wp_enqueue_script('cascade-slider');
					wp_enqueue_script('jquery-ui-autocomplete' );   
					wp_enqueue_script('isotope');
					wp_enqueue_script('themebase-scripts');
					wp_enqueue_script('countdown-scripts');
					wp_enqueue_script('slimscroll-scripts');
					wp_enqueue_script('sticky-kit');
					if($single_zoom_image == 1 && (is_single() && 'product' == get_post_type())){
						wp_enqueue_script('elevatezoom');
					}
					wp_localize_script('themebase-scripts', 'themebase_params', array(
						'ajax_url' => esc_js(admin_url( 'admin-ajax.php' )),
						'ajax_loader_url' => esc_js(str_replace(array('http:', 'https'), array('', ''), THEMEBASE_CSS . '/assets/images/ajax-loader.gif')),
						'ajax_cart_added_msg' => esc_html__('A product has been added to cart.', 'themebase'),
						'ajax_compare_added_msg' => esc_html__('A product has been added to compare', 'themebase'),
						'type_product' => $product_list_mode,
						'shop_list' => $shop_list,
						'themebase_number_cate' => esc_js($themebase_number_cate),
						'themebase_woo_enable'=> esc_js($themebase_woo_enable),
						'themebase_is_product_enable'=> esc_js($themebase_is_product_enable),
						'themebase_is_cart'=> esc_js($themebase_is_cart),
						'themebase_fancybox_enable' => esc_js($themebase_fancybox_enable),
						'themebase_slick_enable' => esc_js($themebase_slick_enable),
						'themebase_valid_form' => esc_js($themebase_valid_form),
						'themebase_animation' => esc_js($themebase_animation),
						'coming_soon_countdown' => esc_js($coming_soon_countdown),
						'single_product_prev' => esc_js($single_product_prev),
						'single_product_next' => esc_js($single_product_next),
						'single_per_limit' => esc_js($single_per_limit),
						'single_ajax_add_to_cart' => esc_js($single_ajax_add_to_cart),
						'single_zoom_image' => esc_js($single_zoom_image),
                        'popup_newsletter_show' => esc_js($popup_newsletter_show),
						'themebase_rtl' => esc_js(is_rtl()?'yes':''),
						'themebase_search_no_result' => esc_js(__('Search no result','themebase')),
						'themebase_like_text' => esc_js(__('Like','themebase')),
						'themebase_unlike_text' => esc_js(__('Unlike','themebase')),
						'request_error' => esc_js(__('The requested content cannot be loaded.<br/>Please try again later.', 'themebase')),
					));    
				wp_deregister_style('wpcr_font-awesome');
			}
		}
		public function override_mce_options($initArray) {
			$opts = '*[*]';
			$initArray['valid_elements'] = $opts;
			$initArray['extended_valid_elements'] = $opts;
			return $initArray;
		} 
	}
	new Themebase_Enqueue();
}