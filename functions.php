<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 11);
function theme_enqueue_styles()
{
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css');
}

function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );
}
add_action('init', 'register_my_menus');

// Hook admin


add_filter('wp_nav-menu_items', 'add_admin_menu', 10, 2);

function add_admin_menu($items, $args) {
    // Vérifier si utilisateur est connecté
    if (is_user_logged_in() && $args->theme_location == 'header-menu') {
        // Donner accès à un menu admin et l'URL du tableau de bord WP et afficher le lien dans le menu
        $items .= '<li><a href="'. get_admin_url('http://planty2.local/wp-admin/') .'">Admin</a></li>';
    }
    return $items;
    // Sinon, pas d'affichage du menu et lien admin
    
}

