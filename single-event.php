<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/event-title-bar' ); ?>

<div id="single-post" class="page-full-width max-width-sixteen-hundred no-sidebar" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content event-wrap">

		<?php $altimage = get_field('alternate_event_image');
		if ( empty($altimage) ) : ?>

		<?php if ( has_post_thumbnail() ) { ?>
		<div class="event-main-image">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php }	?>
		<?php else: ?>
			<div class="event-main-image">
				<img src="<?php echo $altimage['url']; ?>" alt="<?php echo $altimage['alt']; ?>" />
			</div>
		<?php endif; ?>
		<div class="event-description">
			<div class="event-description-inner">
				<?php the_content(); ?>
			</div>
		</div>
		</div>

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
<?php get_footer();
