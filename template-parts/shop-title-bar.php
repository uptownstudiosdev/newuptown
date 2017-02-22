<?php
	global $post, $product;
	$author_id = $post->post_author;
	$date_published = $post->the_date;
?>

	<header id="featured-hero" role="banner" style="background-image: url('<?php bloginfo('url'); ?>/wp-content/uploads/2016/06/tie-fighter-wing02.svg'); background-repeat: repeat; background-color: #a72535; background-size: 290px;" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<h1 class="entry-title <?php if($title_color == 'dark') {?> dark<?php } ?>"><span class="entry-title-inner">Badass Boutique</span></h1>
	</header>
	<div id="init-header-change"></div>
