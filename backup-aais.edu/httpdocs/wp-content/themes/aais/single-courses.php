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
<!-- /Wrapper -->

<?php get_footer(); ?>
