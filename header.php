<?php
/**
 * The header for our theme
 * @package tahiti
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"> 
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="grid-container">
	<!-- HEADER -->
	<nav class="top-bar topbar-responsive">
	<div class="top-bar-title">
		<span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
		<button class="menu-icon" type="button" data-toggle></button>
		</span>
		<?php the_custom_logo(); ?>  <a class="topbar-responsive-logo logo-title-block" href="<?php echo get_home_url(); ?>"><?php the_field("current_page_title_header"); ?></a>
	</div>
	<div id="topbar-responsive" class="topbar-responsive-links">
		<div class="top-bar-right">
		<?php wp_nav_menu(
				array(
					"theme_location"=>"header_nav",
					"menu_class"=>"menu simple vertical medium-horizontal",
					"depth"=>"1", 
		))?>
		</div>
	</div>
	</nav>
</header>