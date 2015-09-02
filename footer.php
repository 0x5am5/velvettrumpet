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
						<!-- <div class="row"> -->
							<!-- <div class="col w-25"> -->
								<h2 class="access">menu</h2>
								<? //php $args = array(
								// 	'sort_order' => '',
								// 	'sort_column' => 'post_title',
								// 	'child_of' => 38,
								// 	'post_status' => 'publish'
								// ); 
								// $pages = get_pages($args); 
								?>
								 <?php //foreach ( $pages as $page ) {
									// 	echo '<li>';
									// 	echo '<a href="'.get_page_link( $page->ID ).'">';
									// 	echo $page->post_title;
									// 	echo '</a>';
									// 	echo '</li>';
									//   } 
									wp_nav_menu(array('menu' => 'Main Nav', 'container'=>0));
								?>
							<!-- </div>		 -->
							<!-- <div class="col w-50"></div> -->
							<!-- <div class="col w-25"> -->
								<!-- <h2 class="access">Instagram</h2> -->
								<!-- <ul class="insta-slide slideshow"> -->
								<?php 
								// 	foreach ($feed->data as $key => $post) {
								// 		$text = myTruncate($post->caption->text, 50, " ");
								// 		$comments = $post->comments->count;
								// 		$likes = $post->likes->count;

								// 		if ($key == 0) echo '<li class="show">';
								// 		else echo '<li>';
								// 		echo '<a href="'.$post->link.'" target="_blank">';
								// 		echo '<img src="'.$post->images->low_resolution->url.'" alt="'.$text.'">';
								// 		echo '</a>';
								// 		echo '<p>'.$text.'</p>';
								// 		if ($comments > 0) { echo 'Comments: '.$post->comments->count; }
								// 		if ($comments > 0 && $likes > 0) { echo ' | '; }
								// 		if ($likes > 0) {echo 'Likes: '.$post->likes->count; }
								// 		echo '</li>';
								// 	}
								// 	function myTruncate($string, $limit, $break=".", $pad="...")
								// 	{
								// 	  // return with no change if string is shorter than $limit
								// 	  if(strlen($string) <= $limit) return $string;

								// 	  // is $break present between $limit and the end of the string?
								// 	  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
								// 	    if($breakpoint < strlen($string) - 1) {
								// 	      $string = substr($string, 0, $breakpoint) . $pad;
								// 	    }
								// 	  }

								// 	  return $string;
								// 	}
								?>
							<!-- </ul> -->
						<!-- </div> -->
					</div>
					<div class="copywrite">
						<p>
							&copy; Velvet Trumpet <?php echo date("Y"); ?> </br>
							14 Winchelsea House, Swan Road, Rotherhithe, London, SE16 4LH
						</p>
					</div>
					<?php apply_filters( 'woocommerce_product_add_to_cart_url', get_permalink( 634 ), $this );?>					
				</div>
			</div>
		</footer>				
	</body>
</html>