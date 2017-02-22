<?php get_header('shop'); ?>

<?php get_template_part( 'template-parts/product-title-bar' ); ?>

<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php /* do_action( 'woocommerce_before_main_content' ); */ ?>
<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('main-content max-width-sixteen-hundred') ?> id="post-<?php the_ID(); ?>">
      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <div class="entry-content">
          <?php wc_get_template_part( 'content', 'single-product' ); ?>
      </div>

  </article>
<?php endwhile;?>

<?php /* do_action( 'woocommerce_after_main_content' ); */ ?>
<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer('shop');
