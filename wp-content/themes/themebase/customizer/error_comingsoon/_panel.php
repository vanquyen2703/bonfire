<?php
$panel    = 'error_comingsoon';
$priority = 1;
Themebase_Kirki::add_section( 'error404_page', array(
    'title'    => esc_html__( '404 Page', 'themebase' ),
    'panel'    => $panel,
    'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'comingsoon', array(
    'title'    => esc_html__( 'Coming Soon', 'themebase' ),
    'panel'    => $panel,
    'priority' => $priority ++,
) );