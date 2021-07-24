<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/aais-favicon.png" rel="shortcut icon">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.default.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css" type="text/css">
		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/iconcept-style.css?v=<?php echo rand(1,999999);?>" type="text/css">
		<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
		
		<div id="wptime-plugin-preloader"></div>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
		</script>
		
			<!---wpml translate-->
	<?php if(ICL_LANGUAGE_CODE == 'zh-hans') { 
		?>
		<script>
		var _hmt = _hmt || [];
		(function() {
		var hm = document.createElement("script");
		hm.src = "https://hm.baidu.com/hm.js?1017e4c2377a58f50d758dbc19e7528b";
		var s = document.getElementsByTagName("script")[0]; 
		s.parentNode.insertBefore(hm, s);
		})();
		</script>

		<?php
		} else { 
		?>
			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-152973077-1"></script>
			<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-152973077-1');
			</script>
		<?php
		} ?>
        
        <style>
        .primary-background.merriweather {
padding-top:30px !important;
padding-bottom:30px !important;
margin-bottom:0 !important;
}

.stubi .primary-background.merriweather {
padding-top:30px !important;
padding-bottom:0px !important;
margin-bottom:0 !important;
}

.primary-background.text-center.white {
padding-top:0px !important;
padding-bottom:30px !important;
}
        </style>


	</head>
	<body <?php body_class(); ?>>

			<!-- Top Information -->
			<div class="top-information">
				<div class="wrapper">
					<div class="row">
						<div class="top-left inline-block">

						</div>
						<?php if(ICL_LANGUAGE_CODE == 'zh-hans') { 
							$top_id = 899; 
						} else { 
							$top_id = 17; 
						} 
						?>
						<div class="top-middle inline-block">
						<?php if( have_rows('top_information',$top_id) ): ?>
							<div class="information-wrapper">
							<?php while( have_rows('top_information',$top_id) ): the_row(); 
								// vars
								$info_icon = get_sub_field('information_icon');
								$info_text = get_sub_field('information_text');
							?>

								<div class="information-list">
									<i class="fa <?php echo $info_icon; ?>"></i> <?php echo $info_text; ?>
								</div>	

							<?php endwhile; ?>
								<?php echo do_action('wpml_add_language_selector'); ?>
								<style>
									.wpml-ls-legacy-list-horizontal li{
										margin-right: 10px !important;
										border-radius: 5px;
										border: 1px solid #205e49;
									}
									.wpml-ls-legacy-list-horizontal li a{
										color: #000;
									}
									.wpml-ls-legacy-list-horizontal li:last-child{
										margin-right: 0 !important;
									}
									.wpml-ls-statics-shortcode_actions .wpml-ls-current-language{
										background: #205e49;
										color: #fff;
									}
									.wpml-ls-statics-shortcode_actions .wpml-ls-current-language a{
										color: #fff;
									}
								</style>
							</div>
						<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
			
			<div style="display:none" id="aais-search">
				<?php get_search_form(); ?>
			</div>
			
			<!-- header -->
			<header class="header clear" role="banner">
				<div class="wrapper">
					<div class="row">
						<div class="header-left inline-block">
							<!-- logo -->
							<div class="logo inline-block">
								<a href="<?php echo home_url(); ?>" class="inline-block">
									<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
									<img src="<?php echo get_template_directory_uri(); ?>/img/aais-logo.png" alt="Logo" class="logo-img">
								</a>
							</div>
							<!-- /logo -->
						</div>
						<div class="header-right inline-block">
							<!-- nav -->
							<nav class="nav inline-block" role="navigation">
								<?php html5blank_nav(); ?>
							</nav>
							<!-- /nav -->
						</div>
					</div>
				</div>
                
                
			</header>
			<!-- /header -->