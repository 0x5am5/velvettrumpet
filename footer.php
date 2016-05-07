<?php 
include 'twitter.php';
	$tweets = $twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=velvettrumpet&count=5');
	$GLOBALS['$mentions'] = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=joyVT&count=10');
?>
		<footer>
			<div class="footer">
				<div class="inner">
					<div class="container ">
						<h2 class="sr-only">Twitter feed</h2>		
						<div class="carousel slide twitter-ticker" data-ride="carousel">
							<div class="carousel-inner" role="listbox">					
								<?php foreach ($tweets as $key => $value) { ?>
									<?php $bg_image = $value->extended_entities->media[0]->media_url; ?>
										<div class="item<?php if ($key === 0) echo ' active'; ?>">
											<div class="media">
												<?php 
													if ($value->retweeted_status) :
														$name = $value->retweeted_status->user->name;
														$screen_name = $value->retweeted_status->screen_name;
														$text = $value->retweeted_status->text;
														$retweet = $value->retweeted_status->retweet_count;
														$favourite = $value->retweeted_status->favorite_count;
														$image = $value->retweeted_status->user->profile_image_url_https;
														$tweet_url = "https://twitter.com/".$screen_name."/status/".$value->retweeted_status->id_str;
														$user_url = "https://twiiter.com/".$screen_name;
														$retweeted_status = "<span class='twitter__retweeted'><span class='glyphicon glyphicon-refresh'></span> Retweeted by Velvet Trumpet</span>";
													else :
														$name = $value->user->name;
														$screen_name = $value->screen_name;
														$text = $value->text;
														$retweet = $value->retweet_count;
														$favourite = $value->favorite_count;
														$image = $value->user->profile_image_url_https;
														$tweet_url = "https://twitter.com/".$screen_name."/status/".$value->id_str;
														$user_url = "https://twiiter.com/".$screen_name;
														$retweeted_status = "";
													endif;
												?>
												<span class="media-left">
													<img class="media-object no-shadow" src="<?php echo $image; ?>" alt="Profile image">
												</span>
												<div class="media-body">
													<h4 class="media-heading">
														<a href="<?php echo $user_url; ?>" target="_blank">
															<?php echo $name; ?>
														</a>
													</h4>
													<a href="<?php echo $tweet_url; ?>" target="_blank" class="twitter__text"><?php echo $text; ?></a></li>
													<div class="twitter-ticker__interacions">
														<span class="glyphicon glyphicon-refresh twitter-ticker__interacion-icon"></span><?php echo $retweet; ?>
														<span class="glyphicon glyphicon-heart twitter-ticker__interacion-icon"></span><?php echo $favourite; ?>														
														<?php if ($value->retweeted_status) : ?>
														<span class="pull-right">
															<?php echo $retweeted_status; ?>															
														</span>
													<?php endif; ?>
													</div>
												</div>
											</div>
											<?php if ($value->retweeted_status) : 
												echo '<div style="background-image: url('.$bg_image.')" class="item-img"></div>'; 
												endif; ?>
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