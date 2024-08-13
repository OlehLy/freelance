<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title> <?php echo wp_get_document_title() ?></title>
	<?php
        wp_head();
    ?>
</head>
<body>

	<!-- Header. -->
	<header class="header">
		<div class="bone">
			<div class="header_net __flex-center">
					<?php the_custom_logo(); ?>
               <?php
wp_nav_menu( array(
    'theme_location' => 'header-menu',
    'container' => 'nav',
    'container_class' => 'header_nav __anim',
    'container_id' => 'nav-desktop',
    'items_wrap' => '<ul>%3$s</ul>',
    'link_before' => '<a onclick="bar_close();">',
    'link_after' => '</a>',
) );
?>

				<div class="header_burger" onclick="bar_toggle();">
					<div>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
					<p>Menu</p>
				</div>
			</div>
		</div>
	</header>
   <div class="bar">
		<div class="bar_net __flex">
			<div class="bar_nav" id="nav-table"></div>
		</div>
	</div>
	<!-- Header. -->