<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the page header div.
 *
 * @package Neve
 * @since   1.0.0
 */
?><!DOCTYPE html>
<?php

/**
 * Filters the header classes.
 *
 * @param string $header_classes Header classes.
 *
 * @since 2.3.7
 */
$header_classes = apply_filters( 'nv_header_classes', 'header' );

/**
 * Fires before the page is rendered.
 */
do_action( 'neve_html_start_before' );

?>
<html <?php language_attributes(); ?>>

<head>
	<?php
	/**
	 * Executes actions after the head tag is opened.
	 *
	 * @since 2.11
	 */
	do_action( 'neve_head_start_after' );
	?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<?php
	/**
	 * Executes actions before the head tag is closed.
	 *
	 * @since 2.11
	 */
	do_action( 'neve_head_end_before' );
	?>
</head>

<body  <?php body_class(); ?> <?php neve_body_attrs(); ?> >
<?php
/**
 * Executes actions after the body tag is opened.
 *
 * @since 2.11
 */
do_action( 'neve_body_start_after' );
?>
<?php wp_body_open(); ?>
<div class="wrapper">
	<?php
	/**
	 * Executes actions before the header tag is opened.
	 *
	 * @since 2.7.2
	 */
	do_action( 'neve_before_header_wrapper_hook' );
	?>

	<header class="<?php echo esc_attr( $header_classes ); ?>" <?php echo ( neve_is_amp() ) ? 'next-page-hide' : ''; ?> >
		<div class="css-logo" id="logo">
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img class="site-logo" src="<?php echo get_theme_mod('montheme_logo'); ?>" alt=""></a>
		</div>
		<nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
			<?php wp_nav_menu(array(
				'theme_location' => 'header-menu',
				'menu_class' => 'header-menu', // Classe CSS pour le menu
				
			)); ?>
		</nav>

	</header>



	
	<?php
/**
 * Executes actions after main tag is opened.
 *
 * @since 1.0.4
 */
do_action( 'neve_after_primary_start' );

