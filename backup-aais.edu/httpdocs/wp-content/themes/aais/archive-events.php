<?php get_header(); ?>

<!-- Page Header -->
<?php if(ICL_LANGUAGE_CODE == 'zh-hans') { 
	$events_header_id = 901;
} else { 
	$events_header_id = 852;
} 
?>
<?php if(get_field('header_background',$events_header_id)): ?>
<div class="page-header table text-center" style="background: url('<?php echo the_field('header_background',$events_header_id); ?>') center center;">
	<div class="table-cell valign">
		<div class="page-header-wrapper">
			<div class="title">
				<h1 class="merriweather white"><?php if(get_field('page_title',$events_header_id)) { echo the_field('page_title',$events_header_id); } else { echo the_title($events_header_id); } ?></h1>
				<div class="title-separator"><div class="separator-inner"></div></div>
			</div>
			<?php if(get_field('page_subtitle',$events_header_id)) { ?><h4 class="white"><?php echo the_field('page_subtitle',$events_header_id); ?></h4><?php } ?>
		</div>
	</div>
</div>
<?php endif ?>
<!-- /Page Header -->

<!-- Wrapper -->
<div class="wrapper">

	<main role="main">
		<!-- section -->
		<section class="courses-wrapper events-version">
		
		<div id="events-category" class="courses-type text-center">
			<?php $terms = get_terms( 'events_type' );
				  $tax = $wp_query->get_queried_object();

				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					foreach ( $terms as $term ) {
						 $termslug = $term->slug; 
						if($termslug == 'events') { 
						echo '<button class="button is-checked" data-filter=".'.$term->slug.'">' . $term->name . '</button>';
						} else { 
						echo '<button class="button" data-filter=".'.$term->slug.'">' . $term->name . '</button>';
						}
					}
				} 
			?>	
		</div>
		
			<div class="courses-filter-wrapper">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<div class="col-sm-6 courses-item <?php echo get_the_terms ($post->ID, 'events_type')[0]->slug; ?>" data-category="<?php echo get_the_terms ($post->ID, 'events_type')[0]->slug; ?>">
					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php 
						$course_id = get_the_id();
						?>
						<div class="events-inner-wrapper">
						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
							<?php the_post_thumbnail('news-thumb'); ?>
						<?php endif; ?>
						
						<!-- /post thumbnail -->

						<!-- Course Details -->
						<div class="events-details-wrapper">
							
								<div class="col-lg-3 col-md-4 float-md-right">
									<div class="aais-calendar no-margin text-center">
										<div class="calendar-month"><?php echo get_the_date('M'); ?></div>
										<div class="calendar-date"><?php echo get_the_date('d'); ?></div>
									</div>
								</div>
								
								<div class="col-lg-9 col-md-8">
									<h2 class="merriweather underline-title">
										<?php the_title(); ?>
									</h2>
									<p>
									<?php if(ICL_LANGUAGE_CODE == 'zh-hans') { 
										$no_description = '无说明';
									} else { 
										$no_description = 'No description';
									} 
									?>
									<?php $content = get_the_content();
									if($content == '') { echo $no_description; } else {
									echo wp_trim_words($content,25); } ?>
									</p>
									<div class="button-style-1">
										<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>"><?php if(ICL_LANGUAGE_CODE == 'zh-hans') { echo ('阅读更多'); } else { echo ('Read More'); } ?></a>
									</div>
								</div>
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
jQuery('#events-category').on( 'click', 'button', function() {
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
</script>

<?php get_footer(); ?>
