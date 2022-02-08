<?php

/** Stashed Out Theme Settings  **/

//Kirki::add_config( $config_id, $args );

Kirki::add_config( 'theme_config_id', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );

//Kirki::add_field( 'theme_config_id', $field_args );

Kirki::add_panel( 'panel_id', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Stashed Out Theme Options', 'kirki' ),
    'description' => esc_html__( 'My stashed out description', 'kirki' ),
) );

Kirki::add_section( 'header_section_id', array(
    'title'          => esc_html__( 'Header Options', 'kirki' ),
    'description'    => esc_html__( 'My header options section description.', 'kirki' ),
    'panel'          => 'panel_id',
    'priority'       => 160,
) );

Kirki::add_field( 'theme_config_id', [
    'type'        => 'background',
    'settings'    => 'background_setting',
    'label'       => esc_html__( 'Background Control', 'kirki' ),
    'description' => esc_html__( 'Background controls are pretty complex - but extremely useful if properly used.', 'kirki' ),
    'section'     => 'header_section_id',
    'default'     => [
        'background-color'      => 'rgba(20,20,20,.8)',
        'background-image'      => '',
        'background-repeat'     => 'repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll',
    ],
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => '#masthead',
        ],
    ],
]);