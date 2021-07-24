<?php /* Template Name: Home Page Template */ get_header(); ?>

<!-- Slider -->
<?php if( have_rows('slider_setting') ): ?>
	<div class="home-slider owl-carousel owl-theme">
    <?php while( have_rows('slider_setting') ): the_row(); 
        // vars
		$slider_img = get_sub_field('slider_image');
		$slider_title = get_sub_field('slider_title');
		$slider_content = get_sub_field('slider_content');
		$slider_link = get_sub_field('slider_link');
    ?>
		
		<div class="item">
			<div class="single-slide table" style="background: url('<?php echo $slider_img; ?>') center center;background-size: cover;">
				<div class="slider-background" data-animation-in="slideInLeft" data-animation-out="animate-out fadeOutLeft"></div>
				<div class="table-cell valign">
					<div class="wrapper">
						<div class="single-inner">
							<h1 class="merriweather" data-animation-in="slideInLeft" data-animation-out="animate-out fadeOutLeft">
								<?php echo $slider_title; ?>
							</h1>
							<p data-animation-in="slideInLeft" data-animation-out="animate-out fadeOutLeft">
								<?php echo $slider_content; ?>
							</p>
							<div class="inline-block" data-animation-in="slideInLeft" data-animation-out="animate-out fadeOutLeft">	
								<a href="<?php echo $slider_link; ?>" class="slider-btn">
									<?php if(ICL_LANGUAGE_CODE == 'zh-hans') { echo ('阅读更多'); } else { echo ('Read More'); } ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		 </div>

	<?php endwhile; ?>
	 </div>
<?php endif; ?>

      
 

<!-- wrapper -->
<div class="wrapper">

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?> 

		</section>
		<!-- /section -->
	</main>

</div>
<!-- /wrapper -->

<script>
	jQuery(document).ready(function (){
  // Declare Carousel jquery object
  var owl = jQuery('.home-slider');

  // Carousel initialization
  owl.owlCarousel({
      loop:true,
      margin:0,
      navSpeed:500,
      nav:false,
      autoplay: false,
      rewind: true,
      items:1
  });


  // add animate.css class(es) to the elements to be animated
  function setAnimation ( _elem, _InOut ) {
    // Store all animationend event name in a string.
    // cf animate.css documentation
    var animationEndEvent = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

    _elem.each ( function () {
      var $elem = jQuery(this);
      var $animationType = 'animated ' + $elem.data( 'animation-' + _InOut );

      $elem.addClass($animationType).one(animationEndEvent, function () {
        $elem.removeClass($animationType); // remove animate.css Class at the end of the animations
      });
    });
  }

// Fired before current slide change
  owl.on('change.owl.carousel', function(event) {
      var $currentItem = jQuery('.owl-item', owl).eq(event.item.index);
      var $elemsToanim = $currentItem.find("[data-animation-out]");
      setAnimation ($elemsToanim, 'out');
  });

// Fired after current slide has been changed
  var round = 0;
  owl.on('changed.owl.carousel', function(event) {

      var $currentItem = jQuery('.owl-item', owl).eq(event.item.index);
      var $elemsToanim = $currentItem.find("[data-animation-in]");
    
      setAnimation ($elemsToanim, 'in');
  })
  
  owl.on('translated.owl.carousel', function(event) {
    console.log (event.item.index, event.page.count);
    
      if (event.item.index == (event.page.count - 1))  {
        if (round < 1) {
          round++
          console.log (round);
        } else {
          owl.trigger('stop.owl.autoplay');
          var owlData = owl.data('owl.carousel');
          owlData.settings.autoplay = false; //don't know if both are necessary
          owlData.options.autoplay = false;
          owl.trigger('refresh.owl.carousel');
        }
      }
  });

});
</script>

<?php get_footer(); ?>
