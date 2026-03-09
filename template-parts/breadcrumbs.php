		<?php
		// 1) get the URL of the home page in the current language
		$home_url = function_exists( 'pll_home_url' )
			? pll_home_url()
			: home_url();

		// 2) get a translatable “Home” label
		$front_id = get_option( 'page_on_front' );
		$home_label = esc_html( get_the_title( $front_id ) );  

		$posts_page_title = ! empty( $args['posts_page_title'] ) ? $args['posts_page_title'] : null;
		$posts_page_link = ! empty( $args['posts_page_link'] ) ? $args['posts_page_link'] : null;

        $active_item_title = ! empty( $args['active_item_title'] ) ? $args["active_item_title"] : get_the_title();
		$max_length = 35;
		if (mb_strlen($active_item_title) > $max_length) {
			$active_item_title = mb_substr($active_item_title, 0, $max_length) . '...';
		}
		  
		// 3) output the link
		?>
		<nav class="breadcrumbs">
		  <a href="<?php echo esc_url( $home_url ); ?>">
			<?php echo esc_html( $home_label ); ?>
		  </a>
		  &nbsp;»&nbsp;
		  <?php if (isset($posts_page_title)) { ?>
			<a href="<?php echo esc_url( $posts_page_link ); ?>">
				<?php echo esc_html( $posts_page_title ); ?>
		  	</a>
			&nbsp;»&nbsp;
		  <?php } ?>
		  <span class="current"><?= $active_item_title; ?></span>
		</nav>