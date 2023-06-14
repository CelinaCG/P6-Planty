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


add_filter('wp_nav_menu_items', 'add_admin_menu', 10, 2);

function add_admin_menu($items, $args) {
    // Vérifier si utilisateur est connecté
    if (is_user_logged_in() && $args->theme_location == 'header-menu') {
        // Donner accès à un menu admin et l'URL du tableau de bord WP et afficher le lien dans le menu
        $items .= '<li class="menu-nous-rencontrer menu-item"><a href="'. admin_url() .'">Admin</a></li>';
    }
    return $items;
    // Sinon, pas d'affichage du menu et lien admin
    
}

// Personnalisation du thème
function montheme_customize_register($wp_customize)
{
	// Ajout d'une section pour le logo personnalisé
	$wp_customize->add_section('montheme_logo_section', array(
		'title'      => __('Logo personnalisé', 'montheme'),
		'priority'   => 30,
	));

	// Ajout de la fonctionnalité de logo personnalisé
	$wp_customize->add_setting('montheme_logo');

	// Ajout du contrôle pour téléverser le logo personnalisé
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'montheme_logo', array(
		'label'    => __('Téléverser votre logo', 'montheme'),
		'section'  => 'montheme_logo_section',
		'settings' => 'montheme_logo',
	)));
}
add_action('customize_register', 'montheme_customize_register');
