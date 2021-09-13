<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
class Apr_Core_Search_Form extends Elementor\Widget_Base {

    public function apr_sc_searchform(){
        /* Add css */
        if (is_rtl()) {
            wp_enqueue_style( 'apr-sc-searchform', WP_PLUGIN_URL  . '/arrowpress-core/assets/css/search-form-rtl.min.css', array());
        }else{
            wp_enqueue_style( 'apr-sc-searchform', WP_PLUGIN_URL  . '/arrowpress-core/assets/css/search-form.min.css', array());
        }
    }

    public function get_name() {
        return 'apr-search-form';
    }

    public function get_title() {
        return __('APR Search Form', 'apr-core');
    }

    public function get_icon() {
        return 'eicon-site-search';
    }

    public function get_categories() {
        return ['apr-core'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'search_content',
            [
                'label' => __('Search Form', 'apr-core'),
            ]
        );

        if (\Elementor\apr_is_woocommerce_activated()):
            $this->add_control(
                'search_product_only',
                [
                    'label'   => __('Search only products', 'apr-core'),
                    'type'    => Controls_Manager::SWITCHER,
                    'default' => 'yes'

                ]);
        endif;

        $this->add_control(
            'skin',
            [
                'label'              => __('Skin', 'apr-core'),
                'type'               => Controls_Manager::SELECT,
                'default'            => 'classic',
                'options'            => [
                    'classic'     => __('Classic', 'apr-core'),
                    /*'minimal'     => __('Minimal', 'apr-core'),
                    'full_screen' => __('Full Screen', 'apr-core'),*/
                ],
                'prefix_class'       => 'elementor-search-form--skin-',
                'render_type'        => 'template',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'placeholder',
            [
                'label'   => __('Placeholder', 'apr-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Search', 'apr-core') . '...',
            ]
        );

        $this->add_control(
            'heading_button_content',
            [
                'label'     => __('Button', 'apr-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'skin' => 'classic',
                ],
            ]
        );

        $this->add_control(
            'button_type',
            [
                'label'        => __('Type', 'apr-core'),
                'type'         => Controls_Manager::SELECT,
                'default'      => 'icon',
                'options'      => [
                    'icon'      => __('Icon', 'apr-core'),
                    'text'      => __('Text', 'apr-core'),
                    'text_icon' => __('Text & Icon', 'apr-core'),
                ],
                'prefix_class' => 'elementor-search-form--button-type-',
                'render_type'  => 'template',
                'condition'    => [
                    'skin' => 'classic',
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'     => __('Text', 'apr-core'),
                'type'      => Controls_Manager::TEXT,
                'default'   => __('Search', 'apr-core'),
                'condition' => [
                    'button_type!' => 'icon',
                    'skin'         => 'classic',
                ],
            ]
        );

        $this->add_control(
            'size_minimal',
            [
                'label'     => __('Size', 'apr-core'),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__container'                                                                                 => 'min-height: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .elementor-search-form__submit'                                                                                    => 'min-width: {{SIZE}}{{UNIT}}',
                    'body:not(.rtl) {{WRAPPER}} .elementor-search-form__icon'                                                                       => 'padding-left: calc({{SIZE}}{{UNIT}} / 3)',
                    'body.rtl {{WRAPPER}} .elementor-search-form__icon'                                                                             => 'padding-right: calc({{SIZE}}{{UNIT}} / 3)',
                    '{{WRAPPER}} .elementor-search-form__input, {{WRAPPER}}.elementor-search-form--button-type-text .elementor-search-form__submit' => 'padding-left: calc({{SIZE}}{{UNIT}} / 3); padding-right: calc({{SIZE}}{{UNIT}} / 3)',
                ],
                'separator' => 'before',
                'condition' => [
                    'skin' => 'minimal',
                ],
            ]
        );

        $this->add_control(
            'toggle_button_content',
            [
                'label'     => __('Toggle', 'apr-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'skin' => 'full_screen',
                ],
            ]
        );

        $this->add_control(
            'icon_skin',
            [
                'label'     => __('Choose Icon', 'apr-core'),
                'type'      => Controls_Manager::ICON,
                'default'   => 'fa fa-search',
                'condition' => [
                    'button_type!' => 'text',
                ],
            ]
        );

        $this->add_control(
            'toggle_align',
            [
                'label'       => __('Alignment', 'apr-core'),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'default'     => 'center',
                'options'     => [
                    'flex-start' => [
                        'title' => __('Left', 'apr-core'),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center'     => [
                        'title' => __('Center', 'apr-core'),
                        'icon'  => 'eicon-h-align-center',
                    ],
                    'flex-end'   => [
                        'title' => __('Right', 'apr-core'),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} .elementor-search-form__toggle' => 'display: flex; justify-content: {{VALUE}}',
                ],
                'condition'   => [
                    'skin' => 'full_screen',
                ],
            ]
        );

        $this->add_control(
            'toggle_size',
            [
                'label'     => __('Size', 'apr-core'),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 33,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle i' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'skin' => 'full_screen',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_input_style',
            [
                'label' => __('Input', 'apr-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'icon_size_minimal',
            [
                'label'     => __('Icon Size', 'apr-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__icon' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'skin' => 'minimal',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'overlay_background_color',
            [
                'label'     => __('Overlay Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}.elementor-search-form--skin-full_screen .elementor-search-form__container' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'skin' => 'full_screen',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'input_typography',
                'selector' => '{{WRAPPER}} input[type="search"].elementor-search-form__input, {{WRAPPER}} input[type="search"].elementor-search-form__input::placeholder',
            ]
        );

        $this->add_responsive_control(
            'input_padding',
            [
                'label'      => __('Padding', 'apr-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} input[type="search"].elementor-search-form__input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'  => [
                    'skin' => 'classic',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_input_colors');

        $this->start_controls_tab(
            'tab_input_normal',
            [
                'label' => __('Normal', 'apr-core'),
            ]
        );

        $this->add_control(
            'input_text_color',
            [
                'label'     => __('Text Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__input,
                    {{WRAPPER}} .elementor-search-form__input::placeholder,
					{{WRAPPER}} .elementor-search-form__icon,
					{{WRAPPER}} .elementor-lightbox .dialog-lightbox-close-button,
					{{WRAPPER}} .elementor-lightbox .dialog-lightbox-close-button:hover,
					{{WRAPPER}}.elementor-search-form--skin-full_screen input[type="search"].elementor-search-form__input' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'      => 'input_background_color',
                'selector'  => '{{WRAPPER}} input[type="search"].elementor-search-form__input',
                'types'     => ['classic', 'gradient'],
                'condition' => [
                    'skin!' => 'full_screen',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'input_border',
                'selector' => '{{WRAPPER}} input[type="search"].elementor-search-form__input',
            ]
        );


        $this->add_control(
            'input_search_border_radius',
            [
                'label'      => __('Border Radius', 'apr-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-search-form__input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'           => 'input_box_shadow',
                'selector'       => '{{WRAPPER}} .elementor-search-form__container',
                'fields_options' => [
                    'box_shadow_type' => [
                        'separator' => 'default',
                    ],
                ],
                'condition'      => [
                    'skin!' => 'full_screen',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_input_focus',
            [
                'label' => __('Hover', 'apr-core'),
            ]
        );

        $this->add_control(
            'input_text_color_focus',
            [
                'label'     => __('Text Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}:not(.elementor-search-form--skin-full_screen) .elementor-search-form--focus .elementor-search-form__input,
					{{WRAPPER}} .elementor-search-form__input:hover,
					{{WRAPPER}} .elementor-search-form--focus .elementor-search-form__icon,
					{{WRAPPER}} .elementor-lightbox .dialog-lightbox-close-button:hover,
					{{WRAPPER}}.elementor-search-form--skin-full_screen input[type="search"].elementor-search-form__input:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'      => 'input_background_color_focus',
                'selector'  => '{{WRAPPER}} input[type="search"].elementor-search-form__input:focus',
                'types'     => ['classic', 'gradient'],
                'condition' => [
                    'skin!' => 'full_screen',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'input_border_focus',
                'selector' => '{{WRAPPER}} input[type="search"].elementor-search-form__input:focus',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'           => 'input_box_shadow_focus',
                'selector'       => '{{WRAPPER}} .elementor-search-form--focus .elementor-search-form__container',
                'fields_options' => [
                    'box_shadow_type' => [
                        'separator' => 'default',
                    ],
                ],
                'condition'      => [
                    'skin!' => 'full_screen',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_button_style',
            [
                'label'     => __('Button', 'apr-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'skin' => 'classic',
                ],
            ]
        );

        $this->add_control(
            'heading_style_button',
            [
                'label' => __('Style', 'apr-core'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_responsive_control(
            'button_width',
            [
                'label'     => __('Button Width', 'apr-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'skin' => 'classic',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'button_typography',
                'selector'  => '{{WRAPPER}} .elementor-search-form__submit span',
                
                'condition' => [
                    'button_type!' => 'icon',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_button_colors');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __('Normal', 'apr-core'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label'     => __('Text Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label'     => __('Background Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', 'apr-core'),
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
                'label'     => __('Text Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color_hover',
            [
                'label'     => __('Background Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_border_color_hover',
            [
                'label'     => __('Border Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_group_control(

            Group_Control_Border::get_type(),
            [
                'name'        => 'border_button_search',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .elementor-search-form__submit',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'button_search_border_radius',
            [
                'label'      => __('Border Radius', 'apr-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-search-form__submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_search_padding',
            [
                'label'      => __('Padding', 'apr-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-search-form__submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_search_margin',
            [
                'label'      => __('Margin', 'apr-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-search-form__submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_icon',
            [
                'label'     => __('Icon', 'apr-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'button_type!' => 'text',
                    'skin!'        => 'full_screen',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label'     => __('Icon Size', 'apr-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'button_type!' => 'text',
                    'skin!'        => 'full_screen',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_spacing',
            [
                'label'     => __('Icon Spacing', 'apr-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 15,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit i' => 'margin-right: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'button_type!' => 'text',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_toggle_style',
            [
                'label'     => __('Toggle', 'apr-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'skin' => 'full_screen',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_toggle_color');

        $this->start_controls_tab(
            'tab_toggle_normal',
            [
                'label' => __('Normal', 'apr-core'),
            ]
        );

        $this->add_control(
            'toggle_color',
            [
                'label'     => __('Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'toggle_background_color',
            [
                'label'     => __('Background Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle i' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_toggle_hover',
            [
                'label' => __('Hover', 'apr-core'),
            ]
        );

        $this->add_control(
            'toggle_color_hover',
            [
                'label'     => __('Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle:hover' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'toggle_background_color_hover',
            [
                'label'     => __('Background Color', 'apr-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle i:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'toggle_icon_size',
            [
                'label'     => __('Icon Size', 'apr-core'),
                'type'      => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle i:before' => 'font-size: calc({{SIZE}}em / 100)',
                ],
                'condition' => [
                    'skin' => 'full_screen',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'toggle_border_width',
            [
                'label'     => __('Border Width', 'apr-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle i' => 'border-width: {{SIZE}}{{UNIT}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'toggle_border_radius',
            [
                'label'      => __('Border Radius', 'apr-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-search-form__toggle i' => 'border-radius: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $this->apr_sc_searchform();
        $settings = $this->get_settings();
        $this->add_render_attribute(
            'input', [
                'placeholder' => $settings['placeholder'],
                'class'       => 'elementor-search-form__input search-ajax',
                'type'        => 'search',
                'name'        => 's',
                'title'       => __('Search', 'apr-core'),
                'autocomplete'       => __('off', 'apr-core'),
                'value'       => get_search_query(),
            ]
        );

        // Set the selected icon.
        if ('icon' == $settings['button_type']) {
            $icon_class = 'search';

            if ('arrow' == $settings['icon_skin']) {
                $icon_class = is_rtl() ? 'arrow-left' : 'arrow-right';
            }

            $this->add_render_attribute('icon', [
                'class' => 'fa fa-' . $icon_class,
            ]);
        }
        ?>
        <form class="apr-searchform elementor-search-form" role="search" action="<?php echo home_url(); ?>" method="get">
            <?php if ('full_screen' === $settings['skin']) : ?>
                <div class="elementor-search-form__toggle">
                    <i class="<?php echo $settings['icon_skin']; ?>" aria-hidden="true"></i>
                </div>
            <?php endif; ?>

            <div class="elementor-search-form__container">
                <?php if ('minimal' === $settings['skin']) : ?>
                    <div class="elementor-search-form__icon">
                        <i class="<?php echo $settings['icon_skin']; ?>" aria-hidden="true"></i>
                    </div>
                <?php endif; ?>
                <input <?php echo $this->get_render_attribute_string('input'); ?>>
                <?php if (\Elementor\apr_is_woocommerce_activated() && $settings['search_product_only'] == 'yes'): ?>
                    <input type="hidden" name="post_type" value="product"/>
                <?php endif; ?>
                <?php if ('classic' === $settings['skin']) : ?>
                    <button class="elementor-search-form__submit" type="submit">
                        <?php if ('icon' === $settings['button_type']) : ?>
                            <i class="<?php echo $settings['icon_skin']; ?>" aria-hidden="true"></i>
                        <?php elseif ('text' === $settings['button_type']) : ?>
                            <span><?php echo $settings['button_text']; ?></span>
                        <?php elseif ('text_icon' === $settings['button_type']) : ?>
                            <i class="<?php echo $settings['icon_skin']; ?> align-middle" aria-hidden="true"></i>
                            <span class="align-middle"><?php echo $settings['button_text']; ?></span>
                        <?php endif; ?>
                    </button>
                <?php endif; ?>
                <?php if ('full_screen' === $settings['skin']) : ?>
                    <div class="dialog-lightbox-close-button dialog-close-button">
                        <i class="eicon-close" aria-hidden="true"></i>
                        <span class="elementor-screen-only"><?php esc_html_e('Close', 'apr-core'); ?></span>
                    </div>
                <?php endif ?>
            </div>
        </form>

        <div class="search-results-wrapper"></div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Apr_Core_Search_Form);
