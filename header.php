<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<title><?php bloginfo('name') ?></title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/grid.css">
		<meta property="og:image" content="http://velvettrumpet.co.uk/media/images/VTlogo.png">
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
		<!--meta name="viewport" content="width=device-width, user-scalable=no"-->

		<?php wp_head(); ?>

		<script type="text/javascript">
			var html = document.getElementsByTagName("html")[0];
			if(html.className == "no-js") html.className = "js";
		</script>
	</head>	
	<body class="<?php if (is_front_page()) echo 'home-page'; if (get_the_title($ID) == 'Contact') echo 'contact-page'; ?>" >

		<header>
			<div class="header">
				<div class="main-hide">
					<div class="inner">
						<img src="<?php bloginfo('template_directory'); ?>/images/vt-logo.jpg" alt="Velvet Trumpet logo" class="vt-logo">
						<ul class="social list-inline">
							<li><a href="http://www.facebook.com/velvettrumpet" target="_blank"><span class="access">Go to our Facebook page</span><span class="icon facebook"></span></a></li>
							<li><a href="http://www.twitter.com/velvettrumpet" target="_blank"><span class="access">Go to our Twitter page</span><span class="icon twitter"></span></a></li>
							<li class="vt-logo"><span class="menu-trigger icon show-hide"></span></li>
							<li><a href="https://www.instagram.com/velvettrumpet" target="_blank"><span class="access">Go to our Instagram page</span><span class="icon instagram"></span></a></li>
							<li><a href="mailto:info@velvettrumpet.co.uk"><span class="access">Email us at info@velvettrumpet.co.uk</span><span class="icon mail"></span></a></li>
						</ul>
					</div>
				</div>
				<nav>
					<div class="nav">
						<?php wp_nav_menu( array('menu' => 'Main Nav' )); ?>
					</div>			
				</nav>
			</div>
		</header>