		<!-- footer top area -->
		<?php if(ICL_LANGUAGE_CODE == 'zh-hans') {
			$footer_id = 892;
		} else {
			$footer_id = 24;
		}
		?>
		<div class="footer-top">
			<div class="wrapper">
				<?php if( have_rows('footer_top_content',$footer_id) ): ?>
				<div class="row">
					<?php while( have_rows('footer_top_content',$footer_id) ): the_row();
						// vars
						$ft_icon = get_sub_field('footer_top_icon',$footer_id);
						$ft_title = get_sub_field('footer_top_title',$footer_id);
						$ft_content = get_sub_field('footer_top_content',$footer_id);
					?>

						<div class="ft-line col-md-3 col-sm-6 text-center">
							<img src="<?php echo $ft_icon; ?>">
							<h2 class="primary-color"><?php echo $ft_title; ?></h2>
							<p><?php echo $ft_content; ?></p>
						</div>

					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<!-- /footer top area -->

		<!-- footer -->
		<footer class="footer" role="contentinfo">
			<!-- wrapper -->
			<div class="wrapper">

				<!-- Footer Area -->
				<div class="footer-area">
					<div class="row">
						<div class="col-sm-4">
							<div class="footer-area-1"><?php the_field('footer_column_1_content',$footer_id);?></div>
						</div>
						<div class="col-sm-5">
							<div class="footer-area-2"><?php the_field('footer_column_2_content',$footer_id);?></div>
						</div>
						<div class="col-sm-3">
							<div class="footer-area-3"><?php the_field('footer_column_3_content',$footer_id);?></div>
						</div>
					</div>
				</div>
				<!-- copyright -->
				<p class="copyright">
					Copyright © <?php echo date('Y'); ?> Ascensia International. All Rights Reserved. Designed by
					<a target="_blank" href="https://www.i-concept.com.sg" title="I Concept Solution - Digital Agency in Singapore">I Concept Digital</a>
				</p>
				<!-- /copyright -->

			</div>
			<!-- /wrapper -->
		</footer>
		<!-- /footer -->


		<?php wp_footer(); ?>

	</body>
</html>
