<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<div class="article-wrap" itemscope itemtype="http://schema.org/Article">
	<?php
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$image = $image[0];
		$hide_featured = get_field('hide_featured_image');
	?>
<meta itemprop="image" itemscope itemtype="https://schema.org/ImageObject" content="<?php echo $image; ?>">
<?php get_template_part( 'template-parts/blog-title-bar' ); ?>

<div id="single-post" class="page-full-width max-width-one-thousand no-sidebar" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article aria-role="article" id="post-<?php the_ID(); ?>" <?php post_class('main-content') ?>>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">

		<?php
			if( has_post_thumbnail() ) {
			if( $hide_featured != 'yes' ) : ?>
				<div class="single-featured-image">
					<?php the_post_thumbnail('full'); ?>
				</div>
			<?php endif;
		}	?>

		<?php the_content(); ?>
		</div>

		<?php $posttags = get_the_tags(); if ($posttags) { ?>
		<div class="the-tags">
			<?php foreach($posttags as $tag) {
				echo '<a href="' . get_bloginfo('url') . '/tag/'  . $tag->slug . '"><span class="tag">#' . $tag->slug . '</a></span>';
			} ?>
		</div>
		<?php } ?>

		<?php get_template_part( 'template-parts/about-author' ); ?>

		<nav id="nav-single" class="nav-single">
			<div class="nav-single-inner">
				<span class="nav-previous"><?php next_post_link( '%link', '<span class="meta-nav">' . _x( '&laquo;', 'Previous post link', 'wp-forge' ) . '</span> %title' ); ?></span>
				<span class="nav-next"><?php previous_post_link( '%link', '%title <span class="meta-nav">' . _x( '&raquo;', 'Next post link', 'wp-forge' ) . '</span>' ); ?></span>
			</div>
		</nav><!-- .nav-single -->
		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
</div>
</div> <!-- end article-wrap -->
<?php get_footer();
