<?php
namespace Elementor;
use Elementor\Controls_Manager;
use Elementor\Repeater;
if ( ! defined( 'ABSPATH' ) ) exit;
class Apr_Core_Slides_partner extends Widget_Base {

	public function get_name() {
        return 'apr-slide-partner';
    }
    public function get_categories() {
        return array( 'apr-core' );
    }
	public function get_title() {
        return __( ' APR Slides Partner', 'apr-core' );
    }

	public function get_icon() {
        return 'eicon-slider-album';
    }
    public static function get_button_sizes() {
        return [
            'xs' => __( 'Extra Small', 'apr-core' ),
            'sm' => __( 'Small', 'apr-core' ),
            'md' => __( 'Medium', 'apr-core' ),
            'lg' => __( 'Large', 'apr-core' ),
            'xl' => __( 'Extra Large', 'apr-core' ),
        ];
    }
    public static function get_animation_options() {
        return [
            ''              => __( 'None', 'apr-core' ),
            'fadeInDown'    => __( 'FadeInDown', 'apr-core' ),
            'fadeInUp'      => __( 'FadeInUp', 'apr-core' ),
            'fadeInRight'   => __( 'FadeInRight', 'apr-core' ),
            'fadeInLeft'    => __( 'FadeInLeft', 'apr-core' ),
            'fadeInDownBig'    => __( 'FadeInDownBig', 'apr-core' ),
            'fadeInLeftBig'    => __( 'FadeInLeftBig', 'apr-core' ),
            'fadeInRightBig'   => __( 'FadeInRightBig', 'apr-core' ),
            'fadeInUpBig'      => __( 'FadeInUpBig', 'apr-core' ),
            'lightSpeedIn'     => __( 'LightSpeedIn', 'apr-core' ),
            'lightSpeedOut'    => __( 'LightSpeedOut', 'apr-core' ),
            'zoomIn'           => __( 'Zoom', 'apr-core' ),
            'zoomInDown'       => __( 'ZoomInDown', 'apr-core' ),
            'zoomInLeft'       => __( 'ZoomInLeft', 'apr-core' ),
            'zoomInRight'      => __( 'ZoomInRight', 'apr-core' ),
            'zoomInUp'         => __( 'ZoomInUp', 'apr-core' ),
            'pulse'         => __( 'Pulse', 'apr-core'),
            'bounceIn'      => __( 'BounceIn', 'apr-core'),
            'bounceInDown'  => __( 'BounceInDown', 'apr-core'),
            'bounceInLeft'  => __( 'BounceInLeft', 'apr-core'),
            'bounceInRight' => __( 'BounceInRight', 'apr-core'),
            'bounceInUp'    => __( 'BounceInUp', 'apr-core'),
            'rotateIn'      => __( 'RotateIn', 'apr-core'),
            'rotateInDownLeft'      => __( 'RotateInDownLeft', 'apr-core'),
            'rotateInDownRight'     => __( 'RotateInDownRight', 'apr-core'),
            'rotateInUpLeft'        => __( 'RotateInUpLeft', 'apr-core'),
            'rotateInUpRight'       => __( 'RotateInUpRight', 'apr-core'),
            'slideInUp'             => __( 'SlideInUp', 'apr-core'),
            'slideInDown'           => __( 'SlideInDown', 'apr-core'),
            'slideInLeft'           => __( 'SlideInLeft', 'apr-core'),
            'slideInRight'          => __( 'SlideInRight', 'apr-core'),
            'JackInTheBox'          => __( 'JackInTheBox', 'apr-core'),
        ];
    }

	public function get_script_depends() {}

	public function get_style_depends() {}

	protected function _register_controls() {}

	 /**
     * Render slides widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $this->apr_sc_slides_partner();
        $settings = $this->get_settings();

        if ( empty( $settings['slides'] ) ) {
            return;
        }
        $slides = [];
        $slide_count = 0;
        foreach ( $settings['slides'] as $slide ) {
            $slide_html = $slide_attributes = $btn_attributes = '';
            $slide_html .= '<div class="cascade-slider_img">';
                if ($slide['image']['url']) {
                    $image_url = $slide['image']['url'];
                    $image_html = '<img src="' . esc_attr($image_url) . '" alt="' . esc_attr('img-slide', 'apr-core') . '" />';
                    $slide_html .= '<div class="slide-image">' . $image_html . '</div>';
                }
                if ( $slide['heading'] ) {
                    $slide_html .= '<div class="elementor-slide-heading">'. $slide['before_heading'].' <span class="cascade-slider-heading">' . $slide['heading'] .'</span></div>';
                }
            $slide_html .= '</div>';
            $slide_html .= '<div class="cascade-slider-content">';
                if ( $slide['desc_heading'] ) {
                    $slide_html .= '<p class="desc-heading">'. $slide['desc_heading'] .'</p>';
                }
            $slide_html .= '</div>';
           
            $slides[] = '<div class=" cascade-slider_item elementor-repeater-item-' . $slide['_id'] . ' ">' . $slide_html . '</div>';

            $slide_count++;
        }
        $is_rtl = is_rtl();
        
       
        $id =  'apr-slider-'.wp_rand();

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Apr_Core_Slides_Partner );