<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'cause', 'posts_per_page' => 18, 'status' => 'published', 'paged' => $paged );
$loop = new WP_Query( $args );

?>
			<?php if ( $loop->have_posts()) : while ( $loop->have_posts()) : $loop->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('index-card bs-isotope-item'); ?>>
					<div class="entry-content">

						<?php	$featured_video = get_field('cause_video_embed_code'); ?>

						<div class="blog-page-featured-image cause-page-featured-video">
							<?php echo $featured_video; ?>
						</div>

						<div class="blog-page-title-excerpt">
							<h3 class="alt-avatar-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<p class="author-date">Published on <?php the_date(); ?></p>
							<p class="author-byline"><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More &raquo;</a>
							<div class="bs-post-cats"><?php GetWtiLikePost(); ?></div>
						</div>
					</div>
				</article>
			<?php endwhile; endif; ?>
			<div class="clear"></div>
