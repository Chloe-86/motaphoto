<?php
function portfolio_register_assets()
{

    // Déclarer jQuery
    wp_enqueue_script('jquery');

    // Déclarer mon JS
    wp_enqueue_script(
        'monscript',
        get_template_directory_uri() . 'assets/js/script.js',
        array('jquery'),
        '1.0',
        true
    );
    // Déclarer le JS de la lightbox
    wp_enqueue_script(
        'lightbox',
        get_template_directory_uri() . 'assets/js/lightbox.js',
        array(),
        '1.0',
        true
    );
    // Déclarer le JS de l'ajax
    wp_enqueue_script(
        'ajax',
        get_template_directory_uri() . 'assets/js/ajax.js',
        array('jquery'),
        '1.0',
        true
    );

    // Déclarer le fichier style.css à la racine du thème
    wp_enqueue_style(
        'style',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );

    // Déclarer le fichier CSS à un autre emplacement
    wp_enqueue_style(
        'monstyle',
        get_template_directory_uri() . '/assets/sass/main.css',
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'portfolio_register_assets');

function theme_register_menus() {

    register_nav_menus(array(
        'main' => 'Menu Principal',
        'footer' => 'Bas de page',
    ));
    
    add_theme_support('custom-logo');
    
    add_theme_support('post-thumbnails');
    }
    
    add_action( 'after_setup_theme', 'theme_register_menus' );
    
    