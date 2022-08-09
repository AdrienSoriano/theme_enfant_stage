<?php
/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
add_action( 'customize_register', 'gw_theme_customize_register' );

function gw_theme_customize_register($wp_customize)
{

    $wp_customize->add_panel('gwendoline_theme_option',
        array(
            'priority' => 100,
            'title' => __('Options du thème', 'gwendoline'),
            'descritption' => 'Permet de définir des éléments texte ou image du thème'
        )
    );
    /*** add section header_control ***/
    $wp_customize->add_section('gwendoline_section_header',
        array(
            'title' => __('Header', 'gwendoline_header'),
            'priority' => 1,
            'panel' => 'gwendoline_theme_option'
        )
    );

    $wp_customize->add_setting( 'gwendoline_image_logo', array(
        'default' => get_theme_file_uri('images/logo-gwendoline.png'), // Add Default Image URL
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gwendoline_image_logo',
        array(
        'label' => 'Télécharger le Logo',
        'priority' => 10,
        'section' => 'gwendoline_section_header',
        'settings' => 'gwendoline_image_logo',
        'button_labels' => array(// All These labels are optional
            'select' => 'Sélectionner un logo',
            'remove' => 'Supprimer le logo',
            'change' => 'Changer le Logo',
        )
    )));
}