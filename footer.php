<?php 
include 'twitter.php';
	$tweets = $twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=velvettrumpet&count=5');
	$GLOBALS['$mentions'] = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=joyVT&count=10');

	// $curl = curl_init();
	// curl_setopt_array($curl, array(
 //    		CURLOPT_RETURNTRANSFER => 1,
 //    		CURLOPT_URL => 'https://api.instagram.com/v1/users/237397623/media/recent/?access_token=237397623.f60051c.7a28167c2a974f7785e75e1c4ae3232b&count=10'
	// ));
	// $result = curl_exec($curl);
	// curl_close($curl);
	// $feed = json_decode($result);
?>
		<footer>
			<div class="footer">
				<div class="inner">
					<div class="container ">
						<h2 class="sr-only">Twitter feed</h2>		
						<div class="carousel slide twitter-ticker" data-ride="carousel">
							<div class="carousel-inner" role="listbox">					
								<?php foreach ($tweets as $key => $value) { ?>
										<div class="item<?php if ($key === 0) echo ' active'; ?>">
											<div class="media">
												<a href="http://twitter.com/velvettrumpet" class="media-left">
													<img class="media-object no-shadow" src="<?php echo $value->user->profile_image_url_https; ?>" alt="Profile image">
												</a>
												<div class="media-body">
													<h4 class="media-heading"><?php echo $value->user->name; ?></h4>
													<a href="https://twitter.com/velvettrumpet/status/<?php echo $value->id_str; ?>" target="_blank">"<?php echo $value->text; ?>"</a></li>
													<div class="twitter-ticker__interacions">
														<span class="glyphicon glyphicon-refresh"></span><?php echo $value->retweet_count; ?>
														<span class="glyphicon glyphicon-heart"></span><?php echo $value->favorite_count; ?>														
													</div>
												</div>
											</div>
										</div>
								<?php } ?>
							</ul>
						</div>					
					</div>
					<h2 class="sr-only">menu</h2>
					<?php wp_nav_menu(array('menu' => 'Main Nav', 'menu_class' => 'list-unstyled menu clearfix')); ?>
					<div class="copywrite">
						<p>
							&copy; Velvet Trumpet <?php echo date("Y"); ?> </br>
							14 Winchelsea House, Swan Road, Rotherhithe, London, SE16 4LH
						</p>						
					</div>
					<img class="itc-logo" srcset="<?php bloginfo('template_directory'); ?>/images/itc_logo.jpg, <?php bloginfo('template_directory'); ?>/images/itc_logo@2x.jpg 2x">				
					<?php apply_filters( 'woocommerce_product_add_to_cart_url', get_permalink( 634 ), $this );?>					
				</div>
			</div>
		</footer>	
		<?php wp_footer(); ?> 			
	</body>
</html>