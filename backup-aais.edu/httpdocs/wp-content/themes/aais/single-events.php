<?php get_header(); ?>

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
				<div class="news-content-wrapper">
					<div class="row">
						<div class="col-sm-2">
							<div class="aais-calendar text-center">
								<div class="calendar-month"><?php echo get_the_date('M'); ?></div>
								<div class="calendar-date"><?php echo get_the_date('d'); ?></div>
							</div>
						</div>
						<div class="col-sm-10 title">
							<h2><?php echo get_the_title(); ?></h2>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<div class="gallery-wrapper">
					<?php 
					$gallery_img = get_field('gallery_images');
					$gallery_size = 'faci-thumb'; // (thumbnail, medium, large, full or custom size)

					if( $gallery_img ): ?>
						<div class="row">
							<?php foreach( $gallery_img as $image ): ?>
								<div class="col-sm-4">
									<div class="relative gallery-outter">
										<div class="gallery-inner">
											<div class="table text-center">
												<div class="table-cell valign button-style-2 white">
													<a href="<?php echo $image['url']; ?>" data-fancybox="newsgallery"><?php if(ICL_LANGUAGE_CODE == 'zh-hans') { echo ('观看'); } else { echo ('View'); } ?></a>
												</div>
											</div>
										</div>
										
										<?php echo wp_get_attachment_image( $image['ID'], $gallery_size ); ?>
										
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>

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
