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
		<title><?php bloginfo('name'); ?> - <?php echo get_the_title($ID); ?></title>		
		<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/images/vt-logo.jpg">
		<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/images/vt-icon.png" />
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />	
		<meta name="viewport" content="width=device-width">
	
		<?php wp_head(); ?>

		<script type="text/javascript">
			var html = document.getElementsByTagName("html")[0].className;

			html = html.replace('no-js', 'js');
		</script>
	</head>	
	<body class="<?php if (is_front_page()) echo ' home-page'; if (get_the_title($ID) == 'Contact') echo ' contact-page'; ?>" >

		<header>
			<div class="header">
				<div class="main-hide">
					<ul class="social list-inline">
						<li><a href="http://www.facebook.com/velvettrumpet" target="_blank" title="Like us on Facebook"><span class="access">Go to our Facebook page</span><span class="icon facebook"></span></a></li>
						<li><a href="http://www.twitter.com/velvettrumpet" target="_blank" title="Follow us on Twitter"><span class="access">Go to our Twitter page</span><span class="icon twitter"></span></a></li>
						<li class="vt-logo"><span class="menu-trigger icon show-hide"></span></li>
						<li><a href="https://www.instagram.com/velvettrumpet" target="_blank" title="Follow us on Instagram"><span class="access">Go to our Instagram page</span><span class="icon instagram"></span></a></li>
						<li><a href="mailto:info@velvettrumpet.co.uk" title="Drop us an email"><span class="access">Email us at info@velvettrumpet.co.uk</span><span class="icon mail"></span></a></li>
					</ul>
					
					<a href="#" class="mob-menu">
						<span class="access">Show menu</span>
						<i class="icon"></i>
					</a>
					<nav>
						<div class="menu-main-nav-container">
							<?php wp_nav_menu(array('menu' => 'Main Nav', 'container'=>0)); ?>
						
							<ul class="social list-inline">
								<li><a href="http://www.facebook.com/velvettrumpet" target="_blank" title="Like us on Facebook"><span class="access">Go to our Facebook page</span><span class="icon facebook"></span></a></li>
								<li><a href="http://www.twitter.com/velvettrumpet" target="_blank" title="Follow us on Twitter"><span class="access">Go to our Twitter page</span><span class="icon twitter"></span></a></li>
								<li class="vt-logo"><span class="menu-trigger icon show-hide"></span></li>
								<li><a href="https://www.instagram.com/velvettrumpet" target="_blank" title="Follow us on Instagram"><span class="access">Go to our Instagram page</span><span class="icon instagram"></span></a></li>
								<li><a href="mailto:info@velvettrumpet.co.uk" title="Drop us an email"><span class="access">Email us at info@velvettrumpet.co.uk</span><span class="icon mail"></span></a></li>				
							</ul>
							<div class="tagline"><?php get_bloginfo('tagline'); ?></div>
						</div>		
					</nav>					
				</div>
			</div>
		</header>