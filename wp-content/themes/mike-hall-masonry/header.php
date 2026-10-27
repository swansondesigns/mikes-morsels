<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600|Give+You+Glory|Architects+Daughter|Just+Me+Again+Down+Here|Loved+by+the+King' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title('&#124;', true, 'right'); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- logo and navigation -->

	<nav id="site-navigation" class="main-nav" role="navigation">
		<div id="main-nav-wrapper">
			<div id="logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">

					<?php $pinbin_options = get_option('theme_pinbin_options'); ?>

					<div id="logo">
						<img src="/wp-content/uploads/2026/01/logo-mh.png" />
					</div>
				</a>

			</div>
			<?php if (has_nav_menu('main_nav')) { ?>
				<?php wp_nav_menu(array('theme_location' => 'main_nav')); ?>
			<?php } else { ?>
				<ul><?php wp_list_pages("depth=3&title_li=");  ?></ul>
			<?php } ?>

		</div>
	</nav>
	<div class="clear"></div>
	<div id="wrap">
		<div id="header"></div>