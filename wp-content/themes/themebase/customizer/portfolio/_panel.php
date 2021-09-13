<?php
$panel    = 'portfolio';
$priority = 1;
Themebase_Kirki::add_section( 'portfolio_archive', array(
    'title'    => esc_html__( 'Portfolio Archive', 'themebase' ),
    'panel'    => $panel,
    'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'portfolio_single', array(
    'title'    => esc_html__( 'Portfolio Single', 'themebase' ),
    'panel'    => $panel,
    'priority' => $priority ++,
) );