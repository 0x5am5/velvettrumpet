				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
	
	<?php if (is_front_page()) { ?> 
	<script type="text/javascript">
	var t = setTimeout(function() {
		$('.menu-trigger').click();
	}, 2000);
	</script>
	<?php } ?>
</html>