<?php 
include 'twitter.php';
	$tweets = $twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=velvettrumpet&count=5');
	$GLOBALS['$mentions'] = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=joyVT&count=10');

	$curl = curl_init();
	curl_setopt_array($curl, array(
    		CURLOPT_RETURNTRANSFER => 1,
    		CURLOPT_URL => 'https://api.instagram.com/v1/users/237397623/media/recent/?access_token=237397623.f60051c.7a28167c2a974f7785e75e1c4ae3232b&count=10'
	));
	$result = curl_exec($curl);
	curl_close($curl);
	$feed = json_decode($result);
?>

		<footer>
			<div class="footer">
				<div class="inner">
					<div class="tweets">
						<h2 class="access">Twitter feed</h2>							
						<ul class="slideshow">					
							<?php 
							
								foreach ($tweets as $key => $value) {
									if ($key == 0) echo '<li class="show">';
									else echo '<li>';
									echo '<a href="https://twitter.com/velvettrumpet/status/'.$value->id_str.'" target="_blank">'.$value->text.'</a></li>';
								}
							?>
						</ul>
						<a href="http://twitter.com/velvettrumpet" target="_blank" title="Follow us on Twitter">
							<span class="access">Follow us on Twitter</span>
							<span class="icon twitter"></span>
						</a>
					</div>
					<div class="other">
						<h2 class="access">menu</h2>
						<?php wp_nav_menu(array('menu' => 'Main Nav', 'container'=>0)); ?>
					</div>
					<div class="copywrite">
						<p>
							&copy; Velvet Trumpet <?php echo date("Y"); ?> </br>
							14 Winchelsea House, Swan Road, Rotherhithe, London, SE16 4LH
						</p>
						<img class="itc-logo" srcset="<?php bloginfo('template_directory'); ?>/images/itc_logo.jpg, <?php bloginfo('template_directory'); ?>/images/itc_logo@2x.jpg 2x">				
					</div>
					<?php apply_filters( 'woocommerce_product_add_to_cart_url', get_permalink( 634 ), $this );?>					
				</div>
			</div>
		</footer>	
		<?php wp_footer(); ?> 			
	</body>
</html>