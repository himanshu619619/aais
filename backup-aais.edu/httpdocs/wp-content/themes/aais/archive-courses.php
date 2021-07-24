<?php get_header(); ?>

<!-- Page Header -->
<?php if(ICL_LANGUAGE_CODE == 'zh-hans') { 
	$course_header_id = 902;
} else { 
	$course_header_id = 702;
} 
?>
<?php if(get_field('header_background',$course_header_id)): ?>
<div class="page-header table text-center" style="background: url('<?php echo the_field('header_background',$course_header_id); ?>') center center;">
	<div class="table-cell valign">
		<div class="page-header-wrapper">
			<div class="title">
				<h1 class="merriweather white"><?php if(get_field('page_title',$course_header_id)) { echo the_field('page_title',$course_header_id); } else { echo the_title($course_header_id); } ?></h1>
				<div class="title-separator"><div class="separator-inner"></div></div>
			</div>
			<?php if(get_field('page_subtitle',$course_header_id)) { ?><h4 class="white"><?php echo the_field('page_subtitle',$course_header_id); ?></h4><?php } ?>
		</div>
	</div>
</div>
<?php endif ?>
<!-- /Page Header -->

<!-- Wrapper -->
<div class="wrapper">

	<main role="main">
		<!-- section -->
		<section class="courses-wrapper text-center">
		
		<div id="courses-category" class="courses-type">
			<button class="button is-checked" data-filter="*"><?php if(ICL_LANGUAGE_CODE == 'zh-hans') { echo ('全部课程'); } else { echo ('All'); } ?></button>
			<?php $terms = get_terms( 'courses_type' );
				  $tax = $wp_query->get_queried_object();

				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					foreach ( $terms as $term ) {
						echo '<button class="button" data-filter=".'.$term->slug.'">' . $term->name . '</button>';
							
					}
				} 
			?>	
		</div>
		
			<div class="courses-filter-wrapper">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<div class="col-md-4 col-sm-6 courses-item <?php echo get_the_terms ($post->ID, 'courses_type')[0]->slug; ?>" data-category="<?php echo get_the_terms ($post->ID, 'courses_type')[0]->slug; ?>">
					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php 
						$course_id = get_the_id();
						?>
						<div class="course-inner-wrapper">
						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
							<div class="relative courses-outter">
								<div class="courses-inner">
									<div class="table text-center">
										<div class="table-cell valign button-style-2 white">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if(ICL_LANGUAGE_CODE == 'zh-hans') { echo ('查看课程'); } else { echo ('Find Out More'); } ?></a>
										</div>
									</div>
								</div>
								
								<?php the_post_thumbnail('course-thumb'); ?>
							</div>
						<?php endif; ?>
						
						<!-- /post thumbnail -->
						
						<!-- Course Price -->
						<?php if(get_field('course_price')) { ?>
						<h4 class="merriweather"><?php echo the_field('course_price'); ?></h4>
						<?php } ?>
						<!-- /Course Price -->

						<!-- Course Details -->
						<div class="course-details-wrapper">
							<h2 class="merriweather">
								<?php the_title(); ?>
							</h2>
							<?php if(get_field('course_duration',$course_id)) { ?>
							<p class="primary-color">
								<?php 
									$course_duration = get_field('course_duration', $course_id);
								echo '('.$course_duration.')'; 
								?>
							</p>
							<?php } ?>
						</div>
						<!-- /Course Details -->
						</div>
						

					</article>
				</div>
			<!-- /article -->
			<?php endwhile; endif; ?>
			</div>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>
	
</div>
<!-- /Wrapper -->


<script>
// init Isotope
var jQuerygrid = jQuery('.courses-filter-wrapper').isotope({
  itemSelector: '.courses-item',
  layoutMode: 'fitRows'
});

// filter functions
var filterFns = {
  // show if number is greater than 50
  numberGreaterThan50: function() {
    var number = jQuery(this).find('.number').text();
    return parseInt( number, 10 ) > 50;
  }
};

// bind filter button click
jQuery('#courses-category').on( 'click', 'button', function() {
  var filterValue = jQuery( this ).attr('data-filter');
  // use filterFn if matches value
  filterValue = filterFns[ filterValue ] || filterValue;
  jQuerygrid.isotope({ filter: filterValue });
});

// change is-checked class on buttons
jQuery('.courses-type').each( function( i, buttonGroup ) {
  var jQuerybuttonGroup = jQuery( buttonGroup );
  jQuerybuttonGroup.on( 'click', 'button', function() {
    jQuerybuttonGroup.find('.is-checked').removeClass('is-checked');
    jQuery( this ).addClass('is-checked');
  });
});

function getHashFilter() {
  var hash = location.hash;
  // get filter=filterName
  var matches = location.hash.match( /filter=([^&]+)/i );
  var hashFilter = matches && matches[1];
  return hashFilter && decodeURIComponent( hashFilter );
}

jQuery( function() {

  var jQuerygrid = jQuery('.courses-filter-wrapper');

  // bind filter button click
  var jQueryfilters = jQuery('#courses-category').on( 'click', 'button', function() {
    var filterAttr = jQuery( this ).attr('data-filter');
    // set filter in hash
	location.hash = '';
  });

  var isIsotopeInit = false;

  function onHashchange() {
    var hashFilter = getHashFilter();
    if ( !hashFilter && isIsotopeInit ) {
      return;
    }
    isIsotopeInit = true;
    // filter isotope
    jQuerygrid.isotope({
      itemSelector: '.courses-item',
      filter: hashFilter
    });
    // set selected class on button
    if ( hashFilter ) {
      jQueryfilters.find('.is-checked').removeClass('is-checked');
      jQueryfilters.find('[data-filter="' + hashFilter + '"]').addClass('is-checked');
    }
  }

  jQuery(window).on( 'hashchange', onHashchange );
  // trigger event handler to init Isotope
  onHashchange();
});

</script>

<?php get_footer(); ?>
