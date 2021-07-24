<?php /* Template Name: Testimonials Template */ get_header(); ?>

<!-- Page Header -->
<?php if(get_field('header_background')): ?>
<div class="page-header table text-center" style="background: url('<?php echo the_field('header_background'); ?>') center center;">
	<div class="table-cell valign">
		<div class="page-header-wrapper">
			<div class="title">
				<h1 class="merriweather white"><?php if(get_field('page_title')) { echo the_field('page_title'); } else { echo the_title(); } ?></h1>
				<div class="title-separator"><div class="separator-inner"></div></div>
			</div>
			<?php if(get_field('page_subtitle')) { ?><h4 class="white"><?php echo the_field('page_subtitle'); ?></h4><?php } ?>
		</div>
	</div>
</div>
<?php endif ?>
<!-- /Page Header -->

<!-- Wrapper -->
<div class="wrapper">

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>
				
				<?php if( have_rows('testimonials') ): ?>
					<div class="testimonials-wrapper text-center">
						<!-- Year Tab -->
						<div class="test-tab merriweather">
							<?php $count = 0;while( have_rows('testimonials') ): the_row();
								$test_year = get_sub_field('testimonials_years');
							?>
								<button class="test-links" onclick="openTest(event, 'testimonials-content-<?php echo $count; ?>')" <?php if($test_year == 2020) { echo 'id="defaultOpen"'; }; ?>><?php echo $test_year; ?></button>
						  
							<?php $count++; endwhile; ?> 
						</div>
					
						<?php $count = 0;while( have_rows('testimonials') ): the_row();
							$test_year = get_sub_field('testimonials_years');
						?>
							<!-- Testimonials Content -->
							<div id="testimonials-content-<?php echo $count; ?>" class="test-content">
								<div class="row row-eq-height">
									<?php if( have_rows('testimonials_list') ): ?>
										<?php while( have_rows('testimonials_list') ): the_row(); 
											// vars
											$test_img = get_sub_field('testimonials_images');
											$test_name = get_sub_field('testimonials_name');
											$test_qual = get_sub_field('qualification');
											$test_camp = get_sub_field('campus');
											$test_cont = get_sub_field('testimonials_content');
										?>
										<div class="col-md-4 col-sm-6 testimonials-outter-wrapper">
											<div class="testimonials-inner-wrapper">
												<img src="<?php echo $test_img; ?>">
												<h2 class="merriweather"><?php echo $test_name; ?></h2>
												<div class="testimonials-inner-content">
													<div class="test-qual">
														<h4><?php echo $test_qual; ?></h4>
														<h4><?php echo $test_camp; ?>&nbsp;</h4>
													</div>
													<hr class="aais-separator">
													<p><?php echo $test_cont; ?></p>
												</div>
											</div>
										</div>

										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
						<?php $count++; endwhile; ?> 	
						
					</div>
				<?php endif; ?>
		
		<script>
		function openTest(evt, listName) {
			// Declare all variables
			var i, tabcontent, tablinks;

			// Get all elements with class="tabcontent" and hide them
			tabcontent = document.getElementsByClassName("test-content");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}

			// Get all elements with class="tablinks" and remove the class "active"
			tablinks = document.getElementsByClassName("test-links");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			// Show the current tab, and add an "active" class to the button that opened the tab
			document.getElementById(listName).style.display = "block";
			evt.currentTarget.className += " active";
		}
		document.getElementById("defaultOpen").click();
		</script>


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
<!-- /Wrapper -->

<?php get_footer(); ?>