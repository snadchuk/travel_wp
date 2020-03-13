<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="header-menu">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-md">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a>
                <div class="collapse navbar-collapse" id="navbarDropdown">
                    <?php
                    wp_nav_menu( array(
                        'theme_location'  => 'navbar',
                        'container'       => false,
                        'menu_class'      => '',
                        'fallback_cb'     => '__return_false',
                        'items_wrap'      => '<ul id="%1$s" class="navbar-nav mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
                        'depth'           => 2,
                        'walker'          => new bootstrap_4_walker_nav_menu()
                    ) );
                    ?>
                    <?php get_template_part('searchform'); ?>
                    <a href="#" class="navbar-login">Login</a>
                </div>
            </nav>
        </div>
    </div>
</div>



