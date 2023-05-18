<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css');
}

function register_my_menus() {
    register_my_menus(
        array(
            'header-menu' => __('Header Menu')
        )
    );
}
add_action('init', 'register_my_menus');