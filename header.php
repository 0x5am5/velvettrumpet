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
		<title><?php bloginfo('name'); echo ' - ' . get_the_title($ID); ?></title>		
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
						<li class="hidden-xs">
							<a href="http://www.facebook.com/velvettrumpet" target="_blank" title="Like us on Facebook">
								<span class="sr-only">Go to our Facebook page</span>
								<span class="icon facebook"></span>
							</a>
						</li>
						<li class="hidden-xs">
							<a href="http://www.twitter.com/velvettrumpet" target="_blank" title="Follow us on Twitter">
								<span class="sr-only">Go to our Twitter page</span>
								<span class="icon twitter"></span>
							</a>
						</li>
						<li><span class="menu-trigger icon vt-logo show-hide"></span></li>
						<li class="hidden-xs">
							<a href="https://www.instagram.com/velvettrumpet" target="_blank" title="Follow us on Instagram">
								<span class="sr-only">Go to our Instagram page</span>
								<span class="icon instagram"></span>
							</a>
						</li>
						<li class="hidden-xs">
							<a href="mailto:info@velvettrumpet.co.uk" title="Drop us an email">
								<span class="sr-only">Email us at info@velvettrumpet.co.uk</span>
								<span class="icon mail"></span>
							</a>
						</li>
					</ul>
					
					<a href="#" class="mob-menu">
						<span class="glyphicon glyphicon-menu-hamburger"></span>
						<span class="glyphicon glyphicon-remove"></span>
						<span class="mob-menu-text">Menu</span>
					</a>
					<nav>
						
						<div class="menu-main-nav-container mobile-menu">
							<?php wp_nav_menu(array('menu' => 'Main Nav', 'container'=>0, 'menu_class' => 'list-inline list-unstyled')); ?>

							<div class="visible-xs-block">
								<ul class="social list-inline">
									<li>
										<a href="http://www.facebook.com/velvettrumpet" target="_blank" title="Like us on Facebook">
											<span class="sr-only">Go to our Facebook page</span>
											<span class="icon facebook"></span>
										</a>
									</li>
										<li>
											<a href="http://www.twitter.com/velvettrumpet" target="_blank" title="Follow us on Twitter">
												<span class="sr-only">Go to our Twitter page</span>
												<span class="icon twitter"></span>
											</a>
									</li>
										<li class="vt-logo"><span class="menu-trigger icon show-hide"></span></li>
										<li>
											<a href="https://www.instagram.com/velvettrumpet" target="_blank" title="Follow us on Instagram">
												<span class="sr-only">Go to our Instagram page</span>
												<span class="icon instagram"></span>
											</a>
									</li>
									<li>
										<a href="mailto:info@velvettrumpet.co.uk" title="Drop us an email">
											<span class="sr-only">Email us at info@velvettrumpet.co.uk</span>
											<span class="icon mail"></span>
										</a>
									</li>				
								</ul>
								<div class="tagline"><?php bloginfo('description'); ?></div>								
							</div>							
						</div>		
					</nav>					
				</div>
			</div>
		</header>