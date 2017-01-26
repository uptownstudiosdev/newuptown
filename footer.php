<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>
		<div id="footer-container">
			<footer id="footer">
				<?php do_action( 'foundationpress_before_footer' ); ?>
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
				<?php do_action( 'foundationpress_after_footer' ); ?>
			</footer>

			<footer id="copyright">
				<?php if( get_theme_mod('copyright')): ?>
					<p>&copy; <?php echo date('Y'); ?> <?php echo get_theme_mod('copyright','default'); ?></p>
				<?php else: ?>
					<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
				<?php endif; ?>
			</footer>
		</div>
		<div id="back-top">
  		<a href="#" title="Back to top" aria-label="Back To Top"><i class="fa fa-chevron-up"></i></a>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>

<script type="text/javascript">

	var windowWidth;
	var headerHeight;
	var topScrollOffset;
	var windowWidth = jQuery(window).width();
	var headerHeight = jQuery('#masthead').height();
	if(windowWidth > 640) {
		var topScrollOffset = '112';
	} else {
		var topScrollOffset = '0';
	}

	jQuery(document).ready(function($) {
		$heightOnLoad = $('.home-hero-wrapper.vc_row.vc_row-o-full-height').height();
		// console.log($heightOnLoad);
		$(window).resize(function() {
			$('body.mobile .home-hero-wrapper.vc_row.vc_row-o-full-height').css({'min-height':$heightOnLoad});
		});
		$paginationHeight = $('span.em-pagination').height();
		if($paginationHeight > 0) {
			$('.uptown-events-wrapper').css({'margin-bottom':$paginationHeight + 30 });
		}
	});

	jQuery(document).ready(function($) {
		$('#preloader img').delay(10).show();
		$('.home #video-iframe-1').delay(500).load(function() {

			// Site Preloader
			$('#preloader').addClass('loaded')
			// $('#preloader img').fadeIn('fast');
			// $('#preloader .spinner').addClass('loaded');
			// $('#preloader img').addClass('loaded');
			$('#preloader.loaded').delay(250).slideUp(1000, function() {
				$(this).remove();
			});
		});

		$(window).imagesLoaded(function() {

			// Site Preloader
			$('#preloader').addClass('loaded')
			// $('#preloader img').fadeIn('fast');
			// $('#preloader .spinner').addClass('loaded');
			// $('#preloader img').addClass('loaded');
			$('#preloader.loaded').delay(250).slideUp(1000, function() {
				$(this).hide();
			});

			// Portfolio/Event left/right height function
			var portlefthalf = jQuery('.portfolio-main-image').height();
			var portrighthalf = jQuery('.portfolio-description-inner').height();
			var eventlefthalf = jQuery('.event-main-image').height();
			var eventrighthalf = jQuery('.event-description-inner').height();
			if((portlefthalf > portrighthalf) && (portlefthalf > 800)) {
				$('.portfolio-main-image').addClass('alignmiddle');
				$('.portfolio-description').addClass('alignmiddle');
			}
			if(eventlefthalf > eventrighthalf) {
				$('.event-main-image').addClass('alignmiddle');
				$('.event-description').addClass('alignmiddle');
			}
		});

	  // Back to top script
	  $('#back-top').hide();
	  $(function () {
	    $(window).scroll(function () {
	      if ($(this).scrollTop() > 800) {
	        $('#back-top').fadeIn();
	      } else {
	        $('#back-top').fadeOut();
	      }
	    });
			if($('body').hasClass('mobile')) {
				// do nothing
			} else {
		    $('#back-top a').click(function () {
		      $('body,html').animate({ scrollTop: '0px' }, 'slow');
		      return false;
		    });
			}
	  });

		// Float Labels
		function floatLabel(inputType) {
			$(inputType).each(function(){
					var $this = $(this);
					$this.focus(function(){
						$this.closest('li.gfield').find('label').attr("data-attr","active");
						$this.closest('li.floatLabel').find('label').attr("data-attr","active");
					});
					$this.blur(function(){
						if($this.val() === '' || $this.val() === 'blank'){
							$this.closest('li.gfield').find('label').attr("data-attr","");
							$this.closest('li.floatLabel').find('label').attr("data-attr","");
						}
					});
			});
		}
		floatLabel(".floatLabel input");
		floatLabel(".floatLabel textarea");
	});

	// Masonry Layout for Portfolio, Blog Posts, and Events
	(function ($) {
		var $container = $('.bs-isotope');
		$container.imagesLoaded(function() {
			$container.isotope({
				itemSelector: '.bs-isotope-item',
				layoutMode: 'masonry'
			});
			$container.isotope('layout').isotope();
		});
		$(window).trigger('resize');
	}(jQuery));


	// Lazy Load with Isotope/Masonry Layout
	$('.lazy-isotope-wrapper').each(function(){

		var $isotope = $('.lazy-isotope', this);

		$isotope.isotope({
			itemSelector: '.bs-isotope-item',
			layoutMode: 'masonry'
		});

	  $isotope[0].addEventListener('load', (function(){
	    var runs;
	    var update = function(){
	      $isotope.isotope('layout');
	      runs = false;
	    };
	    return function(){
	      if(!runs){
	        runs = true;
	        setTimeout(update, 33);
	      }
	    };
	  }()), true);

	});


	// Isotope Filters for Portfolio
	jQuery(document).ready(function($) {
		// cache container
		var $container = $('.portfolio-container');
		// filter items when filter link is clicked
		$('#filters a').click(function(){
		  var selector = $(this).attr('data-filter');
		  $container.isotope({ filter: selector });
			$('#filters a.active').not(this).removeClass('active');
			$(this).addClass('active');
		  return false;
		});
		$('.title-bar .menu-icon').click(function() {
			$('body').toggleClass('off-canvas-open');
		});
		jQuery('.portfolio-filter-toggle a').click(function() {
			$('#filters').slideToggle('fast');
			return false;
		});
	});

	// Shrink logo Classie script
	function init() {
    window.addEventListener('scroll', function(e){
      var distanceY = window.pageYOffset || document.documentElement.scrollTop,
        shrinkOn = jQuery('#masthead').height(),
        header = document.querySelector("body");
      if (distanceY > shrinkOn) {
        classie.add(header,"shrink-logo");
      } else {
        if (classie.has(header,"shrink-logo")) {
          classie.remove(header,"shrink-logo");
        }
      }
  	});
	}
	window.onload = init();

	// Light header switch Waypoint script
	shrinkOn = jQuery('#masthead').height();

	var sharewaypoint = new Waypoint({
		element: document.getElementById('init-header-change'),
		handler: function(direction) {
			jQuery('#masthead').toggleClass('reverse-header');
		},
		offset: shrinkOn
	});

	//Show title waypoint
	$('.single-tm-outer').each(function() {
		$(this).waypoint(function() {
			$(this).toggleClass('showtitle');
		}, {
			offset: '40%'
		});
	});

	jQuery(function($) {
		// Scroll to hash on click
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
				console.log(target);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top - topScrollOffset
	        }, 1000);
	        return false;
	      }
	    }
	  });

		// Quote Modal Script
		$('a.bs-quote-modal').click(function() {
			$('a.bs-quote-modal.return-focus').removeClass('return-focus');
			$(this).addClass('return-focus');
			$(this).parents('.single-service-content').find('.bs-quote-modal-wrapper').fadeIn('slow').addClass('show-modal');
			$('body').addClass('modal-active');
			if($('.bs-quote-modal-wrapper.show-modal').is(':visible') == true) {
				console.log('Modal is shown');
				$('input[name="input_1"]').focus();
			}
			return false;
		});
		$('.bs-quote-modal-close').click(function() {
			$('.bs-quote-modal-wrapper.show-modal').removeClass('show-modal').fadeOut('fast');
			$('body').removeClass('modal-active');
			$('a.bs-quote-modal.return-focus').focus();
			return false;
		});
		$(document).keyup(function(e) {
    	if (e.keyCode == 27) {
				$('.bs-quote-modal-wrapper.show-modal').removeClass('show-modal').fadeOut('fast');
				$('body').removeClass('modal-active');
				$('a.bs-quote-modal.return-focus').focus();
    	}
		});

	});

	// initiating the isotope page
	jQuery(window).load(function($) {

	    // Store # parameter and add "." before hash
	    var hashID = "." + window.location.hash.substring(1);

	    //  the current version of isotope, the hack works in v2 also
	    var $container = jQuery('.portfolio-container');

	    $container.imagesLoaded(function(){
	        $container.isotope({
	            itemSelector: ".single-portfolio-item",
	            filter: hashID, // the variable filter hack
	        });
					jQuery('#filters a.active').removeClass('active');
					jQuery('#filters a[data-filter="' + hashID + '"]').addClass('active');
	    });

	});

	// Scroll to service on page load after all images are loaded
  jQuery(function($){
  $('a.go-to-service, .go-to-service a').on('click', scroller.hashLinkClicked);
    scroller.loaded();
  });

  (function($){

    scroller = {
			scrollTiming: 1000,
      pageLoadScrollDelay: 1000,
      hashLinkClicked: function(e){

        // current path
        var temp    = window.location.pathname.split('#');
        var curPath = scroller.addTrailingSlash(temp[0]);

        // target path
        var link       = $(this).attr('href');
        var linkArray  = link.split('#');
        var navId      = (typeof linkArray[1] !== 'undefined') ? linkArray[1] : null;
        var targetPath = scroller.addTrailingSlash(linkArray[0]);

        // scrollTo the hash id if the target is on the same page
        if (targetPath == curPath && navId) {
          e.preventDefault();
          scroller.scrollToElement('#'+navId);
          window.location.hash = scroller.generateTempNavId(navId);

        // otherwise add '_' to hash
        } else if (navId) {
          e.preventDefault();
          navId = scroller.generateTempNavId(navId);
          window.location = targetPath+'#'+navId;
        }
      },
      addTrailingSlash: function(str){
        lastChar = str.substring(str.length-1, str.length);
        if (lastChar != '/')
          str = str+'/';
        return str;
      },
      scrollToElement: function(whereTo){
        jQuery('html, body').animate({ scrollTop: jQuery(whereTo).offset().top - topScrollOffset }, scroller.scrollTiming);
      },
      generateTempNavId: function(navId){
        return '_'+navId;
      },
      getNavIdFromHash: function(){
        var hash = window.location.hash;

        if (scroller.hashIsTempNavId()) {
          hash = hash.substring(2);
        }

        return hash;
      },
      hashIsTempNavId: function(){
        var hash = window.location.hash;

        return hash.substring(0,2) === '#_';
      },

      loaded: function(){

        if (scroller.hashIsTempNavId()) {
          setTimeout(function() {
            scroller.scrollToElement('#'+scroller.getNavIdFromHash());
          },scroller.pageLoadScrollDelay);
          var hash = window.location.hash;
        }
      }
    };

  })(jQuery);

</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
	var $unlike = $('div.action-unlike');
	var $likeParent = $('div.watch-position');
	$unlike.detach();
	$(document).on('click', 'body.logged-in a[data-task="like"]', function(e) {
		e.preventDefault();
		$unlike.appendTo($likeParent);
	});
	$(document).on('click', 'a[data-task="unlike"]', function(e) {
		e.preventDefault();
		$unlike.detach();
	});
});
</script>

<?php do_action( 'foundationpress_before_closing_body' ); ?>
<script id="__bs_script__">//<![CDATA[document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.2.12.3.js'><\/script>".replace("HOST", location.hostname));
//]]></script>
</body>
</html>
