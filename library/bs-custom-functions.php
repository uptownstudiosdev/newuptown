<?php
// Current Year Shortcode
function bs_current_year() {
	$year = date('Y');
	return $year;
}
add_shortcode('year','bs_current_year');


// Allow the upload of SVG graphics to Media Library
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Add 'mobile' to body class on mobile device
function my_body_classes($c) {
    wp_is_mobile() ? $c[] = 'mobile' : null;
    return $c;
}
add_filter('body_class','my_body_classes');


// Shortcodes in widget
add_filter('widget_text', 'do_shortcode');


// PayPal Invoice in Gravity Forms
//add_filter( 'gform_paypal_invoice', 'your_function_name', 10, 3 );


// Customizer Social Media Links Shortcode
add_shortcode( 'bs_social_urls', 'bs_social_urls_shortcode' );
function bs_social_urls_shortcode( $atts ) {
    extract( shortcode_atts( array(
      'align' => '',
      'color' => ''
    ), $atts ) );
    ob_start(); ?>

    <ul class="social-media-wrapper <?php echo $align; ?> <?php echo $color; ?>">
      <?php if( get_theme_mod('facebook')): ?><li class="facebook"><a href="<?php echo get_theme_mod('facebook','default'); ?>" target="_blank" title="Find us on Facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('twitter')): ?><li class="twitter"><a href="<?php echo get_theme_mod('twitter','default'); ?>" target="_blank" title="Follow us on Twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('linkedin')): ?><li class="linkedin"><a href="<?php echo get_theme_mod('linkedin','default'); ?>" target="_blank" title="Connect with us on LinkedIn" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('instagram')): ?><li class="instagram"><a href="<?php echo get_theme_mod('instagram','default'); ?>" target="_blank" title="Follow us on Instagram" aria-label="Instagram"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
			<?php if( get_theme_mod('snapchat')): ?><li class="snapchat"><a href="<?php echo get_theme_mod('snapchat','default'); ?>" target="_blank" title="Add us on Snapchat" aria-label="Snapchat"><i class="fa fa-snapchat-ghost"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('youtube')): ?><li class="youtube"><a href="<?php echo get_theme_mod('youtube','default'); ?>" target="_blank" title="Check out our YouTube Channel" aria-label="YouTube"><i class="fa fa-youtube-play"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('pinterest')): ?><li class="pinterest"><a href="<?php echo get_theme_mod('pinterest','default'); ?>" target="_blank" title="Follow us on Pinterest" aria-label="Pinterest"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('vimeo')): ?><li class="vimeo"><a href="<?php echo get_theme_mod('vimeo','default'); ?>" target="_blank" title="Check out our Vimeo Channel" aria-label="Vimeo"><i class="fa fa-vimeo"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('rss')): ?><li class="rss"><a href="<?php echo get_theme_mod('rss','default'); ?>" target="_blank" title="Subscribe to our RSS Feed" aria-label="RSS"><i class="fa fa-rss"></i></a></li><?php endif; ?>
    </ul>

    <?php $bs_social_variable = ob_get_clean();
    return $bs_social_variable;
}


// Team Social Media Links Shortcode
add_shortcode( 'team_social_urls', 'team_social_urls_shortcode' );
function team_social_urls_shortcode( $atts ) {
    $args = shortcode_atts( array(
      'align' => '',
      'color' => '',
			'name' => 'me',
			'facebook' => '',
			'twitter' => '',
			'linkedin' => '',
			'instagram' => '',
			'pinterest' => '',
			'youtube' => '',
			'googleplus' => '',
			'behance' => '',
			'snapchat' => '',
			'github' => '',
    ), $atts );
    ob_start(); ?>

    <ul class="team-social-media-wrapper <?php echo $args['align']; ?> <?php echo $args['color']; ?>">
      <?php if($args['facebook'] != '') : ?><li class="facebook"><a href="<?php echo $args['facebook']; ?>" target="_blank" title="Find <?php echo $args['name']; ?> on Facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
			<?php if($args['twitter'] != '') : ?><li class="twitter"><a href="<?php echo $args['twitter']; ?>" target="_blank" title="Follow <?php echo $args['name']; ?> on Twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
			<?php if($args['linkedin'] != '') : ?><li class="linkedin"><a href="<?php echo $args['linkedin']; ?>" target="_blank" title="Connect with <?php echo $args['name']; ?> on LinkedIn" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
			<?php if($args['instagram'] != '') : ?><li class="instagram"><a href="<?php echo $args['instagram']; ?>" target="_blank" title="Follow <?php echo $args['name']; ?> on Instagram" aria-label="Instagram"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
			<?php if($args['pinterest'] != '') : ?><li class="pinterest"><a href="<?php echo $args['pinterest']; ?>" target="_blank" title="Follow <?php echo $args['name']; ?> on Pinterest" aria-label="Pinterest"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
			<?php if($args['youtube'] != '') : ?><li class="youtube"><a href="<?php echo $args['youtube']; ?>" target="_blank" title="Check <?php echo $args['name']; ?> out on YouTube" aria-label="YouTube"><i class="fa fa-youtube"></i></a></li><?php endif; ?>
			<?php if($args['googleplus'] != '') : ?><li class="googleplus"><a href="<?php echo $args['googleplus']; ?>" target="_blank" title="Find <?php echo $args['name']; ?> on Google+" aria-label="Google+"><i class="fa fa-googleplus"></i></a></li><?php endif; ?>
			<?php if($args['behance'] != '') : ?><li class="behance"><a href="<?php echo $args['behance']; ?>" target="_blank" title="Find work by <?php echo $args['name']; ?> on Behance" aria-label="Behance"><i class="fa fa-behance"></i></a></li><?php endif; ?>
			<?php if($args['snapchat'] != '') : ?><li class="snapchat"><a href="<?php echo $args['snapchat']; ?>" target="_blank" title="Snap with <?php echo $args['name']; ?> on Snapchat" aria-label="Snapchat"><i class="fa fa-snapchat-ghost"></i></a></li><?php endif; ?>
			<?php if($args['github'] != '') : ?><li class="github"><a href="<?php echo $args['github']; ?>" target="_blank" title="Check out repos by <?php echo $args['name']; ?> on Github"><i class="fa fa-github"></i></a></li><?php endif; ?>
    </ul>

    <?php $team_social_variable = ob_get_clean();
    return $team_social_variable;
}


// Instagram Feed Shortcode
function bs_instagram_feed( $atts ) {
  extract( shortcode_atts(array(), $atts) );
  ob_start(); ?>

  <div id="instafeed"></div>

  <?php
    wp_enqueue_script( 'instafeed', get_template_directory_uri() . '/assets/javascript/instafeed.js', array('jquery'), '1.0', true );
    $bs_ig_feed_variable = ob_get_clean();
    return $bs_ig_feed_variable;
}
add_shortcode( 'bs_ig_feed', 'bs_instagram_feed' );

// Custom Excerpt
function bs_exceprt_more( $more ) {
  return ' ...';
}
add_filter( 'excerpt_more', 'bs_exceprt_more' );


// BS Social Share shortcode
add_shortcode( 'bs_social_share', 'bs_social_share_shortcode' );
function bs_social_share_shortcode( $atts ) {
ob_start(); ?>
<div class="bs-social-share-container">
	<div class="bs-social-share-inner">

		<div class="single-social-share social-share-twitter">
			<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
			<a class="twitter-button" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>%2E&amp;url=<?php the_permalink(); ?>&amp;via=uptownstudios" data-social-action="Twitter : Tweet" title="Share on Twitter"><i class="fa fa-twitter"></i></a>
		</div>

		<div class="single-social-share social-share-facebook">
			<a href="javascript:void(0)" class="btn" onClick="fb_share()" title="Share on Facebook"><i class="fa fa-facebook"></i></a><span><?php echo customFShare(); ?></span>
		</div>

		<div class="single-social-share social-share-google">
			<script src="https://apis.google.com/js/platform.js" async defer></script>
			<?php
				$google_plusones = function ( $url ) {
					$curl = curl_init();
					curl_setopt( $curl, CURLOPT_URL, "https://clients6.google.com/rpc" );
					curl_setopt( $curl, CURLOPT_POST, 1 );
					curl_setopt( $curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' );
					curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
					curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-type: application/json' ) );
					$curl_results = curl_exec( $curl );
					curl_close( $curl );
					$json = json_decode( $curl_results, true );

			return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
			};
			$url = get_permalink();
			?>
			<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" data-link="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" title="Share on Google+"><i class="fa fa-google-plus"></i></a><span><?php echo $google_plusones ("$url"); ?></span>
		</div>

		<div class="single-social-share social-share-linkedin">
			<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
			<?php $linkedin_shares = function ( $url ) {
				$li_json_string = file_get_contents( "https://www.linkedin.com/countserv/count/share?format=json&url=" . $url );
				$li_json = json_decode($li_json_string, true);
				return isset($li_json['count'])?intval($li_json['count']):0;
			}; ?>
			<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title();?>&source=uptownstudios.net" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin"></i></a><span><?php $url = get_permalink(); echo $linkedin_shares ("$url"); ?></span>
		</div>

		<div class="single-social-share social-share-pinterest">
			<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
			<?php $pinterest_pins = function ( $url ) {
				$api = file_get_contents( 'https://api.pinterest.com/v1/urls/count.json?callback%20&url=' . $url );
				$body = preg_replace( '/^receiveCount\((.*)\)$/', '\\1', $api );
				$count = json_decode( $body );
				return $count->count;
			}; ?>
			<a href="https://www.pinterest.com/pin/create/button/" data-pin-count="true" data-pin-custom="true" title="Share on Pinterest"><i class="fa fa-pinterest"></i></a><span><?php $url = get_permalink(); echo $pinterest_pins ("$url"); ?></span>
		</div>

	</div>
</div>
<?php $bs_social_variable = ob_get_clean();
return $bs_social_variable;
}


// Add custom tab for related products and move all related products into it
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
function woo_custom_product_tab( $tabs ) {

    $custom_tab = array(
      		'custom_tab' =>  array(
    							'title' => __('Related Products','woocommerce'),
    							'priority' => 50,
    							'callback' => 'woo_custom_product_tab_content'
    						)
    				);

    return array_merge( $custom_tab, $tabs );
}
function woo_custom_product_tab_content() {
	woocommerce_related_products();
}
add_filter( 'woocommerce_product_tabs', 'woo_custom_product_tab' );


// Custom WooCommerce Loop Start and End
function woocommerce_product_loop_start() {
	echo '<div class="clear"></div><div class="lazy-isotop-wrapper"><div class="products bs-isotope lazy-isotope">';
}

function woocommerce_product_loop_end() {
	echo '</div></div>';
}


// Wrapper around image in WooCommerce loop
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action   ( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	}
}

if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce;
		if ( ! $placeholder_width )
			$placeholder_width = wc_get_image_size( 'shop_catalog_image_width' );
		if ( ! $placeholder_height )
			$placeholder_height = wc_get_image_size( 'shop_catalog_image_height' );

			$output = '<div class="product-image-wrapper">';
			if ( has_post_thumbnail() ) {

				$output .= get_the_post_thumbnail( $post->ID, $size );

			} else {

				$output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';

			}

			$output .= '</div>';

			return $output;
	}
}
