<?php
	global $post;
	$author_id = $post->post_author;
	$date_published = $post->the_date;
?>
	<meta itemprop="author" content="<?php the_author_meta( 'display_name', $author_id ); ?>">
	<!-- <meta itemprop="publisher" itemscope itemtype="https://schema.org/Organization" content="Uptown Studios"> -->
	<meta itemprop="datePublished" content="<?php echo get_the_date( 'M j, Y', $post->ID ); ?>">

	<header id="featured-hero" class="single-featured-hero" role="banner" style="background-image: url('<?php bloginfo('url'); ?>/wp-content/uploads/2016/06/tie-fighter-wing02.svg'); background-repeat: repeat; background-color: #a8c9e9; background-size: 290px;">
		<h1 class="entry-title dark"><span itemprop="headline" class="entry-title-inner"><?php the_title(); ?></span><p class="entry-meta"><span class="author-name author-date">Published on <?php echo get_the_date( 'M j, Y', $post->ID ); ?></span></p></h1>
	</header>
	<?php echo do_shortcode('[bs_social_share]'); ?>
	<div id="init-header-change"></div>
